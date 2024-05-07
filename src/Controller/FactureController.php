<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // Ajout de l'import pour Request
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Dompdf\Dompdf;



class FactureController extends AbstractController

{
    #[Route('/facture', name: 'app_facture')]
    public function index(): Response
    {
        return $this->render('facture/facture.html.twig', [
            'controller_name' => 'FactureController',
        ]);
    }

    #[Route('/back_off', name: 'backOff')]
    public function backoff(): Response
    {
        return $this->render('back.html.twig');
    }

    #[Route('/newfacture', name: 'new_facture')]
    public function addfacture(Request $request): Response
    {
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des données du formulaire
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            $this->addFlash('success', 'Congratulations! Your product will be soon confirmed.');
            return $this->redirectToRoute('all_facture');
        }

        return $this->render('facture/facture.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/facture/affiche', name: 'all_facture')]
public function allfacture(Request $request, PaginatorInterface $paginator): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $query = $entityManager->getRepository(Facture::class)->createQueryBuilder('f')
    
        ->getQuery();
       // $factures = $FactureRepository->findAllOrderedByDate();
    $factures = $paginator->paginate(
        $query, // Requête à paginer
        $request->query->getInt('page', 1), // Numéro de page par défaut
        5 // Nombre d'éléments par page
    );

    return $this->render('facture/Afficher.html.twig', [
        'factures' => $factures,
    ]);
}


    #[Route('/delete/{id}', name: 'deleteFacture')]
    public function supprimerFacture($id): Response
    {
        $facture = $this->getDoctrine()->getRepository(Facture::class)->find($id);

        if (!$facture) {
            throw $this->createNotFoundException('Facture non trouvée');
        }
              $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($facture);
        $entityManager->flush();
        return $this->redirectToRoute('all_facture');

    }
    #[Route('/facture/{id}/edit', name: 'updateFacture')]
public function editFacture(Request $request, $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $facture = $entityManager->getRepository(Facture::class)->find($id);

    if (!$facture) {
        throw $this->createNotFoundException('Facture non trouvée');
    }

    $form = $this->createForm(FactureType::class, $facture);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('all_facture');
    }

    return $this->render('facture/Modifier.html.twig', [
        'form' => $form->createView(),
        'facture' => $facture, // Passer la variable facture au template
    ]);
}
#[Route('/facture/{id}/pdf', name: 'generate_facture_pdf')]
public function generateFacturePdf($id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $facture = $entityManager->getRepository(Facture::class)->find($id);

    if (!$facture) {
        throw $this->createNotFoundException('Facture non trouvée');
    }

    $dompdf = new Dompdf();
    $html = $this->renderView('facture/pdf.html.twig', [
        'facture' => $facture,
    ]);

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    return new Response($dompdf->output(), 200, [
        'Content-Type' => 'application/pdf',
    ]);
}

}
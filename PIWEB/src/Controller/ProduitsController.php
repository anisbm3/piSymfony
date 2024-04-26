<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produits')]
class ProduitsController extends AbstractController
{
    #[Route('/', name: 'app_produits_index', methods: ['GET'])]
    public function index(Request $request, ProduitsRepository $produitsRepository): Response
    {
        $nom = $request->query->get('Nom');
        $tri = $request->query->get('tri', 'nom');

        if ($nom) {
            $produits = $produitsRepository->searchAndSort($nom, $tri);
        } else {
            $produits = $produitsRepository->findAllSorted($tri);
        }

        return $this->render('produits/index.html.twig', [
            'produits' => $produits,
        ]);
    }
#[Route('/index1', name: 'app_produits_index1', methods: ['GET'])]
public function index1(Request $request, ProduitsRepository $produitsRepository): Response
{
$searchTerm = $request->query->get('q');

// Récupérer le paramètre de tri depuis l'URL, par défaut trié par nom
$tri = $request->query->get('tri', 'nom');

// Appel à la méthode de recherche du repository si un terme de recherche est spécifié
if ($searchTerm) {
    $produits = $produitsRepository->searchAndSort($searchTerm, $tri);
} else {
    // Sinon, appeler la méthode de tri normale
    $produits = $produitsRepository->findAllSorted($tri);
}

return $this->render('produits/index1.html.twig', [
    'produits' => $produits,
]);
}
#[Route('/back', name: 'app_produits_indexback', methods: ['GET'])]
public function indexback(ProduitsRepository $produitsRepository): Response
{
    // Récupérer la liste des produits
    $produits = $produitsRepository->findAll();

    // Récupérer la liste des produits en rupture de stock
    $produitsEnRupture = $produitsRepository->findProduitsEnRupture();

    // Notification pour les produits en rupture de stock
    if (!empty($produitsEnRupture)) {
        $message = '';
        foreach ($produitsEnRupture as $produitEnRupture) {
            $message .= sprintf('%s est en rupture de stock. ', $produitEnRupture->getNom());
        }
        $this->addFlash('warning', $message);
    }

    return $this->render('produits/indexback.html.twig', [
        'produits' => $produits,
        'produitsEnRupture' => $produitsEnRupture,
    ]);
}


    #[Route('/new', name: 'app_produits_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produits();
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_produits_indexback', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produits_show', methods: ['GET'])]
    public function show(Produits $produit): Response
    {
        return $this->render('produits/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_produits_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitsType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_produits_indexback', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produits_delete', methods: ['POST'])]
    public function delete(Request $request, Produits $produit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produits_indexback', [], Response::HTTP_SEE_OTHER);
    }

}

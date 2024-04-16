<?php

namespace App\Controller;
use App\Entity\Livraison;
use App\Form\LivraisonFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison')]
    public function index(): Response
    {
        return $this->render('home.html.twig', [
          
        ]);
    }

    #[Route('/new', name: 'new_livraison')]
    public function addLivraison(Request $request): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonFormType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($livraison);
            $entityManager->flush();

            return $this->redirectToRoute('all_livraison');
            
        }

        return $this->render('livraison/livraison.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/livraison/affiche', name: 'all_livraison')]
    public function alllivraison() : Response
    {
        $entityManager = $this->getDoctrine()->getRepository(Livraison::class);
        $livraisons = $entityManager->findAll();
        return $this->render('livraison/Affiche.html.twig', [
            'livraisons' => $livraisons,
        ]);
    }
    
    #[Route('/livraison/afficheAdmin', name: 'all_livraisonAdmin')]
    public function all_livraisonAdmin() : Response
    {
        $entityManager = $this->getDoctrine()->getRepository(Livraison::class);
        $livraisons = $entityManager->findAll();
        return $this->render('livraison/affichback.html.twig', [
            'livraisons' => $livraisons,
        ]);
    }
    #[Route('/delete1/{id}', name: 'deleteLivraison')]
    public function supprimer($id): Response
    {
        $livraison = $this->getDoctrine()->getRepository(Livraison::class)->find($id);

        if (!$livraison) {
            throw $this->createNotFoundException('Livraison non trouvée');
        }
              $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($livraison);
        $entityManager->flush();
        return $this->redirectToRoute('all_livraison');

    }
    #[Route('/livraison/{id}/edit', name: 'updateLivraison')]
    public function editLivraison(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $livraison = $entityManager->getRepository(Livraison::class)->find($id);

        if (!$livraison) {
            throw $this->createNotFoundException('Livraison non trouvée');
        }

        $form = $this->createForm(LivraisonFormType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('all_livraison');
        }

        return $this->render('livraison/Modifier.html.twig', [
            'form' => $form->createView(),
            'livraison' => $livraison, // Passer la variable livraison au template
        ]);
    }
    #[Route('/back', name: 'backOff')]
    public function backoff(): Response
    {
        return $this->render('back.html.twig');
    }
}
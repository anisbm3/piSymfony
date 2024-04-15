<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Form\editBackType;
use App\Form\EditFrontType;
use App\Form\UtilisateursType;
use App\Repository\UtilisateursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/utilisateurs')]
class UtilisateursController extends AbstractController
{
    #[Route('/', name: 'app_front', methods: ['GET'])]
    public function index(UtilisateursRepository $utilisateursRepository, Request $request): Response
    {
        $search = $request->query->get('q');
        $utilisateurs = $utilisateursRepository->findBySearch($search);

        return $this->render('Front.html.twig');
    }

    #[Route('/back', name: 'app_back', methods: ['GET'])]
    public function index1(UtilisateursRepository $utilisateursRepository, Request $request): Response
    {
        $search = $request->query->get('q');
        $utilisateurs = $utilisateursRepository->findBySearch($search);

        return $this->render('Back.html.twig');
    }

    #[Route('/read', name: 'app_utilisateurs_index', methods: ['GET'])]
    public function read(UtilisateursRepository $utilisateursRepository, Request $request): Response
    {
        $search = $request->query->get('q');
        $utilisateurs = $utilisateursRepository->findBySearch($search);

        return $this->render('utilisateurs/index.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }

  

    #[Route('/new', name: 'app_utilisateurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $utilisateur = new Utilisateurs();
        $form = $this->createForm(UtilisateursType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateurs_show', methods: ['GET'])]
    public function show(Utilisateurs $utilisateur): Response
    {
        return $this->render('utilisateurs/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }
    #[Route('/front/{id}', name: 'app_utilisateurs_display', methods: ['GET'])]
    public function display(Utilisateurs $utilisateur): Response
    {
        return $this->render('utilisateurs/display.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilisateurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateurs $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EditFrontType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit1', name: 'app_utilisateurs_edit1', methods: ['GET', 'POST'])]
    public function edit1(Request $request, Utilisateurs $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(editBackType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_back', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('utilisateurs/edit1.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_utilisateurs_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateurs $utilisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_utilisateurs_index', [], Response::HTTP_SEE_OTHER);
    }



 




}

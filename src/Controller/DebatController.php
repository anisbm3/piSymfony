<?php

namespace App\Controller;

use App\Entity\Debat;
use App\Form\DebatType;
use App\Repository\DebatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/debat')]
class DebatController extends AbstractController
{
    #[Route('/', name: 'app_debat_index', methods: ['GET'])]
    public function index(DebatRepository $debatRepository): Response
    {
        return $this->render('debat/index.html.twig', [
            'debats' => $debatRepository->findAll(),
        ]);
    }

    #[Route('/front', name: 'app_debat_indexFront', methods: ['GET'])]
    public function indexFront(DebatRepository $debatRepository): Response
    {
        return $this->render('debat/indexFront.html.twig', [
            'debats' => $debatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_debat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $debat = new Debat();
        $form = $this->createForm(DebatType::class, $debat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($debat);
            $entityManager->flush();

            return $this->redirectToRoute('app_debat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('debat/new.html.twig', [
            'debat' => $debat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_debat_show', methods: ['GET'])]
    public function show(Debat $debat): Response
    {
        return $this->render('debat/show.html.twig', [
            'debat' => $debat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_debat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Debat $debat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DebatType::class, $debat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_debat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('debat/edit.html.twig', [
            'debat' => $debat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_debat_delete', methods: ['POST'])]
    public function delete(Request $request, Debat $debat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$debat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($debat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_debat_index', [], Response::HTTP_SEE_OTHER);
    }
}

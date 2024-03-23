<?php

namespace App\Controller;

use App\Entity\Userr;
use App\Form\UserrType;
use App\Repository\UserrRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/userr')]
class UserrController extends AbstractController
{
    #[Route('/', name: 'app_userr_index', methods: ['GET'])]
    public function index(UserrRepository $userrRepository): Response
    {
        return $this->render('userr/index.html.twig', [
            'userrs' => $userrRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_userr_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userr = new Userr();
        $form = $this->createForm(UserrType::class, $userr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($userr);
            $entityManager->flush();

            return $this->redirectToRoute('app_userr_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('userr/new.html.twig', [
            'userr' => $userr,
            'form' => $form,
        ]);
    }

    #[Route('/{pseudo}', name: 'app_userr_show', methods: ['GET'])]
    public function show(Userr $userr): Response
    {
        return $this->render('userr/show.html.twig', [
            'userr' => $userr,
        ]);
    }

    #[Route('/{pseudo}/edit', name: 'app_userr_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Userr $userr, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserrType::class, $userr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_userr_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('userr/edit.html.twig', [
            'userr' => $userr,
            'form' => $form,
        ]);
    }

    #[Route('/{pseudo}', name: 'app_userr_delete', methods: ['POST'])]
    public function delete(Request $request, Userr $userr, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userr->getPseudo(), $request->request->get('_token'))) {
            $entityManager->remove($userr);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_userr_index', [], Response::HTTP_SEE_OTHER);
    }
}

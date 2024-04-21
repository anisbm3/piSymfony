<?php

namespace App\Controller;

use App\Entity\Cosplay;
use App\Form\CosplayType;
use App\Repository\CosplayRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cosplay')]
class CosplayController extends AbstractController
{
    #[Route('/', name: 'app_cosplay_index', methods: ['GET'])]
    public function index(CosplayRepository $cosplayRepository): Response
    {
        return $this->render('cosplay/index.html.twig', [
            'cosplays' => $cosplayRepository->findAll(),
        ]);
    }
    #[Route('/b', name: 'app_cosplay_indexb', methods: ['GET'])]
    public function indexb(CosplayRepository $cosplayRepository): Response
    {
        return $this->render('cosplay/indexb.html.twig', [
            'cosplays' => $cosplayRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cosplay_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cosplay = new Cosplay();
        $form = $this->createForm(CosplayType::class, $cosplay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ON recupere les images transmises 
         
            $image = $form->get('imagecp')->getData();
           
             //on genere  unnouveau nom  de fichier 
             $fichier=  md5(uniqid()).'.'.$image->guessExtension();
             //On copie le fichier dans le dossier uploads 
             $image->move(
                $this->getParameter('images_directory'),
                $fichier);
             $cosplay->setImagecp($fichier);
            
            $entityManager->persist($cosplay);
            $entityManager->flush();

            return $this->redirectToRoute('app_cosplay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cosplay/new.html.twig', [
            'cosplay' => $cosplay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cosplay_show', methods: ['GET'])]
    public function show(Cosplay $cosplay): Response
    {
        $idmateriaux = $cosplay->getIdmateriaux();

        // If idmateriaux is null, handle the situation accordingly
        if ($idmateriaux === null) {
            // Handle the case where idmateriaux is null
            // For example, you could render an error message or redirect the user
            return $this->redirectToRoute('error_page');
        }
        return $this->render('cosplay/show.html.twig', [
            'cosplay' => $cosplay,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cosplay_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cosplay $cosplay, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CosplayType::class, $cosplay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cosplay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cosplay/edit.html.twig', [
            'cosplay' => $cosplay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cosplay_delete', methods: ['POST'])]
    public function delete(Request $request, Cosplay $cosplay, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cosplay->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cosplay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cosplay_index', [], Response::HTTP_SEE_OTHER);
    }
}

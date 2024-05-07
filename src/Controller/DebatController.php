<?php

namespace App\Controller;
use App\Entity\Commentaire;
use App\Repository\CommentaireRepository;

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
   /* #[Route('/', name: 'app_debat_index', methods: ['GET'])]
    public function index(DebatRepository $debatRepository): Response
    {
        return $this->render('debat/index.html.twig', [
            'debats' => $debatRepository->findAll(),
        ]);
    }
*/
#[Route('/', name: 'app_debat_index', methods: ['GET','POST'])]
    public function index(EntityManagerInterface $entityManager,DebatRepository $debatRepository,Request $request): Response
    {
        
        $debats = $entityManager
        ->getRepository(Debat::class)
        ->findAll();
        $back = null;
        if($request->isMethod("POST")){
            if ( $request->request->get('optionsRadios')){
                $SortKey = $request->request->get('optionsRadios');
                switch ($SortKey){
                    case 'NomAnime':
                        $debats = $debatRepository->SortByNomAnime();
                        break;
                    case 'NoteAnime':
                        $debats = $debatRepository->SortByNoteAnime();
                        break;
                  
                }
            }
            else
            {
                $type = $request->request->get('optionsearch');
                $value = $request->request->get('Search');
                switch ($type){
                    case 'NomAnime':
                        $evenements = $debatRepository->findByNomAnime($value);
                        break;
                    case 'NoteAnime':
                        $evenements = $debatRepository->findByNoteAnime($value);
                        break;
                  
                }
            }

            if ( $debats){
                $back = "success";
            }else{
                $back = "failure";
            }
        }
            ////////
        return $this->render('debat/index.html.twig', [
            'debats' => $debats,'back'=>$back
        ]);
    }
    
    #[Route('/front', name: 'app_debat_indexFront', methods: ['GET'])]
    public function indexFront(DebatRepository $debatRepository): Response
    {
        return $this->render('debat/indexFront.html.twig', [
            'debats' => $debatRepository->findAll(),
        ]);
    }

    #[Route('/debat/{id}/update-rating', name: 'app_debat_update_rating', methods: ['POST'])]
    public function updateRating(Debat $debat, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $rating = $data['rating'];

        // Mettre à jour la note du anime dans la base de données
        $debat->setNoteanimes($rating);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return new Response('La note du anime a été mise à jour avec succès.', Response::HTTP_OK);
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

            return $this->redirectToRoute('app_debat_indexFront', [], Response::HTTP_SEE_OTHER);
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

            return $this->redirectToRoute('app_debat_indexFront', [], Response::HTTP_SEE_OTHER);
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

        return $this->redirectToRoute('app_debat_indexFront', [], Response::HTTP_SEE_OTHER);
    }
}

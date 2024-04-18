<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PdfGeneratorService;

#[Route('/evenement')]
class EvenementController extends AbstractController
{


    #[Route('/show_in_map/{id}', name: 'app_evenement_map', methods: ['GET'])]
    public function Map( Evenement $id,EntityManagerInterface $entityManager ): Response
    {

        $id = $entityManager
            ->getRepository(Evenement::class)->findBy( 
                ['id'=>$id ]
            );
        return $this->render('evenement/api_arcgis.html.twig', [
            'evenements' => $id,
        ]);
    }

    #[Route('/pdf', name: 'generator_service3')]
    public function pdfService(): Response
    { 
        $evenements= $this->getDoctrine()
        ->getRepository(Evenement::class)
        ->findAll();

   

        $html =$this->renderView('pdf/indexevenement.html.twig', ['evenements' => $evenements]);
        $pdfGeneratorService=new PdfGeneratorService();
        $pdf = $pdfGeneratorService->generatePdf($html);

        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="document.pdf"',
        ]);

    }


    #[Route('/', name: 'app_evenement_index', methods: ['GET','POST'])]
    public function index(EntityManagerInterface $entityManager,EvenementRepository $evenementRepository,Request $request): Response
    {
        $evenements = $entityManager
        ->getRepository(Evenement::class)
        ->findAll();

        $back = null;
        if($request->isMethod("POST")){
            if ( $request->request->get('optionsRadios')){
                $SortKey = $request->request->get('optionsRadios');
                switch ($SortKey){
                    case 'NomEvent':
                        $evenements = $evenementRepository->SortByNomEvent();
                        break;
                    case 'LieuEvent':
                        $evenements = $evenementRepository->SortByLieuEvent();
                        break;
                    case 'DateEvent':
                        $evenements = $evenementRepository->SortByDateEvent();
                        break;
                }
            }
            else
            {
                $type = $request->request->get('optionsearch');
                $value = $request->request->get('Search');
                switch ($type){
                    case 'NomEvent':
                        $evenements = $evenementRepository->findByNomEvent($value);
                        break;
                    case 'LieuEvent':
                        $evenements = $evenementRepository->findByLieuEvent($value);
                        break;
                    case 'DateEvent':
                        $evenements = $evenementRepository->findByDateEvent($value);
                        break;
                }
            }

            if ( $evenements){
                $back = "success";
            }else{
                $back = "failure";
            }
        }
            ////////

    return $this->render('evenement/index.html.twig', [
        'evenements' => $evenements,'back'=>$back
    ]);
    }

    #[Route('/front', name: 'app_evenement_indexFront', methods: ['GET'])]
    public function indexFront(EvenementRepository $evenementRepository): Response
    {
        return $this->render('evenement/indexFront.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
    }

    
    #[Route('/new', name: 'app_evenement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $evenement->getImage();
            $filename = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('uploads'),$filename);
            $evenement->setImage($filename);
            $entityManager->persist($evenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evenement_show', methods: ['GET'])]
    public function show(Evenement $evenement): Response
    {
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_evenement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $evenement->getImage();
            $filename = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('uploads'),$filename);
            $evenement->setImage($filename);
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evenement_delete', methods: ['POST'])]
    public function delete(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($evenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
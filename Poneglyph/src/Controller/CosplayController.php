<?php

namespace App\Controller;
use OpenAI;

use App\Entity\Cosplay;
use App\Form\CosplayType;
use App\Repository\CosplayRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
#[Route('/cosplay')]
class CosplayController extends AbstractController
{
    #[Route('/', name: 'app_cosplay_index', methods: ['GET'])]
    public function index(CosplayRepository $cosplayRepository, Request $request, PaginatorInterface $paginator,? string $question, ? string $response): Response
    {   // Get the question from the request query parameters
       
        $cosplays = $cosplayRepository->findAll();

        // Paginate the array directly
        $cosplays = $paginator->paginate(
            $cosplays, // Query object or array
            $request->query->getInt('page', 1), // Current page number
            2 // Items per page
        );

        // Render the view with the paginated data
        return $this->render('cosplay/index.html.twig', [
            'cosplays' =>$cosplays,
            'question' => $question,
            'response' => $response,
           
        ]);
    }

    #[Route('/b', name: 'app_cosplay_indexb', methods: ['GET'])]
    public function indexb(CosplayRepository $cosplayRepository): Response
    {      
        $cosplays = $cosplayRepository->findAllOrderedByDate();
        return $this->render('cosplay/indexb.html.twig', [
            'cosplays' => $cosplays,
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
             $cosplay->setLikeCount(0);
            $entityManager->persist($cosplay);
            $entityManager->flush();

            return $this->redirectToRoute('app_cosplay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cosplay/new.html.twig', [
            'cosplay' => $cosplay,
            'form' => $form,
        ]);
    }

    #[Route('/chat', name: 'send_chat', methods:"POST")]
    public function chat(Request $request): Response
    {
        $question=$request->request->get('text');

        //Implémentation du chat gpt

        $myApiKey = $_ENV['OPENAI_KEY'];


        $client = OpenAI::client($myApiKey);

        $result = $client->completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => $question,
            'max_tokens'=>2048
        ]);

        $response=$result->choices[0]->text;
  
        
        return $this->forward('App\Controller\CosplayController::index', [
           
            'question' => $question,
            'response' => $response
        ]);
    }


    #[Route('/newb', name: 'app_cosplay_newb', methods: ['GET', 'POST'])]
    public function newb(Request $request, EntityManagerInterface $entityManager): Response
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

            return $this->redirectToRoute('app_cosplay_indexb', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cosplay/newb.html.twig', [
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
            return $this->redirectToRoute('app_error', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('cosplay/show.html.twig', [
            'cosplay' => $cosplay,
        ]);
    }
    #[Route('/admin/cosplay/{id}', name: 'app_cosplay_showb', methods: ['GET'])]
    public function showb(Cosplay $cosplay): Response
    {
        $idmateriaux = $cosplay->getIdmateriaux();

        // If idmateriaux is null, handle the situation accordingly
        if ($idmateriaux === null) {
            // Handle the case where idmateriaux is null
            // For example, you could render an error message or redirect the user
            return $this->redirectToRoute('error_page');
        }
        return $this->render('cosplay/showb.html.twig', [
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
    #[Route('/cosplay/{id}/like', name:"post_like", methods:['POST'])]

     public function like(Request $request,Cosplay $cosplay,EntityManagerInterface $entityManager): Response
    {
   // Incrémentez le nombre de likes pour le post donné
   $cosplay->setLikeCount($cosplay->getLikeCount() + 1);

   // Enregistrez les modifications dans la base de données
   $this->getDoctrine()->getManager()->flush();

   // Retournez une réponse JSON avec le nombre de likes
   return new JsonResponse(['likeCount' => $cosplay->getLikeCount()]);
      }
   #[Route('/ajax', name: 'recherche', methods:['GET'])]
    public function searchoffreajax(Request $request, CosplayRepository $cosplayRepository): Response
   {
    $cosplayRepository = $this->getDoctrine()->getRepository(Cosplay::class);
    $requestString = $request->get('searchValue');
    $cosplays = $cosplayRepository->findBySearchCriteria($requestString);

    return $this->render('cosplay/index.html.twig', [
        "cosplays" => $cosplays
    ]);
    }

    

}

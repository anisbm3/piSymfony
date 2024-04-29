<?php

namespace App\Controller;
use App\Entity\Livraison;
use App\Form\LivraisonFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison')]
    public function index(): Response
    {
        return $this->render('home.html.twig', []);
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
    public function alllivraison(Request $request, PaginatorInterface $paginator): Response
    {
        $entityManager = $this->getDoctrine()->getRepository(Livraison::class);
        $livraisons = $entityManager->findAll();
        $livraisons = $paginator->paginate(
            $livraisons, // Requête contenant les données à paginer
            $request->query->getInt('page', 1), // Numéro de page actuel, 1 par défaut
            5 // Nombre d'éléments par page
        );

        return $this->render('livraison/Affiche.html.twig', [
            'livraisons' => $livraisons,
        ]);
    }
    #[Route('/livraison/afficheAdmin', name: 'all_livraisonAdmin')]
    public function all_livraisonAdmin(Request $request, PaginatorInterface $paginator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $livraisonsQuery = $entityManager->getRepository(Livraison::class)->createQueryBuilder('l')->getQuery();
        
        $livraisons = $paginator->paginate(
            $livraisonsQuery,
            $request->query->getInt('page', 1),
            5 // Limit per page
        );
    
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
   
    #[Route('/livraison/trier', name: 'trier_livraisons', methods: ['GET'])]
    public function trierLivraisons(Request $request, PaginatorInterface $paginator): JsonResponse
    {
        $tri = $request->query->get('tri');
        $ordre = $request->query->get('ordre');
    
        // Assurez-vous que $tri n'est pas null avant d'appeler la méthode
        if ($tri !== null) {
            $livraisons = $this->getLivraisonsTrie($tri, $ordre);
    
            // Construire la réponse JSON
            $livraisonsHtml = $this->renderView('livraison/Affiche.html.twig', [
                'livraisons' => $livraisons,
            ]);
    
            return new JsonResponse(['livraisonsHtml' => $livraisonsHtml]);
        }
    
        // Gérer le cas où $tri est null
        return new JsonResponse(['error' => 'Le paramètre tri est manquant.'], 400);
    }
    
    private function getLivraisonsTrie(string $tri, string $ordre): array
    {
        $queryBuilder = $this->getDoctrine()->getRepository(Livraison::class)->createQueryBuilder('livraison');
    
        switch ($tri) {
            case 'date':
                $queryBuilder->orderBy('livraison.date', $ordre);
                break;
            case 'nom':
                $queryBuilder->orderBy('livraison.nomprenomclient', $ordre);
                break;
            case 'prix':
                // Assurez-vous d'avoir la relation appropriée dans votre entité Livraison pour accéder au prix
                $queryBuilder->leftJoin('livraison.panier', 'panier')
                    ->orderBy('panier.price', $ordre);
                break;
            default:
                // Tri par défaut si le paramètre tri n'est pas reconnu
                $queryBuilder->orderBy('livraison.date', 'ASC');
        }
    
        return $queryBuilder->getQuery()->getResult();
    }
    
}

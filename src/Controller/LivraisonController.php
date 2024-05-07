<?php

namespace App\Controller;
use App\Entity\Utilisateurs;
use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\PanierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison')]
    public function index(): Response
    {
        return $this->render('home.html.twig', []);
    }
    
       
        #[Route('/newlivraison', name: 'new_livraison')]
       
        public function addLivraison(Request $request, NotifierInterface $notifier, Security $security,PanierRepository $panierRepository): Response
        {    
            $totalPrice = $request->query->get('total'); // Récupérer la valeur du paramètre de requête 'total'
            $idp=$request->query->get('id');
            $panier=$panierRepository->findOneBy(['id'=>$idp]);
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison, [
            'idp'=>$panier
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $security->getUser();
            $livraison->setUser($user);
            $livraison->setPanier($panier);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($livraison);
            $entityManager->flush();

            if ($livraison  ->getPrix() > 100) {
                $notification = new Notification('Félicitations, vous avez une remise !');
                //$notifier->send($notification);
            }

            $this->addFlash('success', 'Livraison ajoutée avec succès !');
            return $this->redirectToRoute('all_livraison');
        }

        return $this->render('livraison/livraison.html.twig', [
            'form' => $form->createView(),
            'total' => $totalPrice,
        ]);
        }
        
        #[Route('/livraison/affiche', name: 'all_livraison')]
        public function alllivraison(Request $request, PaginatorInterface $paginator, Security $security): Response
        {
            $user = $security->getUser();
        
            $entityManager = $this->getDoctrine()->getManager();
            $livraisons = $entityManager->getRepository(Livraison::class)->findBy(['user' => $user]);
        
            $livraisons = $paginator->paginate(
                $livraisons,
                $request->query->getInt('page', 1),
                3
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
            2// Limit per page
        );
    
        return $this->render('livraison/affichback.html.twig', [
            'livraisons' => $livraisons,
        ]);
    }

    #[Route('/delete1/{id}', name: 'deleteLivraison')]
    public function supprimer($id, Security $security): Response
    {
        // Récupérer l'utilisateur actuel
        $user = $security->getUser();
    
        $entityManager = $this->getDoctrine()->getManager();
        $livraison = $entityManager->getRepository(Livraison::class)->find($id);
    
        if (!$livraison) {
            throw $this->createNotFoundException('Livraison non trouvée');
        }
    
        // Vérifier si l'utilisateur actuel est le propriétaire de la livraison
        if ($livraison->getUser()->getId() != $user->getId()) {
            throw new AccessDeniedException('Vous n\'êtes pas autorisé à supprimer cette livraison');
        }
        
    
        $entityManager->remove($livraison);
        $entityManager->flush();
    
        return $this->redirectToRoute('all_livraison');
    }
    
    #[Route('/livraison/{id}/edit', name: 'updateLivraison')]
    public function editLivraison(Request $request, $id, Security $security): Response
    {
        // Récupérer l'utilisateur actuel
        $user = $security->getUser();
    
        $entityManager = $this->getDoctrine()->getManager();
        $livraison = $entityManager->getRepository(Livraison::class)->find($id);
    
        if (!$livraison) {
            throw $this->createNotFoundException('Livraison non trouvée');
        }
    
        // Vérifier si l'utilisateur actuel est le propriétaire de la livraison
        if ($livraison->getUser()->getId() != $user->getId()) {
            throw new AccessDeniedException('Vous n\'êtes pas autorisé à supprimer cette livraison');
        }
        
    
        $form = $this->createForm(LivraisonType::class, $livraison);
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
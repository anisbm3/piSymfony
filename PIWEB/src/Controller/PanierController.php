<?php

namespace App\Controller;
use App\Entity\Panier;
use App\Entity\Produits;
use App\Form\PanierType;
use App\Form\Panier1Type;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'app_panier_index', methods: ['GET'])]
    public function index(PanierRepository $panierRepository): Response
    {   $maxPanierId = $panierRepository->getMaxPanierId();

        return $this->render('panier/index.html.twig', [
            'paniers' => $panierRepository->findAll(),
            'max_panier_id' => $maxPanierId,
        ]);
       
       
    }
  
  
    #[Route('/back', name: 'app_panier_indexback', methods: ['GET'])]
    public function indexback(PanierRepository $panierRepository): Response
    {
        return $this->render('panier/indexback.html.twig', [
            'paniers' => $panierRepository->findAll(),
        ]);
    }

#[Route('/new1', name: 'app_panier_new1', methods: ['GET', 'POST'])]
public function new1(Request $request, EntityManagerInterface $entityManager): Response
{
    // Récupérer le nom du produit et le prix du produit à partir de la requête
    $nomProduit = $request->query->get('nomProduit');
    $prixProduit = $request->query->get('prixProduit');
    $quantity = $request->request->get('quantity');
    $stockProduit = $request->query->get('stock');
   // $prixProduit = intval($request->query->get('prixProduit'));
   $produitRepository = $entityManager->getRepository(Produits::class);
   $produit = $produitRepository->findProduitByNom($nomProduit);
   $produit->setStock($produit->getStock() - $quantity);

   // Enregistrer les modifications du produit dans la base de données
   $entityManager->persist($produit);
   $entityManager->flush();
    // Créer une instance de Panier
    $panier = new Panier();

    // Créer le formulaire et passer le nom et le prix du produit en option
    $form = $this->createForm(Panier1Type::class, $panier, [
        'nom_produit' => $nomProduit,
        'prix_produit' => $prixProduit*$quantity,
        'quantity' => $quantity,

    ]);

    // Gérer la soumission du formulaire
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Traiter les données du formulaire

        // Enregistrer le panier en base de données
        $entityManager->persist($panier);
        $entityManager->flush();

        // Rediriger l'utilisateur vers la page de l'index du panier
        return $this->redirectToRoute('app_panier_index', [], Response::HTTP_SEE_OTHER);
    }

    // Afficher le formulaire dans le template Twig
    return $this->renderForm('panier/new.html.twig', [
        'panier' => $panier,
        'form' => $form,
    ]);
}

    #[Route('/new', name: 'app_panier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le nom du produit et le prix du produit à partir de la requête
        $nomProduit = $request->query->get('nomProduit');
        $prixProduit = $request->query->get('prixProduit');
        $quantity = $request->request->get('quantity');
        $stockProduit = $request->query->get('stock');
       // $prixProduit = intval($request->query->get('prixProduit'));
       $produitRepository = $entityManager->getRepository(Produits::class);
       $produit = $produitRepository->findProduitByNom($nomProduit);
       $produit->setStock($produit->getStock() - $quantity);

       // Enregistrer les modifications du produit dans la base de données
       $entityManager->persist($produit);
       $entityManager->flush();
        // Créer une instance de Panier
        $panier = new Panier();

        // Créer le formulaire et passer le nom et le prix du produit en option
        $form = $this->createForm(PanierType::class, $panier, [
            'nom_produit' => $nomProduit,
            'prix_produit' => $prixProduit*$quantity,
            'quantity' => $quantity,

        ]);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traiter les données du formulaire

            // Enregistrer le panier en base de données
            $entityManager->persist($panier);
            $entityManager->flush();

            // Rediriger l'utilisateur vers la page de l'index du panier
            return $this->redirectToRoute('app_panier_index', [], Response::HTTP_SEE_OTHER);
        }

        // Afficher le formulaire dans le template Twig
        return $this->renderForm('panier/new.html.twig', [
            'panier' => $panier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_panier_show', methods: ['GET'])]
    public function show(Panier $panier): Response
    {
        return $this->render('panier/show.html.twig', [
            'panier' => $panier,
        ]);
    }
    #[Route('/{id}/showback', name: 'app_panier_showback', methods: ['GET'])]
    public function showback(Panier $panier): Response
    {
        return $this->render('panier/showback.html.twig', [
            'panier' => $panier,
        ]);
    }
    #[Route('/{id}/edit', name: 'app_panier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Panier $panier, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PanierType::class, $panier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_panier_indexback', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panier/edit.html.twig', [
            'panier' => $panier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_panier_delete', methods: ['POST'])]
    public function delete(Request $request, Panier $panier, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$panier->getId(), $request->request->get('_token'))) {
            $entityManager->remove($panier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_panier_index', [], Response::HTTP_SEE_OTHER);
    }
 
    
    #[Route('/panier/{panierId}/produits', name: 'app_panier_produits')]
    public function afficherProduitsDuPanier(int $panierId, PanierRepository $panierRepository): Response
    {
        $produits = $panierRepository->findProdDetailsByPanierId($panierId);
        $totalPrice = 0;

        // Calculer le total des prix
        foreach ($produits as $produit) {
            $totalPrice += $produit['price'];
        }
    
        return $this->render('panier/total.html.twig', [
            'produits' => $produits,
            'totalPrice' => $totalPrice,

        ]);
    }
    #[Route('/panier/{panierId}/Paiement', name: 'app_paiement')]
    public function Payer(int $panierId, PanierRepository $panierRepository): Response
    {
        $produits = $panierRepository->findProdDetailsByPanierId($panierId);
        $totalPrice = 0;

        // Calculer le total des prix
        foreach ($produits as $produit) {
            $totalPrice += $produit['price'];
        }
    
        return $this->render('panier/Payer.html.twig', [
            'produits' => $produits,
            'totalPrice' => $totalPrice,

        ]);
    }

   
    
     /**
     * @Route("/paiement", name="paiement")
     */
    public function paiement(): Response
    {
        // Vous pouvez ajouter du code ici si nécessaire pour la page de paiement
        // Par exemple, récupérer les informations du panier, afficher un récapitulatif, etc.
        return $this->render('stripe/index.html.twig');
    }
    
    
}



    
   

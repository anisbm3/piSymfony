<?php

namespace App\Controller;
use App\Entity\Reservation;
use App\Entity\Evenement;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;
use Symfony\Component\Security\Core\Security;
use App\Entity\Utilisateurs;

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    #[Route('/', name: 'app_reservation_index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    
    #[Route('/{idUtilisateurs}/listereservation', name: 'app_indexReservationUtilisateurs_index', methods: ['GET'])]
    public function indexReservationUser(ReservationRepository $reservationRepository, Utilisateurs $idUtilisateurs): Response
    {
        $reservations = $reservationRepository->findBy(['user' => $idUtilisateurs]);
        
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }


    #[Route('/front', name: 'app_reservation_indexFront', methods: ['GET'])]
    public function indexFront(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/indexFront.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }


    #[Route('/{idevent}/listeR', name: 'app_indexReservationEvenement_index', methods: ['GET'])]
    public function indexReservationEvenement(ReservationRepository $reservationRepository, Evenement $idevent): Response
    {
        $reservations = $reservationRepository->findBy(['Evenement' => $idevent]);
        
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }

   /* #[Route('/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }*/


    #[Route('{idevent}/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, Evenement $idevent, Security $security): Response
    {
        $reservation = new Reservation();
        $reservation->setEvenement($idevent);
        $idevent->setNbPlace($idevent->getNbPlace() - $reservation->getNbPlace());
        
        // Retrieve the current user
        $user = $security->getUsers();
        // Set the user on the reservation entity
        $reservation->setUser($user);
        
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();
            $reservation->setEvenement($idevent);
            
            // Decrease the number of available seats for the event
            $idevent->setNbPlace($idevent->getNbPlace() - $reservation->getNbPlace());
    
            $entityManager->persist($reservation);
            $entityManager->persist($idevent); // Update the event with the new number of available seats
            $entityManager->flush();
    
            // Create a Notifier
            $notifier = NotifierFactory::create();
    
            // Create your notification
            $notification = (new Notification())
                ->setTitle('New Reservation')
                ->setBody('This is the body of your notification');
    
            // Send it
            $notifier->send($notification);
    
            return $this->redirectToRoute('app_reservation_show', ['id' => $reservation->getId()]);
        }
    
        return $this->renderForm('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_indexFront', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_indexFront', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Repository\CosplayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index( CosplayRepository $cosplayRepository): Response
    {
        return $this->render('home/accueil.html.twig', [
            'cosplays' => $cosplayRepository->findAll(),
            
        ]);
    }
}

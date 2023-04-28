<?php

namespace App\Controller;

use App\Repository\PlatsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/restaurant', name: 'app_restaurant')]
    public function index(PlatsRepository $platsRepository): Response
    { $plats= $platsRepository->findAll();
        return $this->render('restaurant/index.html.twig', [
            'plats' => $plats,
        ]);
    }
}

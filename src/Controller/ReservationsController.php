<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(): Response
    {
        // TODO: Handle form submission
        $form = $this->createForm(ReservationType::class);
        return $this->render('reservations/index.html.twig', ['form' => $form]);
    }
}

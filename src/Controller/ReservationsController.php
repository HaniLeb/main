<?php

namespace App\Controller;

use App\Form\BookingType;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(): Response
    {
        // TODO: Handle form submission
        $bookingForm = $this->createForm(BookingType::class);
        $contactForm = $this->createForm(ContactType::class);

        return $this->render('reservations/index.html.twig', ['booking_form' => $bookingForm, 'contact_form' => $contactForm]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Contact;
use App\Form\BookingType;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $booking = new Booking();
        $bookingForm = $this->createForm(BookingType::class, $booking);

        $bookingForm->handleRequest($request);
        if ($bookingForm->isSubmitted() && $bookingForm->isValid()) {
            $entityManager->persist($booking);
            $entityManager->flush();

            $this->addFlash('success', 'Votre réservation a bien été prise en compte !');
            return $this->redirectToRoute('app_reservations');
        }

        $contact = new Contact();
        $contactForm = $this->createForm(ContactType::class, $contact);

        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirectToRoute('app_reservations');
        }

        return $this->render('reservations/index.html.twig', ['booking_form' => $bookingForm, 'contact_form' => $contactForm]);
    }
}

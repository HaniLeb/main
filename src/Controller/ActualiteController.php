<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Repository\ActualiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]
    public function index(ActualiteRepository $actualiteRepository): Response
    {
        $actualites = $actualiteRepository->findAll();
        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites
        ]);
    }

    #[Route('/actualite/{id}/view', name: 'app_actualite_view', methods: ["GET"])]
    public function view(
        int $id,
        ActualiteRepository $actualiteRepository
    ): Response {

        $actualite = $actualiteRepository->find($id);

        return $this->render("actualite/view.html.twig", [
            'actualite' => $actualite
        ]);
    }

    #[Route('/actualite/create', name: 'app_actualite_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {

        $actualite = new Actualite();
        $form = $this->createForm(ActualiteType::class, $actualite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('app_actualite');
        }

        return $this->render('actualite/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/actualite/{id}/delete', name: 'app_actualite_delete', methods: ["POST"])]
    public function delete(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        ActualiteRepository $actualiteRepository
    ): Response {
        $token = $request->request->get('token');
        $actualite = $actualiteRepository->find($id);

        if ($this->isCsrfTokenValid('actualite-' . $actualite->getId(), $token)) {
            $entityManager->remove($actualite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_actualite');
    }

    #[Route('/actualite/{id}/edit', name: 'app_actualite_edit')]
    public function edit(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        ActualiteRepository $actualiteRepository
    ): Response {
        $actualite = $actualiteRepository->find($id);
        $form = $this->createForm(ActualiteType::class, $actualite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('app_actualite');
        }

        return $this->render('actualite/edit.html.twig', [
            'form' => $form->createView(),
            'actualite' => $actualite
        ]);
    }
}

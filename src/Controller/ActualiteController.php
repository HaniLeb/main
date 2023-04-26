<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}

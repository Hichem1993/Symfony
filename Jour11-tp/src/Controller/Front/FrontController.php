<?php

namespace App\Controller\Front;

use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class FrontController extends AbstractController
{
    #[Route('/', name: 'page_home')]
    public function index(RecetteRepository $RecetteRepository): Response
    {
        $recettes = $RecetteRepository->findAll();
        return $this->render('front/index.html.twig', [
            "recettes" => $recettes
        ]);
    }

}
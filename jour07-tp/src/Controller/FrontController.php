<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class FrontController extends AbstractController{

    #[Route("/" , name:"page_accueil")]
    public function accueil(ArticlesRepository $articteRepo){
        $articles = $articteRepo->findAll(); // SELECT * FROM Articles
        return $this->render("front/accueil.html.twig" , ["articles" => $articles]);
    }
}
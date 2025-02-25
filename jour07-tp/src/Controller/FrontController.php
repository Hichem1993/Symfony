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


    #[Route("/presentation" , name:"page_presentation")]
    public function presentation(){

        return $this->render("front/presentation.html.twig");

    }


    #[Route("/mention-legale" , name:"page_mention_legale")]
    public function mention(){

        return $this->render("front/mention.html.twig");

    }


    #[Route("/connexion" , name:"page_connexion")]
    public function connexion(){

        return $this->render("front/connexion.html.twig");

    }

}
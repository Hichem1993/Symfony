<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class FrontController extends AbstractController{

    #[Route("/" , name:"page_accueil")]
    public function accueil(){
        return $this->render("front/accueil.html.twig");
    }
}
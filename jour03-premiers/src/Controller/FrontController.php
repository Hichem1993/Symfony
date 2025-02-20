<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class FrontController extends AbstractController{

    #[Route("/presentation" , name:"page_presentation")]
    public function presentation(){
        return $this->render("front/presentation.html.twig");
    }

    #[Route("/exo" , name:"page_exo")]
    public function exo(){
        return $this->render("front/exo.html.twig");
    }

    #[Route("/etudiant" , name:"page_etudiant")]
    public function etudiant(){
        // Envoyer des données du Controller ==> La vue
        $data = [
            "nom" => "Alain",
            "age" => 20,
            "competences" => ["PHP" , "JS" , "Symfony"]
        ];
        return $this->render("front/etudiant.html.twig", $data);
    }

    #[Route("/formation" , name:"page_formation")]
    public function formation(){
        // Envoyer des données du Controller ==> La vue
        $data = [
            "nom" => "DWWM",
            "duree" => 6 ,
            "unite" => "mois",
            "modules" => ["html", "css", "php" , "symfony", "js"],
            "dt_debut" => "1er Septembre 2024"
        ];
        return $this->render("front/formation.html.twig", $data);
    }
}
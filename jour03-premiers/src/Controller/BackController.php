<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BackController extends AbstractController{

    #[Route("/dashboard" , name:"page_dashboard")]
    public function dashboard():Response{
        $data = [
            "users" => [
                "nom" => "Alain",
                "role" => "admin",
                "dt_connexion" => "21 Février 2025"
            ],
            "sessions" => [
                [ "id" => 1 , "nom" => "PS4" , "prix" => 200    ],
                [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 300 ]
            ]
        ];

        return $this->render("back/dashboard.html.twig", $data);
    }

}
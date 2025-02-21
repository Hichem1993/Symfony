<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
                [ "id" => 1 , "nom" => "PS4" , "prix" => 2000    ],
                [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 30000 ]
            ]
        ];

        return $this->render("back/dashboard.html.twig", $data);
    }


    #[Route("/gestion-article/{id}" , name:"gestion_article")]
    public function gestionArticle(Request $request){
        $data = [
            "produits" => [
                ["id" => 1 , "nom" => "PS4" , "prix" => 200],
                ["id" => 2 , "nom" => "PS5" , "prix" => 500],
                ["id" => 3 , "nom" => "NintendoDS" , "prix" => 300]
            ]
        ];
        // http://127.0.0.1:8000/gestion-article/1  ===> Affiche produit 1
        // http://127.0.0.1:8000/gestion-article/2  ===> Affiche produit 2
        // http://127.0.0.1:8000/gestion-article/3  ===> Affiche produit 3

        $id = $request->attributes->get("id");
        $resultat = [];
        
        // Recherche dans un tableau si l'id dans l'url existe dans le tableau
        foreach ($data["produits"] as $produit){
            if($produit["id"] == $id){
                $resultat[] = $produit;
            }
        }

        if(count($resultat) == 0){
            return $this->render("back/404.html.twig");
        }
        return $this->render("back/produit.html.twig", $resultat[0]);

        // dd($resultat);
        // dd($request->attributes->get("id"));  // Dump et die();
    }

}
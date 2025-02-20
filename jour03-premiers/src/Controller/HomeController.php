<?php
// http://127.0.0.1:8000/

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController{

    #[Route("/" , name:"home")]
    // Annotation équivalent de tableau $routes dans le fichier index.php
    public function home(){
        return new Response("Voici notre page d'accueil");
    }


    #[Route("/contact" , name:"page_contact")]
    // Annotation équivalent de tableau $routes dans le fichier index.php
    public function contact(){
        return new Response("Je suis la page de contact !!!!");
    }

}
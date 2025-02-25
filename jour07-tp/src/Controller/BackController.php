<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BackController extends AbstractController{

    #[Route("/dashboard" , name:"page_dashboard")]
    public function dashboard(ArticlesRepository $articteRepo){
        $articles = $articteRepo->findAll(); // SELECT * FROM Articles
        return $this->render("back/dashboard.html.twig" , ["articles" => $articles]);
    }


    // DELETE :
    #[Route("/delete/{id}", name:"page_delete")]
    public function delete(string $id, EntityManagerInterface $em, ArticlesRepository $articleRepo)
    {
        // Chercher l'article par son ID
        $article = $articleRepo->findOneBy(["id"=>$id]);
        
        // Vérifier si l'article existe
        if (empty($article)) {
            return new Response("Aucun article trouvé avec cet ID",);
        }
        
        // Supprimer l'article
        $em->remove($article);
        $em->flush();
    
        return $this->redirectToRoute("page_dashboard");
        
    }

}
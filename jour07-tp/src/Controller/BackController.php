<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Etudiant;
use App\Entity\User;
use App\Form\ArticleType;
use App\Form\EtudiantType;
use App\Form\UserType;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BackController extends AbstractController{

    #[Route("/dashboard" , name:"page_dashboard")]
    public function dashboard(ArticlesRepository $articteRepo){
        $articles = $articteRepo->findAll(); // SELECT * FROM Articles
        return $this->render("back/dashboard.html.twig" , ["articles" => $articles]);
    }

    #[Route("/gestion-articles", name:"page_gestion_article")]
    public function gestionArticles(
        ArticlesRepository $articleRepository
    ){
        $articles = $articleRepository->findAll();
        return $this->render("back/gestion-articles.html.twig" , ["articles" => $articles]);
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


    #[Route("/gestion-articles-delete-{id}", name:"page_delete_article")]
    public function supprimerArticle(
        EntityManagerInterface $em ,
        ArticlesRepository $articleRepository ,
        Request $request 
    ){
        $id = $request->attributes->get("id");

        $article = $articleRepository->findOneBy(["id" => $id]);

        if(empty($article)){
            return new Response("Aucun article trouvé !!!");
        }

        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute("page_gestion_article");
    }



    #[Route("/gestion-articles-add" , name:"page_add_article")]
    public function ajouterArticle(Request $request , EntityManagerInterface $em){

        $form = $this->createForm(ArticleType::class); // créer le html du formulaire
        $form->handleRequest($request);  // Récupérer les valeurs du $_POST (saisie)

        if($form->isSubmitted() && $form->isValid()){  // Vérification minimum
            // INSERT INTO
            $data = $form->getData();  // Récupérer le formulaire
            $articles = new Articles();
            $articles->setTitre($data["titre"])
                     ->setDescription($data["description"])
                     ->setAuteur($data["auteur"])
                     ->setDuree($data["duree"])
                     ->setUrl_img($data["url_img"]);
            
            $em->persist($articles);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");
        }


        return $this->render("back/form_create_article.html.twig" , [ 
            "form" => $form->createView()
            ]
        );

    }

    #[Route("/gestion-etudiant-add" , name:"page_add_etudiant")]
    public function ajouterEtudiant(Request $request , EntityManagerInterface $em){

        $form = $this->createForm(EtudiantType::class);  // Créer le formulaire (Page Html)
        $form->handleRequest($request);  // Récupérer les valeurs du $_POST (saisie)


        if($form->isSubmitted() && $form->isValid()){  // Vérification minimum
            // INSERT INTO
            $data = $form->getData();  // Récupérer le formulaire
            $etudiant = new Etudiant();
            $etudiant->setPrenom($data["prenom"])
                     ->setNom($data["nom"])
                     ->setAge($data["age"])
                     ->setDescription($data["description"]);
            
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");
        }


        return $this->render("back/form_create_etudiant.html.twig", [
            "form" => $form->createView() // => je veux avoir le html 
                                          // <form> ....
        ]);
    }   


    #[Route("/gestion-user-add" , name:"page_add_user")]
    public function ajouterUser(Request $request , EntityManagerInterface $em){

        $form = $this->createForm(UserType::class);  // Créer le formulaire (Page Html)
        $form->handleRequest($request);  // Récupérer les valeurs du $_POST (saisie)


        if($form->isSubmitted() && $form->isValid()){  // Vérification minimum
            // INSERT INTO
            $data = $form->getData();  // Récupérer le formulaire
            $user = new User();
            $user->setPrenom($data["prenom"])
                     ->setNom($data["nom"])
                     ->setAge($data["age"])
                     ->setCv($data["cv"])
                     ->setRole($data["role"]);
            
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");
        }


        return $this->render("back/form_create_user.html.twig", [
            "form" => $form->createView() // => je veux avoir le html 
                                          // <form> ....
        ]);
    }   



}
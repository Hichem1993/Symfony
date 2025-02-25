<?php

namespace App\Controller;

use App\Entity\Etudiant as EntityEtudiant;
use DateTime;
use App\Entity\Pays;
use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController{

    // http://127.0.0.1:8000/ajouter-pays

    #[Route("/ajouter-pays" , name:"page_ajouter_pays")]
    public function ajouterPays(EntityManagerInterface $em){
        $pays = new Pays();
        $pays -> setNom("France")
              -> setCapitale("Paris")
              -> setPopulation(60_000_000)
              -> setDtCreation(new DateTime());

        $em -> persist($pays);  // Effecter l'INSERT en base de données
        $em -> flush();

        return new Response("Le pays est bien créé");
    }



    // http://127.0.0.1:8000/ajouter-etudiant

    #[Route("/ajouter-etudiant" , name:"page_ajouter_etudiant")]
    public function ajouterEtudiant(EntityManagerInterface $em){
        $etudiants = new Etudiant();
        $etudiants -> setPrenom("Alain")
                   -> setNom("DUPONT")
                   -> setAge(1)
                   -> setDtNaissance(new DateTime('2025-01-01'))
                   -> setIsAdmin(TRUE)
                   -> setTelephone("0606060606");

        $em -> persist($etudiants);  // Effecter l'INSERT en base de données
        $em -> flush();

        return new Response("L'etudiant est bien créé");
    }



    // http://127.0.0.1:8000/update-etudiant
    #[Route("/update-etudiant" , name:"page_update_etudiant")]
    public function updateEtudiant(EtudiantRepository $etudiantRepository, EntityManagerInterface $em){

        // Recherche l'étudiant qui à l'id 2
        $etudiant = $etudiantRepository->findOneBy(["id"=>2]);

        if (empty($etudiant)) {
            return new Response("Aucun etudiant trouvé");
        }

        $etudiant -> setPrenom("Zorro")
                  -> setNom("Dufour");

        $em->persist($etudiant);
        $em->flush();
        return new Response("Etudiant numéro 2 mis à jour");
    }



    // http://127.0.0.1:8000/delete-etudiant
    #[Route("/delete-etudiant" , name:"page_delete_etudiant")]
    public function deleteEtudiant(EtudiantRepository $etudiantRepository, EntityManagerInterface $em){

        // Recherche l'étudiant qui à l'id 2
        $etudiant = $etudiantRepository->findOneBy(["id"=>1]);

        if (empty($etudiant)) {
            return new Response("Aucun etudiant trouvé");
        }

        $em->remove($etudiant);
        $em->flush();
        return new Response("Etudiant numéro 1 vient d'être supprimé");
    }


    // http://127.0.0.1:8000/all-etudiant
    #[Route("/all-etudiant" , name:"page_all_etudiant")]
    public function allEtudiant(EtudiantRepository $etudiantRepository){
        // Select * From etudiants
        $etudiants = $etudiantRepository->findAll();
        return $this->render("base/etudiant.html.twig", ["etudiants" => $etudiants]);
    }

}
<?php

namespace App\Controller;

use App\Entity\Etudiant as EntityEtudiant;
use DateTime;
use App\Entity\Pays;
use App\Entity\Etudiant;
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

}
<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Commentaire;
use App\Entity\Recette;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentaireFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 30 ; $i++){
            $faker = Factory::create("fr_FR");
            $commentaire = new Commentaire();
            $commentaire->setEmail($faker->email());
            $commentaire->setSujet($faker->words(5, true));
            $commentaire->setMessage($faker->realText(60));
            $commentaire->setDtCreation($faker->dateTimeThisCentury());
            $commentaire->setAuteur($this->getReference("auteur_" . $faker->numberBetween(0,49), Auteur::class));
            $commentaire->setRecette($this->getReference("recette_" . $faker->numberBetween(0,29), Recette::class));

            $manager->persist($commentaire);
         }
            $manager->flush();
    }

    // Forcer d'exécuter AuteurFixture avant cette fichier
    public function getDependencies(): array
    {
        return[
            AuteurFixtures::class,
            RecetteFixture::class
        ];
    }
    
}
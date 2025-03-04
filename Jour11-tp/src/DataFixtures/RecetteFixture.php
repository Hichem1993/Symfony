<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Recette;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecetteFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 30 ; $i++){
            $faker = Factory::create("fr_FR");
            $recette = new Recette();
            $recette->setTitre($faker->realText(20));
            $recette->setDescription($faker->realText(400));
            $recette->setPrix($faker->numberBetween(5, 200));
            $recette->setDtCreation($faker->dateTimeThisCentury());
            $recette->setAuteur($this->getReference("auteur_" . $faker->numberBetween(0,49), Auteur::class));

            $manager->persist($recette);

            // Cette ligne va nous permettre d'utiliser une entité dans une autre fixture
            $this->addReference("recette_$i" , $recette);
        }
            $manager->flush();
    }

    // Forcer d'exécuter AuteurFixture avant cette fichier
    public function getDependencies(): array
    {
        return[
            AuteurFixtures::class
        ];
    }
}
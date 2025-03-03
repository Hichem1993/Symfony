<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         for($i = 0; $i < 50 ; $i++){
            $faker = Factory::create();
            $auteur = new Auteur();
            $auteur->setEmail($faker->email());
            $auteur->setPrenom($faker->firstName());
            $auteur->setNom($faker->lastName());

            $manager->persist($auteur);
         }
            $manager->flush();
    }
}
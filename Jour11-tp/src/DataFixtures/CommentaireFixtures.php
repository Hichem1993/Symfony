<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CommentaireFixtures extends Fixture
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

            $manager->persist($commentaire);
         }
            $manager->flush();
    }
}

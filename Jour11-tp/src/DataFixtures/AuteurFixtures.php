<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuteurFixtures extends Fixture
{

   public function __construct(private UserPasswordHasherInterface $hasher)
   {
      
   }


   public function load(ObjectManager $manager): void
   {
         $users = [
            ["email" => "admin@yahoo.fr" , "role" => "ROLE_ADMIN", "password" => "demo" ],
            ["email" => "redacteur@yahoo.fr" , "role" => "ROLE_REDACTEUR", "password" => "demo" ]
         ];

         foreach ($users as $k => $user) {
            $auteur = new Auteur();
            $auteur->setEmail($user["email"])
                   ->setPassword(
                     $this->hasher->hashPassword($auteur , $user["password"])  // Il faut obligatoirement HASHE le password stocké en BDD
                   )
                   ->setRoles([$user["role"]]);
            $manager->persist($auteur);
            $this->addReference("auteur_$k" , $auteur);
         }
         $manager->flush();
   }
}
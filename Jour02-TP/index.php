<?php

/*
require_once "src/Controller/Back/Dashboard.php";
require_once "src/Model/Bdd.php";
require_once "src/Etudiant.php";
require_once "src/Formation.php";
require_once "src/Cours.php";
*/


require_once "vendor/autoload.php";

$dash = new App\Controller\Back\Dachboard();
$e = new App\Etudiant();
$c = new App\Cours();
$bdd = new App\Model\Bdd();


// la maniére que nous allons utiliser c'est via composer

// Install :
// cd jour02-tp
// composer init

// Générer une fichier composer.json et dossier qui s'appelle vendor

// composer.json ===> Changer "App\\": "src/"
// composer dump-autoload
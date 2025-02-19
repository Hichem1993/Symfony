<?php
// Utiliser la librairie que l'on vient de télécharger

// La librairie que l'on vient de télécharger est dans le namespace suivant :
use Symfony\Component\Yaml\Yaml;

require_once "vendor/autoload.php";

// Prendre le contenu du fichier
// Parcourir
// Transformer en tableau
// parseFile() est une méthode static de la class Yaml
// $data = Yaml::parseFile("exo.yaml");

$data = Yaml::parseFile("decouverte.yaml");
echo($data["articles"][0]["title"]);
echo "\n";
echo($data["articles"][2]["url_img"]);


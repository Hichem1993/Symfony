# premier projet 

1. cd .. # se positionner dans le dossier module7
2. symfony new jour03-premier --webapp 

- la commande qui permet de créer un projet symfony
- la version webapp avec tous les composants classique pour un site internet


# Présentation dossier : Symfony ==> Framework
Plusieurs dossiers :
assets/ ==> tous les fichiers .js / .css / .scss qui sont compilés avec webpack (bundle)
bin/ ==> script que l'on peut exécuter en ligne de commande dans le terminal
        - console
        - phpunit
config/ ==> dossier qui contient des fichiers des configurations
        ==> fichier qui décrivent comment les modules / composants de symfony soivent fonctionner
        ==> Plein de fichiers .yaml
migrations/ ==> Dossier qui contient des scripts qui vont décrire la structure
        ==> Tables dans notre base de données
public/ ==> Tous les fichiers .js / .css / image / pdf ... SANS COMPILATION
src/ ==> Le dossier dans lequel vous allez passer 95% de votre temps dans un projet SYMFONY
     ==> Controller
     ==> Model
     ==> Formulaire
     ==> Service ...
templates/ ==> Fichier de VUE : fichier dans lequelles vous avez twig + html (.html.twig)
tests/ ==> Stocker des fichiers de test : code qui permet de tester votre code
       ==> Qui utiliser notament une librairie PHP qui s'appelle PHPUnit
       ==> Avec laquel on peut faire des tests unitaires / test intégration ...
translations/ ==> Dossier qui contient les fichiers de traductions
var/ ==> Dossier qui contient les fichiers "variables" / notamment le cache
vendor/ ==> Dossier vient avec composer qui est énorme
        ==> ici que vous avez le code source de Symfony et de tous les librairies dont le framework dépend


Plusieurs fichiers :
.env en 3 versions ==> Fichier d'environnement : mettre les informations propres à l'environnement d'exécution du projet ==> adresse de la base de données / information sur l'environnement
.gitignore ==> Vient avec git
compose.yaml (docker) ==> Créer une base de données via docker (postgres)
composer.json ==> Vient avec composer : contient la liste complète de tous les modules installés dans votre projet Symfony
importmap.php ==> Fichier qui permet d'importer des fichiers js / css ... assets ==> public
phpunit ==> Fichier de configuration de PHPUnit
symfony.lock ==> Informations sur l'installation de votre projet Symfony
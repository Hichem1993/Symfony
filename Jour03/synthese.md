# Synthese :
- Dans le monde de PHP il est possible de télécharger des librairies de la communauté (de très bonne qualité) avec composer
- Pour installer une librairie :
    1. cd <nom_dossier> : choisir le dossier OU vous voulez utiliser la librairie
    2. composer require <nom/librairie>
    3. Le site internet qui permet de trouver une librairie (et la commande d'installation) packagist.org

- Utiliser la librairie :
    1. Créer un fichier .php
    2. `require_once "vendor/autoload.php"`
    3. YAML::parseFile()
    4. Carbon::Carbon::createFromDate()
    5. Enfin attention les librairies sont stockées dans des namespace
        1. use Carbon\carbon;
        2. use Symfony\Component\Yaml\Yaml
    6. Rappel : les namespace sont utilisés par composer pour l'autoload

- Chaque librairie bien faite dispose d'un mode d'emploi :
    - https://carbon.nesbot.com/
    - https://symfony.com/doc/current/components/yaml.html

- invitation ==> getcomposer.org
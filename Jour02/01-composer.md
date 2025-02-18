# Composer :
- Outil en ligne de commande qui permet plusieurs choses dans un projet PHP
- Outil qui permet de télécharger des librairies en PHP
- Dans React npm install
- Dans le monde php ==> `composer require <librairie>`
- npm install <librairie>  ==>  npmjs.com
- composer require  ==>  https://packagist.org/

===> Logiciel en ligne de commande qui l'on appelle des "GESTIONNAIRES DE DEPENDANCES"
- Logiciel qui permet de réconcilier les logiciels installés sur votre ordinateur
- Permet de veillé que le logiciel / le code que vous téléchargez est COMPATIBLE AVEC VOTRE environnement de travail

- En PHP(et dans tous les languages) il est conseillé de découper son codeen plusieurs fichiers
    - index.php
    - Controller/Abstractcontroller.php
    - Controller/Frontcontroller.php
    - Controller/Backcontroller.php
    - ...
    - Model/BDD.php
    - Vue/front/header.php
    - Vue/front/footer.php
    - ...

Et en PHP on utilise `require_once`  en index.php et Abstractcontroller.php
- require_once() ==> copier coller dans le fichier index.php

===> Pour les projets PRO : vous avez plus 100 000 lignes de code ET réparties dans plus de 7000 fichiers
===> Deuxieme role de composer ==> Version supérieure require_once() / autoloader
===> Norme PSR-4 ==> PHP Standards Recommendations

Si je veux respecter la norme PSR-4 pour autoloader mes fichiers je dois :
    - Utiliser concept de PHP qui s'appelle `namespace`
    - Utiliser les noms de dossiers (arborescence) dans le `namespace`
    - EXEMPLE : src/Model/Etudiant.php

```php

<?php
namespace App\Model ;
class Etudiant{

}

```

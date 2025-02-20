# Rappel :

## Installé et démarré notre premier projet Symfony
1. Lancer un terminal
2. saisit les commandes suivantes :

```sh
symfony new <nom_projet> --webapp
# installer moi symfony version site internet
# le coeur de symfony + plein de modules / composants pour faire un site internet
# commande elle prend 40 secondes - 1 minute
cd <nom_projet>
# Ce positionner dans le dossier racine du projet
symfony serve
# Lancer le serveur de développement interne de symfony
```


## Les commandes à connaitre sur Symfony :
```sh
symfony serve  # Démarre le serveur de développement
symfony serve:start  # Démarre le serveur de développement
symfony serve -d  # demarrer le serveur en mode détaché
symfony serve:stop  # stopper le serveur

# Si le serveur symfony ne fonctionne pas alors on utilise le serveur interne de PHP
php -S localhost:8000 -t public
```


## Commencer à travailler sur Symfony :
- Ca doit vous rappeler le projet recette de cuisine
- index.php ==> public/index.php (le point d'entrée de notre application)
- Controller ==> src/Controller créer un fichier "FrontController.php"
- Attention le nom du fichier des controller DOIT se finir par controller


```php
<?php
namespace App\Controller // ESSENTIEL pour que symfony TROUVE ce fichier et le charge correctement

class FrontController{
    #[Route("/contact" , name:"page_contact")]
    public function contact(){
        // 1 méthode par page de votre site internet
        // OBLIGATOIREMENT une méthode de Controller DOIT routerner une reponse (HTTP)
        return new Response("Un petit texte");
    }
}
```

```md
## cas pratique 

- dans le controller HomeController ajouter une nouvelle méthode "contact"
- cette méthode est accessible via l'adresse http://127.0.0.1:8000/contact
- la méthode doit retourner le texte suivant : "je suis la page de contact !!!!"
```
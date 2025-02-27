# Créer l'entité Etudiant : 

 1. Etape 1 : Création l'entity et Repository
```sh
# attention il faut être dans le dossier racine de projet :

symfony console make:entity

==> Nom entity : Etudiant
==> turbo : no

==>boucle : nom du champs : prenom
            type : string/ integer / ?
            nullable : yes / no

            nom du champs : .....
            type : ....

```

- Générer deux fichiers ==> src/Entity/Etudiant.php  (Propriété + getter et setter)
                        ==> src/Repository/EtudiantRepository.php  (Le code de base)


2. Etape 2 : Création la Table Etudiant

```sh
symfony console make:migration
symfony console doctrine:migration:migrate
```


3. Etape 3 :

config/package/twig.yaml ====> Ajouter dans twig : form_themes: [ 'bootstrap_5_layout.html.twig' ]
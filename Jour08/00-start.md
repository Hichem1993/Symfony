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



## Personnalisé le formulaire :

```html

    {{form_start(form)}}

        <section class="row">
            <div class="col-3">
                {{ form_row(form.prenom, {label:"Prénom* :"}) }}
            </div>
            <div class="col-3">
                {{ form_row(form.nom, {label:"Nom* :"}) }}
            </div>
            <div class="col-3">
                {{ form_row(form.age, {label:"Age* :"}) }}
            </div>
            <div class="col-3">
                {{ form_row(form.role, {label:"Rôle* :"}) }}
            </div>
            <div class="col-12">
                {{ form_row(form.cv, {label:"CV* :", attr:{
                    placeholder : "Vos expériences...",
                    rows : 8,
                    class : "border border-primary border-3"
                }}) }}
            </div>
            <div class="col-12 d-flex justify-content-end">
                {{ form_row(form.creer , {
                    label: "Envoyer votre CV", attr:{
                        class:"btn btn-danger btn-lg"
                    }
                })}}
            </div>
        </section>
    
    {{form_end(form)}}

```
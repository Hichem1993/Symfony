# Relation :
- Relier des tables ==> Découper les informations d'un projet en plusieurs tables au lieu d'en avoir 1 seule énorme

==> Article :
        - id PK
        - titre
        - description


entre ces deux tables ===> - NN : Many to many
                                    - article rédiger par plusieurs étudiant
                                    - etudiant peut rédiger plusieurs articles
                                    - ====> Créer une table intermédiaire entre les 2 tables
                           - 1N / N1 : One to many / Many to one
                                    - 1 article ne peut avoir qu'un seul etudiant comme auteur
                                    - 1 etudiant peut rédiger plusieurs articles
                                    - ====> Rajouter une clé etrangere sur la table du côté N 
                           - 11 : One to one
                                    - 1 etudiant ne peut rédiger 1 seul article
                                    - 1 article ne peut être rédiger que par 1 seul étudiant
                                    - ====> Fusionner les deux tables 


==> Etudiant
        - id PK
        - prenom
        - nom



1. Créer Entity
2. #[ORM\ManytoMany]
3. #[ORM\OnetoMany]
4. ...


```sh
symfony console make:migration  // MPD (Model Physique des Données)
symfony console d:m:m

```


# Enoncé :

Créer un site internet de type blog
je veux pouvoir gérer 3 concepts :
    - article
        - id PK
        - titre
        - url_img
        - dt_creation
    - categorie
        - id PK
        - nom
    - auteur
        - id PK
        - email
        - nom

## Relation entre les tables :
article <===> categorie  (OneToMany - ManyToOne)
        ==> categorie peut etre associée àPLUSIEURS articles
        ==> article ne peut etre associé que à 1 seule catégorie

article <===> auteur  (OneToMany - ManyToOne)
        ==> auteur peut rédiger PLUSIEURS article
        ==> article ne peut etre rédigé par 1 SEUL auteur


## Objectif :
1. créer un projet Symfony
2. Créer une base de donnée
3. créer un espace qui permet à une personne que ne sait pas coder de gérer ces concepts (CRUD)
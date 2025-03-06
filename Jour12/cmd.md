## première liste de commandes 

### créer un projet

```sh
symfony new <projet> --webapp
```

### démarrer le serveur de dev

```sh
cd <projet>
symfony serve 
```

### créer une base de données

- modifier le fichier .env => activer le type de base de données 

```sh
symfony console doctrine:database:create
```

### créer des tables

```sh
symfony console make:entity
## attention bien regarder le contenu des entités créées
symfony console make:migration
## attention bien regarder les fichiers de migrations
symfony console doctrine:migration:migrate
## créer les tables
```


## Astuce

```sh
symfony console doctrine:migrations:migrate prev
```

## créer fixture

```sh
composer require orm-fixtures --dev
composer require --dev fakerphp/faker


symfony console make:fixture
# il faut coder
symfony console doctrine:fixture:load
# remplir mes tables de données 
```

### créer mes vues

```sh
symfony console make:controller
symfony console make:form
symfony console make:crud 
```

### créer l'authentification

```sh
symfony console make:auth
```

## Extension - Filter :

```sh
symfony console make:twig-extension
```


## Changement de Sqlite to Mysql :

1. Windows :
      1. Installer un serveur MySQL en local ==> XAMPP
      2. Démarrer XAMPP et les services : Apache - MySQL
      3. Cliquer sur admin de MySQL (PhpMyAdmin), Type de SGBD (Voir serveur de base de donnée)
      4. Modifier le code :
            1. Renommer Migrtion ==> migrations_sqlite
            2. Créer un nouveau dossier "migrations"
            3. fichier .env
                  1. Commenter SQLITE
                  2. Decommenter mariaDB et changer la version de serveur comme sur phpMySql
                  3. # DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
                  4. ====> DATABASE_URL="mysql://root:@127.0.0.1:3306/recettes_demo?serverVersion=10.4.24-MariaDB&charset=utf8mb4"
      5. Lancer Terminal :
            1. cd dans le dossier
            2. symfony console d:d:c
            3. symfony console make:migration
            4. symfony console d:m:m
            5. symfony console d:f:l  (Fixture)


2. Linux :
      1. Installer un serveur MySQL en locald



## Authentification :
1. cd dossier du projet
2. Supprimer Auteur.php  et  Auteurrepository.php
3. symfony console make:user
      1. nom : Auteur
      2.  created: src/Entity/Auteur.php
            created: src/Repository/AuteurRepository.php
            updated: src/Entity/Auteur.php
            updated: config/packages/security.yaml
4. Création Form Login : symfony console make:security:form-login
      1. Login et Logout dans le controller
      2. Template de la page connexion (form html)
      3. modifier la sécurité : liaison entre formulaire et la base de données
5. symfony console make:migration
6. Vider les tables :
      1. symfony console doctrine:query:sql "DELETE FROM commentaire"
      2. symfony console doctrine:query:sql "DELETE FROM auteur"
      3. symfony console doctrine:query:sql "DELETE FROM recette"
7. symfony console d:m:m
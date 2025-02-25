# Doctrine :
- Projet PHP open source
- Support de cours ==> Chapitre Entité / Minipuler des entités

- Site officiel du projet: https://www.doctrine-project.org/
- Doctrine est un GROS projet, nous allons utiliser des sous projets :
    - Migration
    - Persistance
    - DAL : Datebase Abstraction Layer
    - ....

- Doctrine est un projet livré dans Symfony par défaut
- Symfony contribue à ce projet
- Symfony et Doctrine sont deux projet qui peuvent vivre parallèles ou ensemble
- Si vous aalez regarder le fichier composer.json, vous devez voir des mentions à la librairie


## Si je veux discuter avec une BDD :

1. il faut se connecter :
2. il faut aller dans le fichier `.env`
      1. Décommente `DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"`
      2. Mettre en # devant la BDD `DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"`
      3. Je veux que mon projet fonctionne que une base de données SQLITE
      4. Et notre future base de donnée s'appelera "data.db" et elle se situera dans le dossier `var`

3. Créer la base de donnée
      1. Il est possible d'utiliser des lignes de commande pour créer la BDD
            1. Attention la commande doit etre exécuter dans le dossier jour03-premiers
            2. Pour Linux : sudo apt install php-sqlite3
            3. cd jour03-premiers
            4. `symfony console doctrine:database:create`    OU   `symfony console d:d:c`

4. Créer une table :
      1. Table : Pays
            1. id PK INT Autoincrement
            2. nom VARCHAR (255)
            3. population INT
            4. capital VARCHAR (255)
            5. dt_creation DATE
      2. Sur Doctrine :
            1. Entité (class)
                  1. Dans le dossier src/Entity ==> créer un fichier Pays.php
                  2. Créer un class :  #[ORM\Entity()] class Pays{}
                  3. créer des variable avec les noms des colonnes
            2. Migration (class)
                  1. Dans terminal :
                        1. Attention la commande doit etre exécuter dans le dossier jour03-premiers
                        2. `symfony console make:migration`
                        3. Si vous avez oublié une colonne OU preciser des caractéristiques supplémentaires sur une colonne :
                              1. Modifier l'Entity
                              2. Supprimer la migration "fichier version.php dans le dossier migration"
                              3. Regénérer la migration via la commande `symfony console make:migration`
            3. Exécuter la migration :
                  1. Dans terminal
                        1. Attention la commande doit etre exécuter dans le dossier jour03-premiers
                        2. `symfony console doctrine:migrations:migrate`    OU   `symfony console d:m:m`

5. Inserer des données dans notre table :
      1. Modifier notre entité : Setter/Getter
      2. Ajouter une nouvelle Route/Méthode dans un Controller
            1. Créer une instance de notre entité
            2. Lui ajouter des valeurs
            3. Et utiliser EntityManager ==> Persister notre instance en base de données


## UPDATE :
- Modifier une ou plusieurs ligne existantes en BDD :
1. Repository : Je souhaite modifier un profil etudiant insérer en BDD
      1. src/Repository
      2. Créer fichier EtudiantRepository.php
      3. Créer la class EtudiantRepository
      4. Liaison entre Entity Etudiant ET EtudiantRepository
      5. Ajouter dans EntityEtudiant : `#[ORM\Entity(repositoryClass:EtudiantRepository::class)]`
      6. Dans controller :
            1. Recherche via `$etudiantRepository->findOneBy(["id"=>2]);`
            2. Setter pour modifier la valeur
            3. persist()
            4. flush()


## DELETE :
1. Repository : Je souhaite de supprimer un profil etudiant insérer en BDD
      1. src/Repository
      2. Créer fichier EtudiantRepository.php
      3. Créer la class EtudiantRepository
      4. Liaison entre Entity Etudiant ET EtudiantRepository
      5. Ajouter dans EntityEtudiant : `#[ORM\Entity(repositoryClass:EtudiantRepository::class)]`
      6. Dans controller :
            1. Recherche via `$etudiantRepository->findOneBy(["id"=>2]);`
            2. Remove pour modifier la valeur
            3. persist()
            4. flush()

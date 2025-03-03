# Fixtures :

Pour la création de dossier Fixture :

```sh
composer require orm-fixtures --dev         {*Ajouter dossier*} 
composer require --dev fakerphp/faker       {*Installer Faker*} 
```

## Fixture Table :

```sh
symfony console make:fixture
```

===> Choisir le nom du tables


## Exécuter le fichier :

```sh
symfony console doctrine:fixture:load
```
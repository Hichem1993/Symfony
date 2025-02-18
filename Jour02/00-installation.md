# Sur Linux :

## Installer php :
1. Terminal : `php -v`
2. sudo su
3. apt install php libapache2-mod-php


## Installer composer :
1. site : https://getcomposer.org/
2. Lien download
3. exit sur terminal
4. Sur terminal :
    - php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    - php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
    - php composer-setup.php
    - php -r "unlink('composer-setup.php');"

    - sudo mv composer.phar /usr/local/bin/composer
    - composer -v


## Installation Symfony-cli :
1. https://symfony.com/download
2. Terminal :
      1. wget https://get.symfony.com/cli/installer -O - | bash
      2. curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
      3. sudo apt install symfony-cli




# Sur Windows :

## Installation php:
1. Installer xamp :  https://www.apachefriends.org/download.html  : Version 8.2
2. Path


## Install composer :
1. https://getcomposer.org/download/
2. Telecharger et installer


## Install symfony-cli
1. Sur Windows PowerShell taper ligne de commande :
      1. Set-ExecutionPolicy RemoteSigned -scope CurrentUser
      2. iex (new-object net.webclient).downloadstring('https://get.scoop.sh')
      3. OU / OR : Invoke-WebRequest get.scoop.sh | Invoke-Expression
      4. scoop install symfony-cli


# Dernier verif :
php -v
composer -v
symfony -v
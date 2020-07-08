#!/bin/bash

set -e

COMPOSER_IMG=apache-monitoria:dev

echo -e "\nAtualizando repositório"
git pull

echo -e "\nAtualizando composer.lock"
docker run --rm --interactive --tty \
            --volume "$PWD":/var/www/html \
            $COMPOSER_IMG composer update

echo -e "\nInstalando dependências localmente"
docker run --rm --interactive --tty \
            --volume "$PWD":/var/www/html \
            $COMPOSER_IMG composer install

echo -e "\nCorrigindo permissões na pasta da aplicação"
sudo chown "${USER}":www-data -R .
sudo chmod g+w -R application/logs/

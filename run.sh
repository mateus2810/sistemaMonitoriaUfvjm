#!/bin/bash

DB_DIR=~/mysql/monitoria
WEB_CONTAINER_NAME=apache-monitoria
DB_CONTAINER_NAME=mysql-monitoria
COMPOSER_IMG=apache-monitoria:dev

set -e

echo -e "\nAtualizando o código do projeto"
git pull --all

echo -e "\nCorrigindo permissões na pasta da aplicação"
sudo chown $USER:www-data -R .

# Testando se não existe pasta para o banco de dados
if [ ! -d "$DB_DIR" ]; then
    echo -e "Criando pasta para armazenar dados do mysql em $DB_DIR"
    mkdir -p "$DB_DIR"
fi

echo -e "\nAtualizando composer.lock"
docker run --rm --interactive --tty \
            --volume $PWD:/var/www/html \
            $COMPOSER_IMG composer update

echo -e "\nInstalando dependências localmente"
docker run --rm --interactive --tty \
            --volume $PWD:/var/www/html \
            $COMPOSER_IMG composer install

echo -e "\nCorrigindo permissões na pasta da aplicação"
sudo chown $USER:www-data -R .
sudo chmod g+w -R application/logs/

echo -e "\nIniciando a Stack"
docker-compose up -d

echo -e "\nAcompanhe os logs da aplicação em: docker logs -f $WEB_CONTAINER_NAME"
echo -e "\nAcompanhe os logs do banco em: docker logs -f $DB_CONTAINER_NAME"
echo -e "\nQuando necessario logar no container: docker exec -it $WEB_CONTAINER_NAME /bin/bash"

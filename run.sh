#!/bin/bash

DB_DIR=~/mysql/monitoria
WEB_CONTAINER_NAME=appmonitoria
DB_CONTAINER_NAME=mysqlmonitoria

set -e

#echo -e "\nCorrigindo permissões na pasta da aplicação"
#sudo chgrp www-data -R .

# Testando se não existe pasta para o banco de dados
if [ ! -d "$DB_DIR" ]; then
    echo -e "Criando pasta para armazenar dados do mysql em $DB_DIR"
    mkdir -p "$DB_DIR"
fi

echo -e "\nInstalando dependências localmente"
docker run --rm --interactive --tty \
            --volume $PWD:/app \
            hub.dds.ufvjm.edu.br/desenvolvimento/composer install --ignore-platform-reqs --no-scripts

echo -e "\nIniciando a Stack"
docker-compose up -d

echo -e "\nAcompanhe os logs da aplicação em: docker logs -f $WEB_CONTAINER_NAME"
echo -e "\nAcompanhe os logs do banco em: docker logs -f $DB_CONTAINER_NAME"
echo -e "\nQuando necessario logar no container: docker exec -it $WEB_CONTAINER_NAME /bin/bash"

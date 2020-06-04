#!/bin/bash

set -e

echo -e "\nParando a stack"
docker-compose down

echo -e "\nRemovendo as pastas"
sudo rm -rf ~/apps/monitoria
sudo rm -rf ~/mysql/monitoria

echo -e "\nStack removida"

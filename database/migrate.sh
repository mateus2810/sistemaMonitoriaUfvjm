#!/bin/bash

echo -e  "------------------------------------"
echo -e  "  Starting Config of Application"
echo -e  "------------------------------------"

until !(mysql -u root -h ${HOST} -P 3306 2>&1 | grep -q 'Unknown MySQL server'); do
	>&2 echo -e "MySQL não subiu. Aguardando..."
	sleep 3
done

echo -e "Executando flyway..."

while
	{ output=$(/var/www/html/database/flyway/flyway -url=jdbc:${DRIVER}://${HOST}:${PORTA}/${BANCO}?characterEncoding=UTF-8 -user=${USUARIO} -password=${SENHA} migrate 2>&1 1>&3-) ;} 3>&1
	if echo -e $output | grep -q 'ERROR:'; then
		echo -e $output
		echo -e "Erro a executar flyway. Aguardando..."
		sleep 3
	else
		break
	fi

	(( 1 ))
do :; done


echo -e  "------------------------------------"
echo -e  "   Ending Config of Application"
echo -e  "------------------------------------"


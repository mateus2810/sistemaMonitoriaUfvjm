#!/bin/bash

echo -e  "------------------------------------"
echo -e  "  Starting Config of Application"
echo -e  "------------------------------------"
 
 
until !(mysql -u root -h dbase -P 3306 2>&1 | grep -q 'Unknown MySQL server'); do
	>&2 echo -e "MySQL não subiu. Aguardando..."
	sleep 3
done
 
echo -e "Executando flyway..."
  
while
	#output=$(/var/www/html/arquivos_BD/flyway-6.1.2/flyway migrate 2>&1 3>&1)
	{ output=$(/var/www/html/database/flyway/flyway migrate 2>&1 1>&3-) ;} 3>&1
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
 

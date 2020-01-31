#!/bin/bash

echo -e "\nVerificador de erros/sujeira PHP Mess Detector"
phpmd application text phpmd-ruleset.xml
RETORNO=$?

exit $RETORNO

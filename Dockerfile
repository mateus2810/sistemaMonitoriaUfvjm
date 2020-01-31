#FROM php:7.3-apache 
#FROM php:7.1-apache
#FROM php:5.6-apache
FROM php:7.2.2-apache 

ENV PHP_MEMORY_LIMIT 384M

#Copiando o código do repositório para o working_dir (/var/www/html) do container
ADD . .

COPY database/migrate.sh /usr/local/bin/
  
RUN docker-php-ext-install mysqli \
 && a2enmod rewrite

RUN apt-get update \
 && apt-get install -y mysql-client wget htop curl git zip unzip \
 && apt-get clean \
 && chmod +x /usr/local/bin/migrate.sh

RUN wget https://getcomposer.org/composer.phar -O /usr/bin/composer && \
    chmod +x /usr/bin/composer && \
    composer global require hirak/prestissimo

# Instalando Sensiolabs security checker para verificar bibliotecas inseguras
RUN php -r "readfile('https://get.sensiolabs.org/security-checker.phar');" > /usr/bin/security-checker
RUN chmod +x /usr/bin/security-checker

# Instalando PHP Mess Detector
RUN php -r "readfile('http://static.phpmd.org/php/latest/phpmd.phar');" > /usr/bin/phpmd
RUN chmod +rx /usr/bin/phpmd

# instalando dependências do composer
RUN composer install

CMD (/usr/local/bin/migrate.sh &) && (apache2-foreground)

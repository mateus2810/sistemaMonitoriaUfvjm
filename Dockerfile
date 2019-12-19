#FROM php:7.3-apache 
#FROM php:7.1-apache
#FROM php:5.6-apache
FROM php:7.2.2-apache 

COPY src/config_app.sh /usr/local/bin/
  
RUN docker-php-ext-install mysqli \
 && a2enmod rewrite

RUN apt-get update \
 && apt-get install -y mysql-client wget htop \   
 && apt-get clean \
 && chmod +x /usr/local/bin/config_app.sh


CMD (/usr/local/bin/config_app.sh &) && (apache2-foreground)

FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive
ENV DEBCONF_NONINTERACTIVE_SEEN=true

RUN apt-get update -y
RUN apt-get install -y php libapache2-mod-php unzip php-cli nano
RUN apt-get install -y apache2 curl wget php-imagick php-curl php-bz2 php-gd php-intl php-mbstring php-mysql php-zip php-apcu php-xml php-ldap php-dom php-simplexml
RUN apt install -y apache2-utils 
RUN echo "Dockerfile Test on Apache2" > /var/www/html/index.html

RUN cd ~
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
RUN HASH=`curl -sS https://composer.github.io/installer.sig`
RUN php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
RUN rm -rf /var/www/html/*
# COPY . .

RUN apt install -y apt-transport-https lsb-release ca-certificates curl dirmngr gnupg

# RUN composer install
EXPOSE 80 3306
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
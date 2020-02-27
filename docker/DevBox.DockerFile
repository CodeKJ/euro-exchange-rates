FROM ubuntu:18.04
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y apache2
RUN apt-get install -y php
RUN apt-get install -y php-dev
RUN apt-get install -y php-mysql
RUN apt-get install -y libapache2-mod-php
RUN apt-get install -y php-curl
RUN apt-get install -y php-json
RUN apt-get install -y php-common
RUN apt-get install -y php-mbstring
RUN apt-get install -y php-gd
RUN apt-get install -y php-xml
RUN apt-get install -y curl
RUN apt-get install -y php-cli
RUN apt-get install -y unzip
RUN apt-get install -y php-zip
RUN apt-get install -y composer
RUN apt-get install -y git man
RUN apt-get install -y nano

COPY docker/virtualhost.conf /etc/apache2/sites-available/000-default.conf

CMD ["apachectl","-D","FOREGROUND"]

RUN a2enmod rewrite

EXPOSE 80

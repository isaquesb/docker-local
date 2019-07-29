FROM phpdockerio/php71-fpm:latest

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get -y --no-install-recommends install locales git openssh-server curl supervisor php7.1-mysql php-redis php7.1-gd php7.1-mbstring php7.1-soap php-imagick \
    && locale-gen pt_BR && locale-gen pt_BR.UTF-8 && dpkg-reconfigure locales && update-locale \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/application"

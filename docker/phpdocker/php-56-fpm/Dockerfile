FROM phpdockerio/php56-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install git openssh-server curl supervisor php5-mysql php5-gd \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/application"

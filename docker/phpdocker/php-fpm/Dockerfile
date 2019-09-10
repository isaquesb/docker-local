FROM phpdockerio/php73-fpm:latest

RUN apt-get update \
    && apt-get -y --no-install-recommends install git openssh-server curl supervisor php7.3-mysql php7.3-pgsql php-redis php7.3-gd php7.3-mbstring php7.3-soap \
    && locale-gen pt_BR && locale-gen pt_BR.UTF-8 && dpkg-reconfigure locales && update-locale \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY entrypoint.sh /usr/bin/entrypoint.sh
RUN ["chmod", "+x", "/usr/bin/entrypoint.sh"]

CMD /usr/bin/entrypoint.sh

WORKDIR "/application"

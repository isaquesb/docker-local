FROM phpdockerio/php80-fpm:latest

RUN apt-get update \
    && apt-get -y --no-install-recommends install locales git openssh-server curl supervisor php8.0-mysql php8.0-sqlite php8.0-pgsql php-redis php8.0-gd php8.0-mbstring php8.0-soap \
    && locale-gen pt_BR && locale-gen pt_BR.UTF-8 && dpkg-reconfigure locales && update-locale \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY entrypoint.sh /usr/bin/entrypoint.sh
RUN ["chmod", "+x", "/usr/bin/entrypoint.sh"]
CMD /usr/bin/entrypoint.sh
WORKDIR "/application"

FROM phpdockerio/php73-fpm:latest

RUN apt-get update \
    && apt-get -y --no-install-recommends install locales git openssh-server curl supervisor php7.3-mysql php7.3-pgsql php-redis php7.3-gd php7.3-mbstring php7.3-soap \
    && locale-gen pt_BR && locale-gen pt_BR.UTF-8 && dpkg-reconfigure locales && update-locale \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN curl -s https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN bash -c "curl -s https://packages.microsoft.com/config/ubuntu/18.04/prod.list > /etc/apt/sources.list.d/mssql-release.list"
RUN apt-get update
RUN ACCEPT_EULA=Y apt-get -y install msodbcsql17 mssql-tools
RUN apt-get -y install unixodbc-dev

RUN apt-get -y install gcc g++ make autoconf libc-dev pkg-config
RUN apt-get -y install php-pear php7.3-dev
RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv

RUN bash -c "echo extension=sqlsrv.so" > "/etc/php/7.3/fpm/conf.d/sqlsrv.ini"
RUN bash -c "echo extension=pdo_sqlsrv.so" > "/etc/php/7.3/fpm/conf.d/pdo_sqlsrv.ini"

RUN bash -c "echo extension=sqlsrv.so" > "/etc/php/7.3/cli/conf.d/sqlsrv.ini"
RUN bash -c "echo extension=pdo_sqlsrv.so" > "/etc/php/7.3/cli/conf.d/pdo_sqlsrv.ini"

COPY entrypoint.sh /usr/bin/entrypoint.sh
RUN ["chmod", "+x", "/usr/bin/entrypoint.sh"]

CMD /usr/bin/entrypoint.sh

WORKDIR "/application"

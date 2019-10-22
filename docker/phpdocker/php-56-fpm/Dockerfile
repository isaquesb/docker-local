FROM phpdockerio/php56-fpm

#ENV DEBIAN_FRONTEND=noninteractive

#RUN echo America/Sao_Paulo > /etc/timezone && dpkg-reconfigure tzdata
#RUN echo "locales locales/locales_to_be_generated multiselect pt_BR.UTF-8 UTF-8" | debconf-set-selections && \
#	echo "locales locales/default_environment_locale select pt_BR.UTF-8" | debconf-set-selections
#RUN apt-get update && apt-get install locales -qq

#ENV LANG pt_BR.UTF-8
#ENV LC_ALL pt_BR.UTF-8

RUN apt-get update \
    && apt-get -y --no-install-recommends install git openssh-server curl supervisor php5-mysql php5-pgsql php5-gd \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN sed -i "/short_open_tag = .*/c\short_open_tag = On" /etc/php5/fpm/php.ini

WORKDIR "/application"

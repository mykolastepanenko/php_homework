FROM php:8.1-fpm

ARG WORKDIR

RUN apt-get -y update && apt-get -y install git unzip vim
RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.ide_key=phpstorm" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-install pdo pdo_mysql

ENV TERM xterm-256color
ENV PHP_IDE_CONFIG 'serverName=phpstorm'

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR $WORKDIR

CMD [ "php-fpm"]
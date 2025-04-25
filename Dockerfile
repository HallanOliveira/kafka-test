FROM php:8.1-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    iputils-ping \
    librdkafka-dev \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir diretório de trabalho (opcional)
WORKDIR /var/www/html

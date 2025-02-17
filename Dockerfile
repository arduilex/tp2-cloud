FROM php:8.0-apache

# Installer l'extension MySQLi
RUN docker-php-ext-install mysqli

# Activer les extensions PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

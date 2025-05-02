# Utiliser une image PHP officielle avec FPM
FROM php:8.1-fpm

# Installer des dépendances nécessaires pour Nginx
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    nginx \
    && docker-php-ext-install zip pdo pdo_mysql

# Télécharger et installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Télécharger et installer Symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de ton projet dans le conteneur
COPY . .

# Changer la propriété des fichiers pour l'utilisateur www-data
RUN chown -R www-data:www-data /var/www/html

# Pour que GIT donner accès à docker d'installer à partir de composer install 
RUN git config --global --add safe.directory /var/www/html
# Installer les dépendances avec Composer
RUN composer install

# Exposer les ports nécessaires
EXPOSE 80

# Configurer Nginx pour servir Symfony
COPY nginx/default.conf /etc/nginx/sites-available/default

# Démarrer Nginx et PHP-FPM
CMD service nginx start && php-fpm

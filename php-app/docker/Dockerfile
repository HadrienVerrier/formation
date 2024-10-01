# Ce fichier permet de construire l'image docker d'une application PHP

# Choix d'une image de base avec le mot clef FROM
FROM php:alpine 

# WORKDIR permet de définir le répertoire de travail, c'est à dire le répertoire dans lequel les commandes CMD, RUN, COPY seront exécutées 
# ainsi que le répertoire d'entrée dans le conteneur
WORKDIR /app

# COPY permet de copier des fichiers ou des répertoires depuis le système de fichiers de la machine hôte vers le système de fichiers du conteneur. 
# Le contexte de construction est le répertoire dans lequel se trouve le Dockerfile.
COPY ./php-app/app/composer.* .

# RUN permet d'exécuter des commandes lors de la construction de l'image
RUN apk add composer

# Chaque instruction dans un Dockerfile crée une nouvelle couche de l'image.
# Il faut donc réfléchir à l'ordre des instructions pour optimiser la taille de l'image.
RUN composer install

# Install mysqli
RUN 

# EXPOSE permet de déclarer les ports utilisés par l'application
EXPOSE 80

# ENV permet de définir des variables d'environnement
ENV ENV_VAR=env_value

# Copie le code source de l'application dans le répertoire de travail du conteneur
COPY ./php-app/app .

# CMD permet de définir la commande par défaut à exécuter lors du démarrage du conteneur
CMD ["php", "-S", "0.0.0.0:80" , "-t", "/app"]
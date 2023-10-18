# Petit jeu de combats de Pokémon en PHP

Ce projet est un petit jeu de combats de Pokémon développé en PHP. Vous trouverez en pièces jointes la base de données et les diagrammes qui ont servi pour la conceptualisation.

## Procédure d'installation

### Étape 1: Renommer les fichiers de configuration

1. Renommez le fichier `docker-compose-example.yaml` en `docker-compose.yaml`.
2. Modifiez les données du fichier `docker-compose.yaml` avec les informations spécifiques à votre environnement.

3. Renommez le fichier `.config.example` en `.config`.
4. Modifiez les données du fichier `.config` avec les informations spécifiques à votre environnement.

### Étape 2: Exécution de Docker Compose

1. Placez-vous dans le dossier qui contient le fichier `docker-compose.yaml` en utilisant le terminal.

2. Lancez Docker Compose avec la commande suivante :
   ```bash
   docker-compose up -d
   ```

### Étape 3: Configuration d'Apache

1. Le fichier Docker Compose crée un répertoire src dans le répertoire de travail.

2. Accédez au répertoire PHP du dossier :

   ```bash
   cd /etc/apache2
   ```

3. Visualisez le contenu du fichier de configuration d'Apache :

   ```bash
   cat sites-available/000-default.conf
   ```

4. Activez le module rewrite :

   ```bash
   a2enmod rewrite
   ```

5. Redémarrez le conteneur.

### Étape 4: Configuration du fichier de configuration d'Apache

1. Accédez au répertoire `sites-available` d'Apache :

   ```bash
   cd /etc/apache2/sites-available
   ```
2. Mise en place d'un éditeur de texte (`nano`) :

   ```bash
   apt update
   apt install nano
   ```
3. Sauvegardez le fichier de configuration par défaut :

    ```bash
   cp 000-default.conf BKP-000-default.conf
   ```
4. Modifiez le fichier de configuration `000-default.conf` avec les lignes suivantes, sous la ligne `DocumentRoot /var/www/html` :

    ```apache
   <Directory /var/www/html>
    Options Indexes FollowSymLinks MultiViews
    # Pour permettre le fonctionnement de .htaccess de WordPress
    AllowOverride All
    Order allow,deny
    allow from all
    </Directory>
   ```
5. Redémarrez le conteneur.

### Étape 5: Importation de la base de données

Connectez-vous à votre base de données dans phpMyAdmin et importez le fichier `Pokemon.sql` pour mettre à jour la base de données.

Auteur: Maxime Martrat
Date de création: 18/10/2023
Petit jeu de combats de pokemons en PHP
Vous trouverez en pièces jointes la base de données et les diagrammes qui ont servi pour la conceptualisation
ici la procedure d'installation

INSTALLATION :
	
Installer le docker compose dans un dossier
Se placer dans ce dossier avec le terminal
Et lancer le docker compose
docker-compose up -d
Le docker compose créer un fichier src dans le répertoire de travail
se placer dans le fichier php du dossier et
cd /etc/apache2

cat sites-available/000-default.conf

a2 enmod rewrite

Redémarer le container

 cd /etc/apache2/sites-available      

 apt update

apt update

apt install nano

Cd /etc/apache2/sites-available

 cp 000-default.conf BKP-000-default.conf

nano 000-default.conf

Copier ces lignes dans le dossier 000-default.conf
Sous la ligne DocumentRoot /var/www/html
	<Directory /var/www/html>
                Options Indexes FollowSymLinks MultiViews
                # To make wordpress .htaccess work
                AllowOverride All
                Order allow,deny
                allow from all
    </Directory>

Redémarer le container

Maintenant je peux passer le controlleur/la methode/ les paramètres dans l'URL
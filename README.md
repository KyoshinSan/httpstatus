# Projet PHP Monitoring Website (Httpstatus)

**Auteur :** DINH Jonathan & HERNANDEZ Theo
**Date :** 24/02/2019
**Sujet :** Faire un site de monitoring en PHP avec le framework Descartes

## Installation du projet

**Pré-requis :** Apache2, MariaDB, PHP, php-mysql, php-xml, php-curl, Composer, Supervisor
**/!\ Attention /!\\** Utilisez un Apache2 configuré pour lire dans /var/www/html avec les .htaccess activés et le module rewrite activé.

	$ cd /var/www/html
	$ git clone https://github.com/KyoshinSan/httpstatus.git
	$ cd httpstatus
	$ composer install
	$ mysql -u root -p < create_database.sql
	$ cp supervisor.conf /etc/supervisor/conf.d/supervisor.conf
	$ sudo systemctl restart supervisor
	
	
	


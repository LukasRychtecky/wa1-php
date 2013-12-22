install: clean composer_install composer htaccess config var

composer_install:
	curl -sS https://getcomposer.org/installer | php

composer:
	php composer.phar install

htaccess:
	cp .htaccess_template .htaccess

config:
	cp configs/config.ini_template configs/config.ini

var:
	mkdir var
	chmod 777 var

clean:
	rm -Rf var
	rm -Rf vendor

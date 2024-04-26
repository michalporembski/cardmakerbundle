#!/bin/bash

php ./vendor/bin/php-cs-fixer fix src
php ./vendor/bin/phpunit
php ./vendor/bin/phpcs src
php ./vendor/bin/php-cs-fixer check src
php ./vendor/bin/phpstan analyse -c phpstan.neon
php ./vendor/bin/phan --allow-polyfill-parser

#!/bin/bash

php ./vendor/bin/php-cs-fixer fix src
php ./vendor/bin/phpunit
php ./vendor/bin/phpcs src
php ./vendor/bin/php-cs-fixer check src
php -d memory_limit=512M ./vendor/bin/phpstan analyse -c phpstan.neon
php ./vendor/bin/phan --allow-polyfill-parser

php ./vendor/bin/phpunit --coverage-html ./tmp/coverage

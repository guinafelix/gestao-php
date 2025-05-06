#!/bin/bash

until nc -z -v -w30 mysql 3306
do
  echo "Aguardando o MySQL iniciar..."
  sleep 5
done

php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan migrate --force

exec php-fpm -F

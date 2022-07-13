#!/bin/bash

docker-compose kill

echo ''
echo '----- Setup Laravel'
echo ''

docker-compose build

docker-compose up -d

echo ''
echo '----- copy .env '
echo ''

cp .env.example .env

echo ''
echo '----- composer install | permissions'
echo ''

docker exec app composer install
docker exec app chmod -R 775 storage
docker exec app chown -R 1000:www-data storage bootstrap/cache

echo ''
echo '----- Generate Key'
echo ''

docker exec app php artisan key:generate

echo ''
echo '----- Optimize App'
echo ''

docker exec app php artisan optimize

echo ''
echo '----- Run Migrations'
echo ''

docker exec app php artisan migrate --seed

echo ''
echo '----- Starting Application'
echo ''


docker-compose kill
docker-compose up

#!/bin/bash
docker-compose build
docker-compose up -d
docker-compose exec php_fpm bash -c "cd /app/site && composer install && npm install && npm run prod && cd /app/weather_history/ && composer install && ./artisan migrate:fresh && ./artisan db:seed"
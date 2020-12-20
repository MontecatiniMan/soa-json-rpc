#!/bin/bash

export DOCKERHOST=$(ifconfig | grep -E "([0-9]{1,3}\.){3}[0-9]{1,3}" | grep -v 127.0.0.1 | awk '{ print $2 }' | cut -f2 -d: | head -n1)
docker-compose build
docker-compose up -d
docker-compose exec php_fpm bash -c "cd /app/site && composer install && npm install && npm run prod && cd /app/weather_history/ && composer install && ./artisan migrate:fresh && ./artisan db:seed"
echo "Done! Browse http://localhost to start Site App"
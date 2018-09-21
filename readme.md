# DOCKER APP

### Make crontab -e:
* * * * * docker exec app-php-fpm /usr/bin/php apps/default/artisan schedule:run >> /dev/null 2>&1

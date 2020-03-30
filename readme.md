# DOCKER APPs

### Usage

- Clone this repository as /var/www
- Put your app in /var/www/apps directory
- Run .sh from you app docker directory

### Crontab Jobs for Laravel Apps:

Run:
```
crontab -e
```

Install:

```
* * * * * docker exec app-php-fpm /usr/bin/php apps/default/artisan schedule:run >> /dev/null 2>&1
```

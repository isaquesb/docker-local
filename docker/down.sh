#!/bin/bash
/usr/bin/docker-compose -f docker/configs/redis.yml -f docker/configs/php-56.yml -f docker/configs/php-71.yml -f docker/configs/docker-compose.yml down

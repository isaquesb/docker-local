#!/bin/bash
/usr/bin/docker-compose -f docker/configs/redis.yml -f docker/configs/mysql57.yml -f docker/configs/docker-compose.yml up -d

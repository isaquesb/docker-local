#!/bin/bash
/usr/bin/docker-compose -f docker/configs/redis.yml -f docker/configs/docker-compose-sql-server.yml up -d --build


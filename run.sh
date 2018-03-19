#!/bin/bash

echo Uploading Application container 
docker-compose up -d

echo Copying the configuration example file
docker exec -it workoutPlan-api cp .env.example .env

echo Install dependencies
docker exec -it workoutPlan-api composer install

echo Generate key
docker exec -it workoutPlan-api php artisan key:generate

echo Make migrations
docker exec -it workoutPlan-api php artisan migrate

echo Information of new containers
docker ps -a 
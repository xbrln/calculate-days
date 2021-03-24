#!/bin/bash

# Pull master branch
git pull origin master

# Bring down containers
docker-compose down -v

# Build and bring up containers
docker-compose up --build -d

# Install dependencies
docker-compose run php composer install

# Run tests
docker-compose run php ./vendor/bin/phpunit tests

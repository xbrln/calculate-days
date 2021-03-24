#!/bin/bash

docker-compose run php vendor/bin/php-cs-fixer fix src
docker-compose run php vendor/bin/ecs check src public core tests
docker-compose run php vendor/bin/phpstan analyse --memory-limit=1G src public core tests
docker-compose run php ./vendor/bin/phpunit --testdox tests

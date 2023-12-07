build:
	docker compose -f docker/docker-compose.yml build
	docker compose -f docker/docker-compose.yml up -d
	docker exec -it fig-test-php-fpm composer install
	docker exec -it fig-test-php-fpm php artisan migrate --no-interaction
	docker exec -it fig-test-php-fpm php artisan db:seed

up:
	docker compose -f docker/docker-compose.yml up

down:
	docker compose -f docker/docker-compose.yml down

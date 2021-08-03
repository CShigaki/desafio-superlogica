#!/usr/bin/make -f

run:
	docker-compose up --build --remove-orphans --force-recreate --renew-anon-volumes

test:
	vendor/bin/phpunit

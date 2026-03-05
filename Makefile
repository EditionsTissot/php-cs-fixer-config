DOCKER_RUN_COMPOSER = docker run --rm -v "$(shell pwd):/app" -w /app composer:latest
DOCKER_RUN_PHP = docker run --rm -v "$(shell pwd):/app" -w /app php:8.4-cli

install:
	$(DOCKER_RUN_COMPOSER) install -n

cs-fix:
	$(DOCKER_RUN_PHP) vendor/bin/php-cs-fixer fix

phpstan:
	$(DOCKER_RUN_PHP) vendor/bin/phpstan analyse

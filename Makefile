
build:
	docker build --tag php .

composer-install:
	./php.sh composer install

test:
	./php.sh vendor/bin/phpunit --coverage-html ./coverage tests

unit-tests:
	./php.sh vendor/bin/phpunit --group unit tests

feature-tests:
	./php.sh vendor/bin/phpunit --group feature tests

phpstan:
	./php.sh composer phpstan

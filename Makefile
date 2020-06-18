NAME = product_app
VERSION = 0.02

.PHONY: build
build:
	docker build . -t $(NAME):$(VERSION) --rm
	docker tag $(NAME):$(VERSION) $(NAME):latest

.PHONY: start-server
start-server:
	docker-compose up -d

.PHONY: install
install:
	docker exec -i product_app_php_1 bash -c '/var/www/html/install.sh'

.PHONY: test
test:
	docker exec -i product_app_php_1 bash -c '/var/www/html/vendor/phpunit/phpunit/phpunit --configuration /var/www/html/phpunit.xml.dist /var/www/html/tests'

include .env

up:
	docker-compose -p ${PROJECT_NAME} up -d
up--build:
	docker-compose -p ${PROJECT_NAME} up --build -d

down:
	docker-compose -p ${PROJECT_NAME} down

start:
	docker-compose -p ${PROJECT_NAME} start
stop:
	docker-compose -p ${PROJECT_NAME} stop

bash_php:
	docker exec -it ${PROJECT_NAME}_${PHP_CONTAINER_NAME} /bin/bash
# API DEMO

## Installation

### install docker
https://docs.docker.com/v17.09/engine/installation/#supported-platforms

### build docker's PHP7 image
````
$ docker build -t php71-fpm docker/php/
````

### build docker's MySQL image
````
$ docker build -t mysql5.7 docker/mysql
````

### run docker containers
````
$ docker-compose up
````
### Setup database and load fixtures data
these commands must be run inside docker's php container
````
$ php bin/console doctrine:migrations:migrate
$ php bin/console doctrine:fixtures:load
````
### config database
see at .env
````
DATABASE_URL=mysql://root:develop@db:3306/coding-challenges
````

### generate SSH key
````
$ mkdir config/jwt
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
````

### Obtain the token
this token is a bear token which is used to gain access to product create, update, delete api
````
curl -X POST -H "Content-Type: application/json" http://localhost/api/login_check -d '{"username":"email_in_the_seed_file","password":"name_in_the_shee_file"}'
````

## Testing
````
$ php bin/phpunit
````

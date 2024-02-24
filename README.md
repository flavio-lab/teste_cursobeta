## Para rodar o projeto

1. docker-compose up -d
2. Acesse o container: docker exec -it teste_cursobeta-php-fpm-1 /bin/bash
3. php artisan key:generate
4. php artisan migrate

## Para criar uma conta utilizando o CLI

1. Acesse o container: docker exec -it teste_cursobeta-php-fpm-1 /bin/bash
2. php artisan tinker
3. php artisan account:create

## Sobre o Ambiente Utilizado:

1. Docker 
2. MySQL 8.0
3. PHP 8.1

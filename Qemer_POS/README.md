After pulling run on terminal

- composer update or composer install --prefer-dist --no-interaction
- cp .env.example .env
- php artisan key:generate
- php artisan migrate:refresh --seed
- php artisan storage:link

Happy coding.

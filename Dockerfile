FROM dunglas/frankenphp:php8.3

RUN install-php-extensions gd zip

WORKDIR /app

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-scripts

RUN php artisan package:discover --ansi

RUN php artisan storage:link || true

RUN chown -R www-data:www-data storage bootstrap/cache

ENV SERVER_NAME=:8080

EXPOSE 8080

CMD ["frankenphp", "php-server", "--listen", ":8080", "--root", "/app/public"]
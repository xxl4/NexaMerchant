# Nexa Merchant Laravel ecommerce Docker Compose

```bash
docker-compose up -d
```

## Application DB Migration and Seed
```bash
docker-compose exec nexamerchant-php-apache php artisan key:generate
docker-compose exec nexamerchant-php-apache php artisan migrate
docker-compose exec nexamerchant-php-apache php artisan db:seed
```

## Plugin Install

```bash
docker-compose exec nexamerchant-php-apache php artisan plugin:install shopify
```

## Plugin Uninstall

```bash
docker-compose exec nexamerchant-php-apache php artisan plugin:uninstall shopify
```

## Plugin List

```bash
docker-compose exec nexamerchant-php-apache php artisan plugin:list
```

## Plugin Update

```bash
docker-compose exec nexamerchant-php-apache php artisan plugin:update shopify
```

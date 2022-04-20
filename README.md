# Requirements

---

-   [php 8.0 - 8.1](https://laravel.com/docs/9.x)
-   [composer 2.x.x](https://getcomposer.org/download/)
-   [laravel 9](https://laravel.com/docs/9.x)

# setup

---

Run following commands to setup project

#### Clone repository

```
git clone https://jay_vistaran@bitbucket.org/shopstable/shopstable.git
```

#### Dependency install

```
composer install
```

#### Env setup for windows

```
copy .env.example .env
php artisan key:generate
```

#### Env setup for linux / mac

```
cp .env.example .env
php artisan key:generate
```

## Database setup

---

create database name as `shopstable`.

```
php artisan migrate
```

if you want drop current database and refresh

```
php artisan migrate:fresh
```

### After new dependency installtion

```
composer dump-autoload
```

## Start server

```
php artisan serve
```

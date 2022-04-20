# Requirements
--------------
  * [php 8.0 - 8.1](https://laravel.com/docs/9.x)
  * [composer 2.x.x](https://getcomposer.org/download/)
  * [laravel 9](https://laravel.com/docs/9.x)
  * [wampserver (*for development) ](https://wampserver.aviatechno.net/)

# setup
-------
Run following commands to setup project

#### Clone repository
```bash
git clone https://jay_vistaran@bitbucket.org/shopstable/shopstable.git
```

#### Dependency install
```bash
composer install
```
#### Env setup for windows
```bash
copy .env.example .env
php artisan key:generate
```
#### Env setup for linux / mac
```bash
cp .env.example .env
php artisan key:generate
```
#### Configuration (.env file)
from line no 11 to 16
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopstable
DB_USERNAME=root
DB_PASSWORD=
```

## Database setup
------------------
create database name as `shopstable`.

```bash
php artisan migrate
```
if you want drop current database and refresh
```bash
php artisan migrate:fresh
```
### After new dependency installtion
```bash
composer dump-autoload
```

## Start server
```bash
php artisan serve
```
## create virtualhost
---------------------
create virtualhost `master.net`.
create other virtualhost `jay.master.net`

open `master.net` in browser
register user with domain `jay`

now open `jay.master.net` on second window

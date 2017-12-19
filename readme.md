<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Deployment App
Copy environment settings
```bash
cp .env.example .env
```
From folder '../laradock' pick up docker containers : <b>nginx</b> and <b>mysql</b>
```bash
cd laradock
docker-compose up nginx mysql
```
Check list of containers
```bash
docker ps
```
Come in workspace container in order to pull up requires
```bash
docker exec -it laradock_workspace_1 bash
```
install them : 
```bash
composer install
```
Then create localy database MySql with setting in file .env
(into container workspace) Create our tables + seeding default stadium
```bash
php artisan key:generate
php artisan migrate:refresh --seed
exit
```
Open our [localhost](http://localhost) and check
## About app
My application is a simple ticket reservation format with a user-friendly design. <br>
All you need is to go to the standard stadium, select a sector in it and book a ticket by clicking on the place. Or you can create your own stadium by determining the number of sectors, rows and places of your choice<br>
The reservation takes place in real time, therefore other users will immediately notice the reservated places during their presence on the sector. Also, the process of the booking of a place by someone is monitored by another color.

<p align="center">
    <img src="public/img/TopCars-logo.png" width="250"/>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
</p>
<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<br><br>

> **Note**
> PHP 8.1 is required.

## Installations / Instructions

``` git  clone https://github.com/FrancescoFinizii/TopCars.git ```

``` composer install ```

``` cp .env.example .env ```

``` php artisan key:generate ```

Open `.env` file to configure your `database` and its `name`, `host`, and `password`

``` php artisan storage:link ```

``` php artisan migrate --seed ```

``` php artisan serve ```

`localhost:8000`

## Access Levels & Permissions

The system distinguishes three types of users. Each user has different permissions. You can test the web application using the following credentials:

### Client:

- **Username:** ``` clieclie ```

- **Password:** ``` Qwerty123@ ```

### Staff:

- **Username:** ``` staffstaff ```

- **Password:** ``` Qwerty123@ ```

### Admin:

- **Username:** ``` adminadmin ```

- **Password:** ``` Qwerty123@ ```

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Installation / Instalasi

Pertama, Clone dulu Reporsitory 
```
git clone https://github.com/Thirty21/juniorWeb.git
```
Jalankan perintah berikut untuk menginstal dependensi php
```
composer install
```

Jalankan perintah berikut untuk mengatur environment variable
```
cp .env.example .env
```
Pastikan Anda telah membuat database baru di MySQL dan silakan sesuaikan file .env dengan database Anda. Jalankan perintah berikut untuk membuat key untuk web app Anda
```
php artisan key:generate
```
Jalankan perintah berikut untuk membuat skema database
```
php artisan migrate
```
Terakhir, jalankan perintah berikut untuk menyalakan web server bawaan laravel
```
php artisan serve
```
## Sedikit kata kata dari mimin!!!
<b>Maaf jika kode kurang sempurna <br>
karena yang sempurna hanyalah kita yang dulu pernah bersama.</b>
<p align="center">
<img src="https://8limbmuaythai.com/wp-content/uploads/2015/11/7-kata-kata-bijak-dalam-kehidupan.jpg" width="700" >
</p>
<b>Hidup sendiri tanpan kekasih <br>
Cukup sekian dan terimakasih</b>

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

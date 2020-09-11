<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Cara Instalasi
Pastikan di komputer anda terinstall Composer dan Nodejs.
- Clone repository
- Jalankan perintah <b>composer install</b> di root directory aplikasinya (tunggu hingga selesai)
- Ubah nama file <b>.env.example</b> jadi <b>.env</b>
- Setting database di <b>.env</b> 
- Jalankan perintah <b>php artisan key:generate</b>
- Jalankan perintah <b>php artisan migrate:refresh --seed</b>
- Jalankan perintah <b>php artisan passport:install</b>
- Yeay, you made it!

- Jalankan perintah <b>php artisan serve</b>
- Buka postman/etc : http://127.0.0.1:8000/api/v1/{endpoints}
  
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

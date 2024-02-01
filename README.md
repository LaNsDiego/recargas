<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Antes de iniciar el proyecto

- Debemos cambiar el nombre del archivo `.env.example` a `.env`
- Debemos tener instalado [composer](https://getcomposer.org/) y en la consola ejecutamos `composer install` y eso debera generar la carpeta vendor de nuestro proyecto
- Eliminar la carpeta `/public/storage` y luego ejecutar en la consola el comando `php artisan storage:link`
- Crear la base de datos `db_depositos` con el script `export_db_depositos_data_structure.sql`.


## Ejecutar proyecto

Para iniciar el proyecto `php artisan serve`

## Ejecutar pruebas

En la consola ejecutamos el siguiente comando
```shell
./vendor/bin/phpunit
```

## Usuario para iniciar sesión
correo      : asesor1@kurax.dev

contraseña  : 123123

## Actores

- Cliente
- Asesor de ventas



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

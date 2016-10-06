# Sistema de Expedientes de Militares

Este es el repositorio del código para el sistema de Expedientes del Cuartel Negro Primero - Batallón de Apoyo Logístico 208 General de Brigada "Juan Antonio Paredes".

## Tecnologías usadas

Este proyecto usa las siguientes tecnologías: 

* Yii2 Framework para el desarrollo.

* Lenguaje de programación PHP.

* Base de datos MySQL.

## Plantilla de Proyecto Basic de Yii 2

Plantilla de Proyecto Basic de Yii 2 es la mejor plantilla de proyecto [Yii 2](http://www.yiiframework.com/)
para rápidamente iniciar la creación de proyectos pequeños.

La plantilla contiene las características básicas que incluyen un usuario para inicio de sesión / cierre de sesión y una página de contacto.
Incluye todas las configuraciones de uso común que permitirían que se concentre en la adición de nuevos
características a su aplicación.

[![La última versión estable](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Número total de descargas](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Estado de creación](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

## ESTRUCTURA DE DIRECTORIOS

      assets/             contiene la definición activos (css, js)
      commands/           contiene comandos de consola (controladores)
      config/             contiene las configuraciones de la aplicación
      data/               contiene loas archivos SQL para la base de datos MySQL
      controllers/        contiene clases de controlador Web
      mail/               contiene archivos de vista de mensajes de correo electrónico
      models/             contiene las clases del modelo
      runtime/            contiene los archivos generados durante el tiempo de ejecución
      tests/              contiene varias pruebas para la aplicación básica
      vendor/             contiene los paquetes de terceros que son dependencias
      views/              contiene archivos de vista de la aplicación Web
      web/                contiene el script index.php y recursos Web



## REQUERIMIENTOS

El requisito mínimo por esta plantilla de proyecto de que el servidor Web es compatible con PHP 5.4.0.


## INSTALACIÓN

### Instalar a partir de un archivo comprimido

Extraer el archivo comprimido descargado de [yiiframework.com](http://www.yiiframework.com/download/) a
un directorio llamado `basic` que está directamente bajo la raíz Web.

Establecer clave de validación de la cookie en el archivo `config/web.php` a alguna cadena secreta al azar:

```php
'request' => [
    // !!! insertar una clave secreta en la siguiente (si está vacío) - esto es requerido por la validación de la cookie
    'cookieValidationKey' => '<secret random string goes here>',
],
```

A continuación, puede acceder a la aplicación a través de la siguiente URL:

~~~
http://localhost/basic/web/
~~~


### Instalar vía Composer

Si usted no tiene [Composer](http://getcomposer.org/), es posible instalarlo siguiendo las instrucciones
en [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

A continuación, puede instalar esta plantilla de proyecto mediante el comando siguiente:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic sistema
~~~

Ahora usted debería ser capaz de acceder a la aplicación a través de la siguiente URL, suponiendo `sistema` es el directorio
directamente en la raíz Web.

~~~
http://localhost/tesis/sistema/web/
~~~


## CONFIGURACIÓN

### Base de datos

Editar el archivo `config/db.php` con datos reales, por ejemplo:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=expedientes',
    'username' => 'root',
    'password' => 'CLAVE_SI_APLICA',
    'charset' => 'utf8',
];
```

**NOTAS:**
- Yii no va a crear la base de datos para usted, esto tiene que hacerse manualmente antes de poder acceder a él.
- Comprobar y editar los otros archivos en el directorio `config/` para personalizar su aplicación según sea necesario.
- Consulte el README en el directorio `tests` para obtener información específica para pruebas básicas de aplicación.

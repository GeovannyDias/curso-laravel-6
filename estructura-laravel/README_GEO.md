# LISTA DE COMANDOS

```
- INSTALAR LARAVEL:
composer global require laravel/installer

- CREAR NUEVO PROYECTO:
laravel new project_name

- CREAR APLICACION O PROYECTO CON LARAVEL EN ALGUNA VERSION:
composer create-project --prefer-dist laravel/laravel project_name

composer create-project --prefer-dist laravel/laravel project_name 8.3.0

- APPLICATION KEY: (En el caso que desplegue error)
php artisan key:generate

- RUN SERVIDOR (No es necesario Apache - Xampp):
php artisan serve
php -S 127.0.0.1:8000 -t public

- INSTALAR PAQUETES (DEPENDENCIAS):

composer install
composer update

- MIGRAR BASE DE DATOS:

php artisan migrate
php artisan migrate:refresh // refresca las tablas
php artisan migrate:fresh // elimina todas las tablas y crear nuevamente (laravel +5.5)

php artisan make:migration create_professions_table
ó
php artisan make:migration professions --create=professions

- ALL COMMANDS

php artisan make:controller userController (Crea controlador)
composer dump-autoload (Refresca las clases existentes en el proyecto - php artisan migrate:refresh)


- FICHERO (.ENV):
configuración base de datos
key del proyecto


```


# Curso Laravel 6 desde cero - Rutas y Vistas (routes) #5

```
Rutas:
routes/web.php

Vistas:
resources/views/welcome.blade.php

```

# Curso Laravel 6 desde cero - Rutas y vistas con Controlador #6
```
Utilizando un controlador para retornar datos:

php artisan make:controller userController

Ventaja manejar datos a conveniencia.

```

# Curso Laravel 6 desde cero - Plantillas Blade pasar datos #7
```
llamar la funcion desde el controlador y cargar en la vista con {{ $variable }}

```

# Curso Laravel 6 desde cero - Configurar la base de datos #8
```
mysql -u root -p
create database laravel6;
```

# Curso Laravel 6 desde cero - ORM Eloquent (Modelo) #9
```
Los modelos se crea en singular y el modelo asumira que la table se llama "users" en plural, y que tiene una columna de clave primaria llamada "id"
Modelo solo debe tener la clase vacia

php artisan make:model User
```

# Curso Laravel 6 desde cero - Creando Migraciones #10
```
Crear tablas:
php artisan make:migration create_posts_table

Migrar tablas a la BD:
php artisan migrate

Se elimina todas las tablas y se vuelven a crear
php artisan migrate:fresh

Crea varios archivos (Controlador, fichero de migracion, modelo) → Test
php artisan make:model Categoria -mc

-m = migracion
-c = controlador

```

# Curso Laravel 6 desde cero - Integrar plantilla AdminLTE #11
```
https://adminlte.io/
Copiar carpeta de "dist" y "plugins"
Pegamos en la carpeta public 

Abrimos el archivo starter.html de la plantilla y copiamos el codigo y creamos una nueva vista layout.blade.php

```

# Curso Laravel 6 desde cero - Sistema de login y usuarios #12
```
Nuevo proyecto "admin"

composer create-project --prefer-dist laravel/laravel admin 6
laravel new admin

composer require laravel/ui
php artisan ui vue --auth
npm install (para instalar los paquetes)
npm run dev (Para compilar los paquetes) → ERROR 1

ERROR 1:
Al correr el comando npm run dev produce un error si se tiene "sass-loader": "^8.0.0",
Eliminar node_module / package-lock.json y bajar la versión a:

"sass-loader": "^7.0.0",
"sass-loader": "^7.1.0",

npm uninstall sass-loader --save-dev
npm install sass-loader@7.1.0 --save-dev



PROBLEM INSTALL (laravel/ui):
laravel/ui ^2.0 requires Laravel 7+

Previous version laravel 6:

composer require laravel/ui "^1.1"
composer require laravel/ui "^1.2"





INFORMACIÓN ADICIONAL (Web):

A partir de Laravel 6 vamos a instalar el nuevo paquete ejecutando:
composer require laravel/ui

Con ellos ya tendremos disponible los comandos Artisan.
Para agregar la configuración básica solo tenemos que ejecutar uno de estos 3 comandos:

php artisan ui bootstrap
php artisan ui vue
php artisan ui react

Para agregar la configuración básica incluyendo las vistas para registro y autenticación de usuarios, debemos indicar la opción de --auth al comando correspondiente:

php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth

Luego, debes instalar los paquetes NPM con:

npm install
Finalmente, a través de las instrucciones del archivo webpack.mix.js Webpack compilará tanto los archivos Sass para convertirlos a CSS plano así como el archivo resources/js/app.js, al ejecutar:

npm run dev


Continue:

php artisan migrate
modificar controlador para que redireccione a la ruta principal
App/Http/Auth/

Copiar plantilla "app.blade.php"

php artisan make:controller UserController

Crear datos aleatorios:

php artisan tinker
factory(App\User::class)->times(10)->create();


```

# Curso Laravel 6 desde cero - Controlador de usuarios #13
```
Metodos CRUD
Controlador de Recursos

```

# Curso Laravel 6 desde cero - Controlador de recursos #14

```
Crear clase de controlador de recursos:
Eliminamos el controlador de usuarios UserController.php

php artisan help make:controller
php artisan make:controller UserController -r


```

# Curso Laravel 6 desde cero - Registro de usuarios manual #15

```
Crear formulario de registro


```

# Curso Laravel 6 desde cero - Editar usuario y validar campos #16

```
Info Geo:
Bootstrap 4 no trae iconos
Como instalar fontawesome en laravel
https://gragot.com/laravel/como-instalar-fontawesome-en-laravel/

npm install --save @fortawesome/fontawesome-free

En el archivo package.json verás que se añade la dependencia @fortawesome/fontawesome-free
Añade en el archivo resources\sass\app.scss la siguiente linea:

@import '~@fortawesome/fontawesome-free/css/all.css';

Por ultimo ejecuta el siguiente comando en la raíz del proyecto:

npm run dev

Posibles problemas
La ruta de los recursos no se genera correctamente y los iconos no se muestran. Por defecto solo funciona si tenemos la aplicación en la raíz del dominio, de lo contrario veremos esta imagen:

Es decir si la url de la aplicación es «http://localhost/laravel/public/» no va a funcionar, necesitaríamos tenerla en «http://localhost/». Si estas en local puedes crear un virualhost para que apunte a la carpeta public de la aplicación.

Otra solución es usar setResourceRoot por ejemplo:

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .setResourceRoot('../');


VALIDAR CAMPOS:

Descargar archivos para traducir las validaciones al español
https://github.com/Laraveles/spanish

copiar la carpeta "es" en:
resources/lang

Editar fichero y agregar el idioma español:
config/app.php
"local": "es"

Form Request Validation
https://laravel.com/docs/8.x/validation#form-request-validation

Crear un request:

php artisan make:request UserFormRequest

App/Http/Requests

cambiamos a Authorize() true;
Documentacion:
rules();
'title' => 'required|unique:posts|max:255',
'body' => 'required',

Importar UserFormRequest en el controlador update()

Displaying The Validation Errors
https://laravel.com/docs/8.x/validation#quick-displaying-the-validation-errors


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


```

# Curso Laravel 6 desde cero - Reparando enlaces e imágenes #17

```
Imagenes rotas:

{{ asset('path/img.jpg') }}

Url:

{{ url('ruta') }}

```

# Curso Laravel 6 desde cero - Ver y eliminar usuarios #18

```
Delete

```

# Curso Laravel 6 desde cero - Permitir acceso con middleware auth #19

```
Middleware o lógica de intercambio de información entre aplicaciones, o Agente Intermedio, es un software que asiste a una aplicación para interactuar o comunicarse con otras aplicaciones, o paquetes de programas, redes, hardware o sistemas operativos.


De donde salen los middleware:

php artisan make:middleware ChecarEdad // Ejemplo

App/Http/Middleware

en el fichero Kernel.php // tenemos definidos arrays que llama a los diferentes archivos middleware
colocar una key y llamar al middleware que se crea y asi desde cualquier archivo se puede llamar al
->middleware('key')

```

# Curso Laravel 6 desde cero - Buscar, filtrar y listar datos #20

```
Utilizar buscador:
declarar un name = "search" para envier por el metodo get al controlador

```

# Curso Laravel 6 desde cero - Paginación de registros #21

```
Paginación:
en la consulta de usuarios
->paginate(5)


```

# Curso Laravel 6 desde cero - Sección notas de usuarios #22

```
php artisan make:model Notas -c

notas/todas
notas/favoritas
notas/archivadas


```

# Curso Laravel 6 desde cero - Crear tabla notas MySQLWorkbench #23

```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

# 
```
```

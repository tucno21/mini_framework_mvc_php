# MINI FRAMEWORK MVC PHP 8.1

## Requirimientos

- PHP >= 8.0
- COMPOSER

**Índice**

1. [Configuraciones basicas de connección](#configuraciones-básicas-de-url-y-conección)
2. [Rutas web](#rutas-web)
3. [Crear controlador y mdelo desde consola](#crear-controlador-y-modelo-desde-consola)
4. [Función para depurar varibles](#depurar-variables)
5. [Función de can()](#función-de-acceso-can)
6. [Función para layout](#función-para-layout)
7. [Agregar csrf a formulario](#para-formulario-csrf-obligatorio)
8. [Renderizar vista, redireccionar](#renderizar-vista-redireccionar)
9. [Middleware](#middleware)
10. [Obtener datos de GET o POST](#obtener-datos-de-get-o-post)
11. [Crear, Actualizar y Eliminar](#crear-actualizar-y-eliminar)
12. [Obtener todos los resultados del modelo](#obtener-todos-los-resultados)
13. [Obtener primer resultado del modelo](#obtener-primer-resultado)
14. [resultdo de unir dos tablas (INNER JOIN)](#resultdo-de-unir-dos-tablas-inner-join)
15. [Obtener resultados especiales del modelo](#obtener-resultados-especiales)
16. [Orden de modelo de consulta](#orden-de-modelo-de-consulta)
17. [Consulta personalizada](#consulta-personalizada)
18. [Ejemplos de consulta de modelo](#ejemplos)
19. [Funcion Session](#funcionción-sessión)
20. [Session con clave y datos](#session-con-clave-y-sus-datosarrayobjeto)
21. [Session sin clave y solo datos](#session-con-sin-clave-son-con-datosarrayobjeto)
22. [Sessio flas](#session-flasharrayobjeto)
23. [Validación de formularios](#validación-de-formularios)
24. [Tabla de validaciones](#tabla-de-validaciones)
25. [Creditos](#creditos-📌)

## Intalacion

clonar el repositorio.

```
git clone https://github.com/tucno21/mini_framework_mvc_php.git
```

linea de comando necesario desde la consola

```
composer install
```

## CONFIGURACIONES BÁSICAS DE URL Y CONECCIÓN

buscar el archivo env en la raiz y renombrar a .env
agregar la url y la concección de la BD

```
APP_URL=http://framework_php.test

DB_HOST=localhost
DB_DATABASE=mvc
DB_USERNAME=root
DB_PASSWORD=root

FOLDER_IMAGE=img

TIME_ZONE=America/Lima
```

si el archivo .env no connecta Buscar y modificar (App/Config/App.php)

```php
$baseURL = 'www.myweb.com';

$localhost = 'localhost';
$user = 'root';
$password = 'root';
$dbName = 'mvc_framework';

$imageFolder = 'img'; //nombre de la carpeta de almacenamiento de imagenes
```

## RUTAS WEB

Agregar rutas para la web (Routes/web.php)

```php
//ruta o parametro del link, nombre del controlador, nombre del metodo
Route::get('/', [Controller::class, 'index'])->name('home');
//los nombres de la ruta solo en get - en post debe llevar a la misma ruta
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/login', [Controller::class, 'login']);
```

## CREAR CONTROLADOR Y MODELO DESDE CONSOLA

Generar controlador y modelo sin carpeta

```
php cronos make:controller Name
php cronos make:model Name
```

Generar controlador y modelo con carpeta

```
php cronos make:controller Name FolderName
php cronos make:model Name FolderName
```

## FUNCIONES GENERALES

### depurar variables

```php
//detiene la ejecución del script y muestra el contenido de la variable
dd($variable);
//muestra el contenido de la variable sin detener la ejecución del script
d($variable);
```

### función de acceso can()

```php
//verifica si el usuario tiene permisos
can('routerName') //return true or false
```

````

## FUNCIONES PARA LA VISTA (VIEW)

### Función obtener url

```php
<?= base_url ?>/login
<?= base_url('/login') ?>

//enviar el nombre de la ruta asignado en Routes/web.php
<?= route('nombreRuta') ?>
````

### función para layout

```php
//detecta automaticamente el la carpeta View
<?php include ext('nameFolder.nameFile') ?>
<?php include ext('layout.head') ?>//ejemplo
```

### para formulario csrf (obligatorio)

```php
<input type="hidden" name="_token" value="<?= csrf() ?>">
```

## FUNCIONES CONTROLADOR

### Renderizar vista, redireccionar

```php
return view('folder/file', [
    'Key' => $data,
    'key2' => 'string'
]);

//el key creado en (redirect - route) solo se puede acceder en la misma pagina, si cambia de pagina se elimina totalmente
//redirect enviar la ruta de la url - /user - /user/create
return redirect('linkParam', [
    'Key' => $data,
]);

//si usa ->route() no enviar nada en redirect(),
//en ->route() debe colocar el nombre creado de la  ruta creada en Controlador de Rutas Routes/web.php
return redirect()->route('nombre.ruta',[
        'Key' => $data,
]);


//back enviar la ruta de la url - /user - /user/create
return back('folderVieW', [
    'Key' => $data,
]);

return back()->route('nombre.ruta',[
        'Key' => $data,
]);

//el mensaje se elimina al realizar refresco
//usar la funcion session()->flas() //invocar con la clave creada
return back()->with('status', 'content');
```

### Middleware

Agregar en el Controlador que se desea proteger

```php
    public function __construct()
    {
        //'auth' si la session se ha creado sin clave
        $this->middleware('auth');
        //'key' si la session se ha creado con clave - enviar la clave
        $this->middleware('key');

        //no proteger algunas rutas except['nombreRuta']
        $this->except(['users', 'users.create'])->middleware('auth');
    }
```

### obtener datos de GET o POST

```php
$data = $this->request()->getInput();
```

## FUNCIONES MODEL

### Crear, Actualizar y Eliminar

```php
Model::create($data); //retorna object|array
Model::update($id, $data);
Model::delete((int)$id);
```

### LEER TABLA

#### Obtener todos los resultados

```php
Model::all();   //no acepta parametros
Model::get();   //no acepta parametros - pero si combina con otras funciones
Model::select($nameColumn)->get(); //maximo 7 columnas separado por ","

Model::where($colum, $valueColum)->get();
Model::where($colum, $valueColum)->orderBy($colum, $order)->get();

// where acepta has 3 parametros
Model::where($nameColumn, $operator, $valueColum)->get();
Model::where($nameColumn, $operator, $valueColum)->orderBy($colum, $order)->get();
```

#### Obtener primer resultado

```php
Model::find();  //no acepta parametros

Model::first($id);  //enviar el valor(id) de la columna a buscar
Model::first($nameColumn, $valueColum); //enviar el nombre de la columna y el valor

//si el metodo first se combina con otros NO enviar parametros
Model::select($columns)->first();

Model::where($colum, $valueColum)->first();
Model::where($colum, $valueColum)->orderBy($colum, $order)->first();

Model::where($colum, $operator, $valueColum)->first();
Model::where($colum, $operator, $valueColum)->orderBy($colum, $order)->first();
```

### resultdo de unir dos tablas (INNER JOIN)

```php
//acepta 4 parametros, (nombreOtraTabla, nombreTabla.columnaRelacion, operador, nombreOtraTabla.columnaRelacion
Model::join($nameAnotherTable, $tableNamecolumnRelationship, $operator, $nameAnotherTablecolumnRelationship);

//combinar con select y get
Model::select($columns)
        ->join($nameAnotherTable, $tableNameColum, $operator, $nameAnotherNameColum)
        ->get();
```

### Obtener resultados especiales

```php
Model::max($nameColumn);  //máximo valor numérico de una columna
Model::min($nameColumn);  //mínimo valor numérico de una columna
Model::sum($nameColumn);  //sumar todos los valores numérico de una columna
Model::avg($nameColumn);  //promedio de todos los valores de una columna

//se puede realizar busqueda con el metodo where
Model::where($colum, $valueColum)->max();
Model::where($colum, $valueColum)->orderBy($colum, $order)->max();

Model::where($colum, $valueColum)->count(); //contar la cantidad de registros obtenidos
```

## Orden de modelo de consulta

se puede eliminar uno o varios, respetar el orden para no tener errores

```php
Model::select($columns)  //no usar si usa ->first()
    ->where($colum, $operator, $valueColum)
    ->orderBy($colum, $order)
    ->get() // ->first();
```

### CONSULTA personalizada

```php
//enviar su propio query
Model::querySimple($query);
```

## EJEMPLOS

```php
select('email');
select('email', 'username');

where('active', 1);
where('votes', '>=', 100);
where('votes', '<>', 100);
where('name', 'like', 'T%');

orderBy('name', 'desc');
orderBy('email', 'asc');

//por id
first(3);
//por columana y valor
first('email', 'a@a.com');

User::select('users.*', 'contacts.phone', 'orders.price')
        ->join('contacts', 'users.id', '=', 'contacts.user_id')->get();
```

## FUNCIONCIÓN SESSIÓN

Las sesiones son invocados a traves funciones - solo use una de ellas en todo los documentos

```php
session();
auth();
```

#### SESSION CON CLAVE Y SUS DATOS(array/objeto)

```php
//crear session
auth()->set(string $key, array|object  $value);
//crear sesion que se eliminar en el sigueinte refresco
session()->flash(string $key, string $content)

//formas de invocar
auth()->get(string $key);
auth()->user(string $key);

//ver todas las sesiones creadas
session()->all();

//consultar si existe la session
auth()->has(string $key); //retorna true - false
auth()->exists(string $key); //retorna true - false

//eliminar la session
auth()->remove(string $key);
auth()->logout(string $key);
session()->forget(string $key);

//elimar todas las sesiones creadas
session()->flush();
```

#### SESSION CON SIN CLAVE SON CON DATOS(array/objeto)

```php
//crear session
auth()->attempt(array|object $value); //no necesita clave

//formas de invocar
auth()->get(); //retorna objeto
auth()->user(); //retorna objeto

//consultar si existe la session
auth()->has(); //retorna true - false
auth()->exists(); //retorna true - false

//eliminar la session
auth()->remove();
auth()->logout();
```

#### SESSION flash(array/objeto)

```php
//mensaje que desaparece en un refresco o cambio de vista
session()->flash(string $key, string $content);

//invocar con la la clave creada - en la vista:
session()->get($key)
```

## VALIDACIÓN DE FORMULARIOS

```php
$data = $this->request()->getInput();

$valid = $this->validate($data, [
    'name' => 'required|alpha',
    'username' => 'required|alpha_numeric',
    'email' => 'required|email|unique:HomeModel,email',
    'password' => 'required|min:3|max:12|matches:password_confirm',
    'password_confirm' => 'required',
    'photo' => 'requiredFile|maxSize:2|type:jpeg,png,zip,svg+xml',
]);

if ($valid !== true) {
    return back()->route('products.create', [
        'err' =>  $valid,
        'data' => $data,
    ]);
} else {
    Productos::create($data);
    return redirect()->route('products');
}
```

## TABLA DE VALIDACIONES

| Regla                    | Descripción                                                        | Ejemplo               |
| ------------------------ | ------------------------------------------------------------------ | --------------------- |
| `alpha`                  | Entrada solo caracteres alfabéticos.                               |                       |
| `alpha_space`            | Entrada solo de caracteres alfabéticos y espacios.                 |                       |
| `alpha_dash`             | Entrada solo de caracteres alfanuméricos, guiones bajos y guiones. |                       |
| `alpha_numeric`          | Entrada solo de caracteres alfanuméricos.                          |                       |
| `alpha_numeric_space`    | Entrada solo de caracteres alfanuméricos y de espacio.             |                       |
| `decimal`                | Entrada solo número decimal.                                       |                       |
| `integer`                | Entrada solo de número entero.                                     |                       |
| `is_natural`             | Entrada solo de numeros naturales.                                 |                       |
| `is_natural_no_zero`     | Entrada solo de numeros naturales y debe ser mayor que cero        |                       |
| `numeric`                | Entrada solo de números                                            |                       |
| `required`               | Entrada no vacio, es obligatorio                                   |                       |
| `email`                  | Entrada en formato email                                           |                       |
| `url`                    | Entrada formato URL                                                |                       |
| `min:number`             | Mínimo de "number" caracteres                                      | `min:3`               |
| `max:number`             | Máximo de "number" caracteres                                      | `max:9`               |
| `string`                 | Entrda solo cadena de texto                                        |                       |
| `confirm`                | Dos entradas iguales, la segunda agregar "\_confirm"               |                       |
| `slug`                   | Entrada tipo slug **aa-bb-cc**                                     |                       |
| `text`                   | Entrada solo texto                                                 |                       |
| `choice:param`           | La Entrada debe ser igual al establecido en **param**              | `choice:hello`        |
| `between:min,max`        | entra minima y maxima de caracteres                                | `between:3,8`         |
| `datetime`               | Entrada solo de fecha y hora **Y-m-d H:i:s**                       |                       |
| `time`                   | Entrada solo de hora **H:i:s**                                     |                       |
| `date`                   | Entrada solo de fecha **Y-m-d**                                    |                       |
| `matches:2input`         | Compara la igualdad de dos entradas                                | `matches:co_password` |
| `unique:model,colum`     | Entrada unica que no coincida con la BD                            | `unique:users,email`  |
| `not_unique:model,colum` | Entrada existente en la BD                                         | `not_unique:city,id`  |

##

| Regla Archivos-file | Descripción                                              | Ejemplo         |
| ------------------- | -------------------------------------------------------- | --------------- |
| `requiredFile`      | Entrada no vacio, es obligatorio.                        |                 |
| `maxSize:number`    | Tamaño maximo del archivo en MB.                         | `maxSize:2`     |
| `type:param`        | Tipos de archivos permitidos (jpeg,png,zip,gif,svg+xml). | `type:jpeg,png` |

## Creditos 📌

_Modelo de framework php_

- [Juan de la Torre](https://www.udemy.com/course/desarrollo-web-completo-con-html5-css3-js-php-y-mysql/) - Curso PHP.
- [The Codeholic](https://www.youtube.com/playlist?list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1) - Framework php.

_Modificacion para la validacion del formulario de_

- [mkakpabla](https://github.com/mkakpabla/form-validation-php#readme) - Validacion Adaptado.
- [booomerang](https://github.com/booomerang/Validatr/tree/master/src) - Validacion php.

_inspirado en:_

- [codeigniter](https://codeigniter.com/user_guide/libraries/validation.html) - formato y uso de validaciones.
- [laravel](https://laravel.com/docs/8.x/validation) - estilo de las validaciones.

_Y A TODO LOS DEV DE YOUTUBE_

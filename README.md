# MINI FRAMEWORK MVC PHP 8.1

## Requirimientos

- PHP >= 8.0
- COMPOSER

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

si el archivo .env no conceta Buscar y modificar (App/Config/App.php)

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
Route::get('/', [Controller::class, 'index']);
Route::get('/login', [Controller::class, 'login']);
Route::post('/login', [Controller::class, 'login']);
```

## FUNCIONES GENERALES

depurar variables

```php
dd($variable);
d($variable);
```

Función para enviar la URL

```php
<?= base_url ?>/login
<?= base_url('/login') ?>

//enviar el nombre de la ruta asignado en Routes/web.php
<?= route('nombreRuta') ?>
```

Variable Constante general

```php
DIRPUBLIC  //carpeta /www/framework_mvc_php/public
APPDIR     //carpeta /www\framework_mvc_php/App
```

## FUNCIONES PARA EL VISTA

Puede usar en la vista, y realizar secciones dinamicas

```php
<?= extend('/layout/head.php') ?> //ejemplo
<?= extend('/layout/footer.php') ?>
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

## FUNCIONES CONTROLADOR

Renderizar vista, redireccionar

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

Verificar si es GET o POST ($result = true/false)

```php
$result = $this->request()->isGet();
$result = $this->request()->isPost();
```

Capturar datos del formulario sanitizados PHP

```php
$data = $this->request()->getInput();
```

## FUNCIONES MODEL

Instanciar el modelo creado al controlador

Crear, Actualizar y Eliminar

```php
Model::create($data); //retorna object|array
Model::update($id, $data);
Model::delete($id);
```

LEER TABLA
Obtener todos los resultados

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

Obtener primer resultado

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

resultdo de unir dos tablas (INNER JOIN)

```php
//acepta 4 parametros, nombre de la otra tabla, nombre la columna que se relaciona con llave
//operador a compara, nombre de la otra columna que se relaciona
Model::join($nameAnotherTable, $nameColum, $operator, $valueColum);

//combinar con select y get
Model::select($columns)->join($nameAnotherTable, $nameColum, $operator, $valueColum)->get();
```

Obtener resultados especiales

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

### Orden de modelo de consulta

se puede eliminar uno o varios, respetar el orden para no tener errores

```php
Model::select($columns)  //no usar si usa ->first()
    ->where($colum, $operator, $valueColum)
    ->orderBy($colum, $order)
    ->get($limit) // ->first();
```

CONSULTA personalizada

```php
//enviar su propio query
Model::queryMod($query);
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

first(3);
first('email', 'a@a.com');

select('users.*', 'contacts.phone', 'orders.price');
join('contacts', 'users.id', '=', 'contacts.user_id');

queryMod('SELECT * FROM users');
```

## SESSIONES

Las sesiones son invocados a traves funciones - solo use una de ellas en todo los documentos

```php
session();
auth();
```

SESSION CON CLAVE Y SUS DATOS(array/objeto)

```php
//crear session
auth()->set(string $key, array|object  $value);

//formas de invocar
auth()->get(string $key);
auth()->user(string $key);

//ver todoas las sesiones creadas
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

SESSION CON SIN CLAVE SON CON DATOS(array/objeto)

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

SESSION flash(array/objeto)

```php
//mensaje que desaparece en un refresco o cambio de vista
session()->flash(string $key, string $content);

//invocar con la varible - en la vista:
session()->get($key)
```

## ACCESO A RUTAS (Middleware)

Agregar en el Controlador la ruta que será restingido
(_enviar la sesion con clave creada_),
(_enviar arrary de rutas no permitidas sin iniciar login_)

```php
    public function __construct()
    {
        $this->middleware(auth()->user(), ['/dashboard']);
    }
```

## Validaciones de Inputs

desde el controlador recivir datos y validar

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

            return $this->redirect('register', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            Model::create($data);
            return redirect('/login');
        }
```

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

<?php

use System\Route;
use System\Session;
use System\RenderView;

/**
 * funciones principales para toda la aplicacion
 */

if (!function_exists('dd')) {
    /**
     * debugear sin continuar con otros codigos de linea
     */
    function dd($variable)
    {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }
}


if (!function_exists('d')) {
    /**
     * debugear continuando las lineas de codigo
     */
    function d($variable)
    {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
    }
}

/**
 * ruta de documento public
 * C:/.../www/mini_framework_mvc_php/public
 */
define('DIR_PUBLIC', $_SERVER['DOCUMENT_ROOT']);

/**
 * ruta de la carpeta App
 * C:\...\www\mini_framework_mvc_php/App
 */
define('DIR_APP', dirname(__DIR__) . '/App');

/**
 * como enviar los resultados array u obejeto
 * no determina para MODEL
 */
define('RESULT_TYPE', $resultType);

/**
 * obtener la ruta web de la aplicacion sin "/"
 */
if (!function_exists('last_char')) {
    function last_char($string)
    {
        //extraer el ultimo letra de un string
        $slash = substr($string, -1);
        if ($slash == '/') {
            //eliminar la ultima letra del string
            return substr($string, 0, -1);
        } else {
            return $string;
        }
    }
}

/**
 * url de la web Principal
 */
define('base_url', last_char($baseURL));


if (!function_exists('base_url')) {
    /**
     * funcion url con parametros
     */
    function base_url($parameters = null)
    {
        return base_url . $parameters;
    }
}

if (!function_exists('view')) {
    /**
     * Funcion para renderizar las vistas desde el controlador
     */
    function view(string $name, array $data = [])
    {
        if (!empty($name)) {
            return RenderView::render($name, $data);
        } else {
            echo "Upsss... escriba una nombre o ruta/nombre para renderizar la vista";
        }
    }
}


if (!function_exists('session')) {
    /**
     * Instaciar Class Session
     */
    function session()
    {
        return new Session;
    }
}

if (!function_exists('auth')) {
    /**
     * Instaciar Class Session
     */
    function auth()
    {
        return new Session;
    }
}

if (!function_exists('route')) {
    /**
     * funcion para redireccionar a otra web usando el nombre de la ruta
     */
    function route(string $route)
    {
        return Route::route($route);
    }
}

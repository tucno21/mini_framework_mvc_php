<?php

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

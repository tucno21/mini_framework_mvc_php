<?php

/**
 * clase para redireccionar
 */

namespace System;

use System\Route;

class Redirect
{
    /**
     * redireccionar a otra web usando la ruta de la vista
     */
    public static function redirect(string $pathUrl = '', array $dataView = [])
    {
        if (empty($pathUrl)) {
            //si no hay parametros invocar la clase
            return new static;
        }

        if (!empty($dataView)) {
            //almacenar los datos en una session
            session()->set('renderView', $dataView);
        }

        // strpos verifica si existe '/' y devuelve la posicion
        if (strpos($pathUrl, "/") === 0) {
            header("Location: $pathUrl");
        } else {
            header("Location: /$pathUrl");
        }
    }

    /**
     * redireccionar a otra web usando el nombre de la ruta
     */
    public static function route(string $nameRoute, array $dataView = [])
    {
        //buscar la ruta  con el nombre de la ruta en el array
        $url = Route::route($nameRoute);
        //separa la url principal en array
        $data = explode(base_url, $url);

        if (empty($dataView)) { //vacio true
            header("Location: $data[1]");
        } else {
            session()->set('renderView', $dataView);
            header("Location: $data[1]");
        }
    }
}

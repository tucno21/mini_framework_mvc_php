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
}

<?php

namespace System;

/**
 * captura el metodo web GET Y POST
 */
class Request
{
    /**
     * captura y tipo de HTTP (get-post) y convierte en minuscula
     */
    public function methodWeb()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    /**
     * captura los parametros despues de la url principal
     */
    public function getPath()
    {
        //captura toda la url
        $path = $_SERVER['REQUEST_URI'];
        //traer antes de la ?
        $position = strpos($path, '?');
        if ($position === false) {
            // si no has encontrado la ? devuelve la url
            return $path;
        }
        //si encontrado la ? devuelve la url hasta la ?
        return $path = substr($path, 0, $position);
    }
}

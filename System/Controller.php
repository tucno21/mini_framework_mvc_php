<?php

/**
 * controlador general
 */

namespace System;

use System\Request;
use System\Middleware;
use System\Validation\Validation;

class Controller
{
    /**
     * instanciar el request
     */
    protected function request()
    {
        return new Request();
    }

    /**
     * validacion de reglas para los datos de envio
     */
    protected function validate(array|object $inputs, array $rules)
    {
        $mm = new Validation;

        return $mm->validate($inputs, $rules);
    }

    /**
     * un middleware que verifica si el usuario de tu aplicación está autenticado
     */
    protected function middleware(mixed $session, array $middleware)
    {
        $mw = new Middleware();
        $mw->run($session, $middleware);
    }
}

<?php

/**
 * controlador general
 */

namespace System;

use System\Request;

class Controller
{
    protected function request()
    {
        return new Request();
    }
}

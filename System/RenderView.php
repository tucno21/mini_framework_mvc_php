<?php

namespace System;

/**
 * renderizar las vistas
 */

class RenderView
{
    /**
     * enviar el contenido de la vista
     * @param string carpeta/archivo
     * @param array valores o array enviados desde la vista
     */
    public static function render(string $view, array $data = [])
    {
        //almacena la vista en una variable
        $content = Self::renderOnlyView($view, $data);

        //envia la vista al navegador
        include_once  'printView.php';
    }

    /**
     * renderiza la vista desde el controlador
     */
    protected static function renderOnlyView(string $view,  array $dynamicVariable)
    {
        foreach ($dynamicVariable as $key => $value) {
            //$$ genrera una variable dinamica
            $$key = $value;
        }

        //ruta del archivo de la renderizacion de la vista
        $path = DIR_APP . "/View/$view.php";

        if (file_exists($path)) {
            //ob_start captura el contenido de la vista
            ob_start();
            include_once $path;
            //ob_get_clean devuelve el contenido de la vista
            return ob_get_clean();
        } else {
            echo "Upsss... No se encontro el archivo para renderizar, verifica que has creado el archivo o que el nombre sea correcto " . $path;
        }
    }
}

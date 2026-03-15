<?php
//RUTA RAIZ DEL PROYECTO
// si usas XAMPP (localhost/bienesraices_inicio)
//define('URL_PROYECTO', '/bienesraices_inicio');

// si usan laragon debe estar vacío:
 define('URL_PROYECTO', '');

require 'app.php';
function incluirTemplate($nombre, $inicio=false){
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() : bool{
    session_start();

    $auth = $_SESSION['login'];

    if($auth) {
        return true;
    }
    return false;
}
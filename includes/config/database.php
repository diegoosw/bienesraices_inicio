<?php
function conectarDB(){
    $db = mysqli_connect('localhost', 'root', 'root$', 'bienesraices_crud');
    if (!$db) {
        echo "Error de conexión: " . mysqli_connect_error();
        exit;
    }
    
    return $db;
}
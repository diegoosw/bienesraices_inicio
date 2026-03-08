<?php
function conectarDB(){
    $db =mysqli_connect('localhost', 'root', 'emmanuel26','bienes_raices_crud');
    if (!$db) {
        echo "Error de conexión: " . mysqli_connect_error();
        exit;
    }
    
    return $db;
}
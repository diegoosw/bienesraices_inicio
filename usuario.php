<?php

//importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//crear la clase usuario
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);


//query para crear al usaurio
$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

//echo $query;



//Agregar a la abse de datos
mysqli_query($db, $query);
<?php
$host = "localhost";
$port = "3306";
$user = "root";
$db = "todo_bd";

$conexion = new mysqli($host, $user,'', $db);
$conexion ->set_charset("utf8");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

//echo "Conexión exitosa";
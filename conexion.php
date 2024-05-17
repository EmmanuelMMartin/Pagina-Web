<?php
$host = 'localhost';
$bd = 'bienesraices';
$user = 'root';
$pass = 'root';

$conexion = pg_connect("host=$host dbname=$bd user=$user password=$pass");

if (!$conexion) {
    die("Error de conexión a la base de datos.");
}
?>
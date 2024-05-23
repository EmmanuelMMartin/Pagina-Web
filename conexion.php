<?php

$servername = "localhost";
$username = "root";
$password = "12345"; 
$dbname = "BienesRaices";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";

$conn->close();
?>

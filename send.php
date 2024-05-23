<?php
    include "index.php";e
    if(isset($_POST['registro'])){
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $correo= $_POST['correo'];
        $contraseña= $_POST['contraseña'];

        $insertarDatos = "INSERT INTO paginawebventas (nombre, apellido, correo, contraseña) VALUES ('$nombre','$apellido','$correo','$contraseña')";

        $ejecutarInsertar = mysqli_query ($enlace, $insertarDatos);
    }
?>

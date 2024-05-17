<?php

class Consultas
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->conectarSQL();
    }

    private function conectarSQL()
    {
        $strUser = "root";
        $strPass = "12345"; 
        $strServer = "localhost";
        $strDB = "BienesRaices";

        $conn = new mysqli($strServer, $strUser, $strPass, $strDB);

        if ($conn->connect_errno) {
            die("Failed to connect to MySQL: " . $conn->connect_error);
        }

        return $conn;
    }

    public function validarUsuario($strUsuario, $strPass)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $strUsuario, $strPass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerCasas()
    {
        $sql = "SELECT * FROM casas";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function imprimeBonito($objImprimir)
    {
        echo "<pre>";
        print_r($objImprimir);
        echo "</pre>";
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

// Uso de la clase
$consultas = new Consultas();
$casas = $consultas->obtenerCasas();
$consultas->imprimeBonito($casas);

$usuarioValido = $consultas->validarUsuario('Javi', '123456');
if ($usuarioValido) {
    echo "Usuario válido";
} else {
    echo "Usuario no válido";
}
?>
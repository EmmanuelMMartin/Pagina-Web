<?php

class consultas
{

    public function __construct()
    {
        //print_r("Construyendo Clase Formulario<br>");
    }

    public function ValidarUsuario($strUsuario, $strPass)
    {
        //echo $strUsuario;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/restapi/index.php?Usuario=Javi");
        curl_setopt($ch, CURLOPT_POST, TRUE);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, ["Usuario" => "Javi"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);

        curl_close($ch);

        $arrUsuarios = json_decode($output);
        foreach ($arrUsuarios as $arrUsuario) {
            if ($arrUsuario->Usuario == $strUsuario && $arrUsuario->Pass == $strPass)
                return true;
        }
        return false;
    }

    public function ConectarSQL()
    {
        $strUser = "admin";
        $strPass = "123456";
        $strServer = "localhost";
        $strDB = "pruebas";
        $strQuery = "SELECT * FROM tacos AS T
                        LEFT JOIN tacoingredientes AS TI
                        ON T.idTaco = TI.idTaco -- AND
                        LEFT JOIN ingredientes AS I
                        ON TI.idIngrediente = I.idIngrediente
                        ORDER BY Precio DESC";

        $strQuery = "SELECT * FROM tacos";                
        //$objConexion = mysqli_connect($strServer, $strUser, $strPass, $strDB);
        $objConexion = new mysqli($strServer, $strUser, $strPass, $strDB);
        if ($objConexion->connect_errno) {
            echo "Failed to connect to MySQL: " . $objConexion->connect_error;
            exit();
        }
        //$objResultado = mysqli_query($objConexion, $strQuery);
        $objResultado = $objConexion->query($strQuery);
        
        //$arrInfo = mysqli_fetch_all($objResultado, MYSQLI_ASSOC);
        $arrInfo = $objResultado->fetch_all(MYSQLI_ASSOC);
        return $arrInfo;
    }

    public function ImprimeBonito($objImprimir)
    {
        echo "<pre>";
        print_r($objImprimir);
        echo "</pre>";
    }
}

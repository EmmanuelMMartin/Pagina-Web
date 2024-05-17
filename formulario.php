<?php

class formulario {

    public $strOpcion, $bValido;
    public $objConsultas;
    public $arrDatos;

    public function __construct($strOpcion) {
        $this->strOpcion = $strOpcion;
        //print_r("Construyendo Clase Formulario<br>");
        

        if($_GET["strAccion"] != ""){
            $strAccion = $_GET["strAccion"];
            //$this->validar();
            $this->$strAccion();
        }  
        
        require_once "vista/$this->strOpcion.phtml";
    }

    private function validar(){
        require_once "modelo/consultas.php";
        $this->objConsultas = new consultas();
        $this->bValido = $this->objConsultas->ValidarUsuario($_GET["strCorreo"], $_GET["strPass"]);
        $this->arrDatos = $this->objConsultas->ConectarSQL();
        //echo "Voy a validar tu informacion";
    }

}
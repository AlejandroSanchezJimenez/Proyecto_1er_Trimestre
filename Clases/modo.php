<?php
class Modo {
    public $identificador;

    /*CONSTRUCTORES*/
    public function __construct($identificador)
    {
        $this->identificador=$identificador;
    }

    /*GETTERS Y SETTERS*/
    public function getIdentificador() {
        return $this->identificador;
    }
    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }


    /*MUESTRAINFO*/
    public function muestra_info() {
        $info= "<h1>INFORMACIÓN DEL IDENTIFICADOR</h1>";
        $info= "Identificador: ".$this->identificador;
    }
}
?>
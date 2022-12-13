<?php
class Mensaje {
    public $fecha_hora_mensaje;
    public $validado;

    /*CONSTRUCTORES*/
    public function __construct($fecha_hora_mensaje,$validado)
    {
        $this->fecha_hora_mensaje=$fecha_hora_mensaje;
        $this->$validado=$validado;
    }

    /*GETTERS Y SETTERS*/
    public function getFecha_hora_mensaje() {
        return $this->fecha_hora_mensaje;
    }
    public function setFecha_hora_mensaje($fecha_hora_mensaje) {
        $this->fecha_hora_mensaje = $fecha_hora_mensaje;
    }

    public function getvalidado() {
        return $this->validado;
    }
    public function setValidado($validado) {
        $this->validado = $validado;
    }


    /*MUESTRAINFO*/
    public function muestra_info() {
        $info= "<h1>INFORMACIÓN DEL IDENTIFICADOR</h1>";
        $info= "Fecha y hora del mensaje: ".$this->fecha_hora_mensaje;
        $info= "Identificador: ".$this->validado;
    }
}
?>
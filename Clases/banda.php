<?php
class Banda {
    public $distancia;
    public $minRango;
    public $maxRango;

    /*CONSTRUCTORES*/
    public function __construct($distancia,$minRango,$maxRango)
    {
        $this->distancia=$distancia;
        $this->minRango=$minRango;
        $this->maxRango=$maxRango;
    }

    /*GETTERS Y SETTERS*/
    public function getDistancia() {
        return $this->nombre;
    }
    public function setDistancia($distancia) {
        $this->distancia = $distancia;
    }
    public function getminRango() {
        return $this->minRango;
    }
    public function setMinRango($minRango) {
        $this->minRango = $minRango;
    }
    public function getmaxRango() {
        return $this->minRango;
    }
    public function setMaxRango($maxRango) {
        $this->maxRango = $maxRango;
    }

    /*MUESTRAINFO*/
    public function muestra_info() {
        $info= "<h1>INFORMACIÓN DE LA BANDA</h1>";
        $info= "Distancia: ".$this->distancia;
        $info= "<br/> Rango mínimo: ".$this->minRango;
        $info= "<br/> Rango máximo: ".$this->maxRango;
    }
}
?>
<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once '../../index.php';
    }
    if ($_GET['menu'] == "login") {
        require_once '../Login/login.php';
    }
    if ($_GET['menu'] == "concursos") {
        require_once '../Mantenimiento/concursos.php';
     
    }
    if ($_GET['menu'] == "quienessomos") {
        require_once '../Mantenimiento/quienessomos.php';
     
    }
    if ($_GET['menu'] == "foro") {
        require_once '../Mantenimiento/foro.php';
     
    }
    if ($_GET['menu'] == "perfil") {
        require_once '../Mantenimiento/perfil.php';
     
    }   
    if ($_GET['menu'] == "registro") {
        require_once '../Login/registro.php';
     
    } 
    if ($_GET['menu'] == "error") {
        require_once '../../Helpers/GEP.php';
     
    }  
}
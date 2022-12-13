<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once 'index.php';
    }
    if ($_GET['menu'] == "login") {
        require_once 'Vista/Login/login.php';
    }
    if ($_GET['menu'] == "registro") {
        require_once 'Vista/Login/registro.php';  
    }
    if ($_GET['menu'] == "listadoconcursos") {
        require_once 'Vista/Mantenimiento/listadoConcursos.php'; 
    }
    if ($_GET['menu'] == "concursos") {
        require_once 'Vista/Mantenimiento/Concursos.php'; 
    }
    if ($_GET['menu'] == "quienessomos") {
        require_once 'Vista/Mantenimiento/quienessomos.php'; 
    }
    if ($_GET['menu'] == "foro") {
        require_once 'Vista/Mantenimiento/foro.php';
    }
    if ($_GET['menu'] == "perfil") {
        require_once 'Vista/Mantenimiento/perfil.php';
    }   
    if ($_GET['menu'] == "correoRecuperacion") {
        require_once 'Vista/Mantenimiento/correoRecuperacion.php';
    }    
    if ($_GET['menu'] == "recuerdaPass") {
        require_once 'Vista/Mantenimiento/recuerdaPass.php';
    }  
    if ($_GET['menu'] == "enviaEmailRecupera") {
        require_once 'Vista/Mantenimiento/enviaEmailRecupera.php';
    } 
    if ($_GET['menu'] == "cambiaContraseña") {
        require_once 'Vista/Mantenimiento/cambiaContraseña.php';
    } 
    if ($_GET['menu'] == "cierraSesion") {
        require_once 'Vista/Mantenimiento/cierraSesion.php';
    } 
    if ($_GET['menu'] == "listadoUsers") {
        require_once 'Vista/Mantenimiento/listadoUsuarios.php';
    } 
    if ($_GET['menu'] == "creaConcursos") {
        require_once 'Vista/Mantenimiento/creaConcursos.php';
    } 
    if ($_GET['menu'] == "Mensajes") {
        require_once 'Vista/Mantenimiento/Mensajes.php';
    }
    if ($_GET['menu'] == "mantenimiento") {
        require_once 'Vista/Mantenimiento/mantenimiento.php';
    }
    if ($_GET['menu'] == "listadoBanda") {
        require_once 'Vista/Mantenimiento/listadoBandas.php';
    }
    if ($_GET['menu'] == "listadoModo") {
        require_once 'Vista/Mantenimiento/listadoModos.php';
    }
    if ($_GET['menu'] == "borra") {
        require_once 'Vista/Mantenimiento/borra.php';
    }
    if ($_GET['menu'] == "editaConcur") {
        require_once 'Vista/Mantenimiento/editaConcurso.php';
    }
    if ($_GET['menu'] == "editaBanda") {
        require_once 'Vista/Mantenimiento/editaBanda.php';
    }
    if ($_GET['menu'] == "editaModo") {
        require_once 'Vista/Mantenimiento/editaModo.php';
    }
    if ($_GET['menu'] == "creaModo") {
        require_once 'Vista/Mantenimiento/creaModo.php';
    }
    if ($_GET['menu'] == "creaBanda") {
        require_once 'Vista/Mantenimiento/creaBanda.php';
    }
    if ($_GET['menu'] == "creaMensaje") {
        require_once 'Vista/Mantenimiento/creaMensaje.php';
    }
    if ($_GET['menu'] == "validaMensaje") {
        require_once 'Vista/Mantenimiento/validaMensaje.php';
    }
    if ($_GET['menu'] == "listadoParticipantes") {
        require_once 'Vista/Mantenimiento/listadoParticipantes.php';
    }
    if ($_GET['menu'] == "calculaPremios") {
        require_once 'Vista/Mantenimiento/calculaPremios.php';
    }
    if ($_GET['menu'] == "pdfmaker") {
        require_once 'Helpers/pdfdiploma.php';
    }
    if ($_GET['menu'] == "enviaDiploma") {
        require_once 'Helpers/enviaDiploma.php';
    }

}
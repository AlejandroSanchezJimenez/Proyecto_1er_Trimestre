<?php
$ganador=repositorioMensaje::getGanador(Conexion::getConnection(),$_GET["nombreConcur"]);
$ssb=repositorioMensaje::getGanadorbyModo(Conexion::getConnection(),'SSB',$_GET["nombreConcur"]);
$cw=repositorioMensaje::getGanadorbyModo(Conexion::getConnection(),'CW',$_GET["nombreConcur"]);
$digital=repositorioMensaje::getGanadorbyModo(Conexion::getConnection(),'DIGITAL',$_GET["nombreConcur"]);

//diplomas por premio de modo
if (!isset($ssb) || empty($ssb)) {
    http_response_code(202);
} 
else {
    foreach ($ssb as $value) {
        enviaDiploma::enviaDiploma($value[2],'SSB');
        break;
    }
}
if (!isset($cw) || empty($cw)) {
    http_response_code(202);
} 
else {
    foreach ($cw as $value) {
        enviaDiploma::enviaDiploma($value[2],'CW');
        break;
    }
}
if (!isset($digital) || empty($digital)) {
    http_response_code(202);
} 
else {
    foreach ($digital as $value) {
        enviaDiploma::enviaDiploma($value[2],'Digital');
        break;
    }
}

// //diplomas por puntos meritorios
foreach ($ganador as $value) {
    if ($value[1]>15) {
        enviaDiploma::enviaDiploma($value[2],'MeritorioOro');
    }
    else if ($value[1]>10) {
        enviaDiploma::enviaDiploma($value[2],'MeritorioPlata');
    }
    else if ($value[1]>5) {
        enviaDiploma::enviaDiploma($value[2],'MeritorioBronce');
    }
}

//ganador por modos
foreach ($ganador as $value) {
    enviaDiploma::enviaDiploma($value[2],'Ganador');
    break;
}

echo '<script>alert("Diplomas enviados con éxito")</script>';

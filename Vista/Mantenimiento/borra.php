<?php
if (isset($_GET["indicativo"])) {
    repositorioUser::deleteUserByIndicativo(Conexion::getConnection(), $_GET["indicativo"]);
    header("Location: ?menu=listadoUsers");
}
if (isset($_GET["nombre"])) {
    $idconcur=repositorioConcurso::getAnybyNombre(Conexion::getConnection(),'idConcurso',$_GET["nombre"]);
    repositorioConcursoModo::deleteConcursoModo(Conexion::getConnection(),$idconcur);
    repositorioConcursoBanda::deleteConcursoBanda(Conexion::getConnection(),$idconcur);
    repositorioParticipacion::deleteParticipacion(Conexion::getConnection(),$idconcur);
    repositorioConcurso::deleteConcurByNombre(Conexion::getConnection(), $_GET["nombre"]);
    header("Location: ?menu=listadoconcursos");
}
if (isset($_GET["distancia"])) {
    repositorioBanda::deleteBandaByDistancia(Conexion::getConnection(),$_GET["distancia"]);
    header("Location: ?menu=listadoBanda");
}
if (isset($_GET["identificador"])) {
    repositorioModo::deleteModoByIndificador(Conexion::getConnection(),$_GET["identificador"]);
    header("Location: ?menu=listadoModo");
}
if (isset($_GET["fecha_hora"])) {
    repositorioMensaje::deleteMensajeByFecha_Hora(Conexion::getConnection(),$_GET["fecha_hora"]);
    header("Location: ?menu=Mensajes");
}

?>


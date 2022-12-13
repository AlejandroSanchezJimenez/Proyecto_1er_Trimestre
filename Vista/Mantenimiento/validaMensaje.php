<?php

use FontLib\Table\Type\head;

repositorioMensaje::updateMensajeByFecha_hora(Conexion::getConnection(),$_GET["fecha_hora"]);
header("Location: ?menu=Mensajes");
?>
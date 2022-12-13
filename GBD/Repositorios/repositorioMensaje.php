<?php
class repositorioMensaje {
    static function getMensajePage(
        PDO $con,
        int $NPagina,
        int $NLineas = 10,
        int $mode = PDO::FETCH_BOTH
    ) {
        $PIni = ($NPagina - 1) * $NLineas + 1;
        $query = "SELECT Participacion_User_idUser,Participacion_Concurso_idConcurso,Banda_idBanda,Modo_idModo,Date(fecha_hora_mensaje),Hour(fecha_hora_mensaje),Minute(fecha_hora_mensaje),fecha_hora_mensaje FROM mensaje WHERE idLog >= $PIni AND validado = '0' ORDER BY idLog LIMIT $NLineas ";
        $resul = $con->query($query);
        return $resul->fetchAll($mode);
    }

    static function insertMensaje($con, Mensaje $mensaje,$idUser,$idConcurso,$idModo, $idBanda): bool
    {
        $query = "INSERT INTO mensaje(fecha_hora_mensaje,validado,participacion_concurso_idConcurso,participacion_user_iduser,Modo_idModo,Banda_idBanda) VALUES('$mensaje->fecha_hora_mensaje','$mensaje->validado','$idConcurso','$idUser','$idModo','$idBanda')";
        return $con->exec($query);
    }

    static function deleteMensajeByFecha_Hora(PDO $con, $fecha_hora)
    {
        $query = "DELETE FROM mensaje WHERE fecha_hora_mensaje = '$fecha_hora'";
        return $con->exec($query);
    }

    static function updateMensajeByFecha_hora(PDO $con, $fecha_hora)
    {
        $query = "UPDATE mensaje SET validado = true WHERE fecha_hora_mensaje = '$fecha_hora'";
        return $con->exec($query);
    }

    static function getGanador(PDO $con,$nombreconcur)
    {
        $query = "SELECT indicativo,count(Participacion_User_idUser) as contador,correo_electronico from mensaje inner join user on mensaje.Participacion_User_idUser=user.idUser inner join concurso on mensaje.participacion_concurso_idconcurso=concurso.idconcurso where validado='1' and concurso.nombre='$nombreconcur' group by Participacion_User_idUser order by contador desc";
        $resul = $con->query($query);
        return $resul->fetchAll(PDO::FETCH_BOTH);
    }

    static function getGanadorbyModo(PDO $con,$modo,$nombreconcur)
    {
        $query = "SELECT indicativo,count(Participacion_User_idUser)as contador,correo_electronico from mensaje inner join user on mensaje.Participacion_User_idUser=user.idUser inner join concurso on mensaje.participacion_concurso_idconcurso=concurso.idconcurso join Modo on mensaje.Modo_idModo=modo.idModo where validado='1' and concurso.nombre='$nombreconcur' and modo.Identificador='$modo' group by Participacion_User_idUser order by contador desc";
        $resul = $con->query($query);
        return $resul->fetchAll(PDO::FETCH_BOTH);
    }
}
?>
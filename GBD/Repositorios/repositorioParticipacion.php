<?php
class repositorioParticipacion {
    static function insertParticipacion($con, $idUser, $idConcurso, $juez): bool
    {
        $query = "INSERT INTO participacion(user_iduser,concurso_idconcurso,juez) VALUES('$idUser','$idConcurso','$juez')";
        return $con->exec($query);
    }

    static function getAnybyIndicativo(PDO $con, $campo, $idUser, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT $campo FROM participacion WHERE User_idUser = '$idUser'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }

    static function isJuez(PDO $con, $idConcurso, $idUser, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT Juez FROM participacion WHERE User_idUser = '$idUser' AND Concurso_idConcurso = '$idConcurso'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }

    static function isJuezUser(PDO $con, $idUser, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT Juez FROM participacion WHERE User_idUser = '$idUser' AND juez='1'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }
    static function isParticipanteUser(PDO $con, $idUser, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT Juez FROM participacion WHERE User_idUser = '$idUser' AND juez='0'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }

    static function deleteParticipacion($con,$idconcur ): bool
    {
        $query = "DELETE from participacion where concurso_idconcurso='$idconcur'";
        return $con->exec($query);
    }
}
?>
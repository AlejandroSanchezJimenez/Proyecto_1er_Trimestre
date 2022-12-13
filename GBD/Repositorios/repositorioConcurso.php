<?php
class repositorioConcurso {
    static function insertConcurso($con, Concurso $concurso): bool
    {
        $query = "INSERT INTO concurso(Nombre,Descripcion,Fecha_ini_inscripcion,Fecha_fin_inscripcion,Fecha_ini_concurso,Fecha_fin_concurso,Cartel,Premio) VALUES('$concurso->nombre','$concurso->descripcion','$concurso->fecha_ini_ins','$concurso->fecha_fin_ins','$concurso->fecha_ini_con','$concurso->fecha_fin_con','$concurso->cartel','$concurso->premio')";
        return $con->exec($query);
    }

    static function getAnybyNombre(PDO $con, $campo, $nombre, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT $campo FROM concurso WHERE nombre = '$nombre'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }

    static function getAllbyNombre(PDO $con, $nombre, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT Nombre,Descripcion,Date(Fecha_ini_inscripcion),Date(Fecha_fin_inscripcion),Date(Fecha_ini_concurso),Date(Fecha_fin_concurso),Cartel,Premio FROM concurso WHERE nombre = '$nombre'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }

    static function getAllConcursosbyidUser(PDO $con,$idUser)
    {
        $stmt = $con->prepare("SELECT nombre FROM concurso join participacion on concurso.idConcurso=participacion.Concurso_idConcurso where User_idUser='$idUser' AND Fecha_fin_inscripcion>=curdate()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function getAllConcursos(PDO $con)
    {
        $stmt = $con->prepare("SELECT Indicativo FROM User");
        // careful, without a LIMIT this can take long if your table is huge
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function getConcurPage(
        PDO $con,
    ) {
        $query = "SELECT Nombre,Descripcion,Date(fecha_ini_inscripcion),Date(fecha_fin_inscripcion),Date(fecha_ini_concurso),Date(fecha_fin_concurso),Premio,Cartel FROM concurso WHERE 
        Fecha_fin_inscripcion>=curdate()";
        $resul = $con->query($query);
        return $resul->fetchAll(PDO::FETCH_BOTH);
    }

    static function getConcurPageAll(
        PDO $con,
    ) {
        $query = "SELECT Nombre,Descripcion,Date(fecha_ini_inscripcion),Date(fecha_fin_inscripcion),Date(fecha_ini_concurso),Date(fecha_fin_concurso),Premio,Cartel FROM concurso";
        $resul = $con->query($query);
        return $resul->fetchAll(PDO::FETCH_BOTH);
    }

    static function deleteConcurByNombre(PDO $con, $nombre)
    {
        $query = "DELETE FROM concurso WHERE nombre = '$nombre'";
        return $con->exec($query);
    }

    static function updateConcurByNombre(PDO $con, $nombre, $arrayCol, $arrayDatos)
    {
        $query = "UPDATE concurso SET ";
        for ($i = 1; $i <= count($arrayCol); $i++) {
            if (count($arrayCol) > $i) {
                $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "', ";
            } else {
                $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "' ";
            }
        }
        $query = $query . "WHERE nombre = '$nombre'";
        return $con->exec($query);
    }
    
}
?>
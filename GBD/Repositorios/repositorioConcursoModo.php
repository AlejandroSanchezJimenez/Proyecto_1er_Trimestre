<?php
class repositorioConcursoModo {
    static function insertConcursoModo($con,$idConcur,$idModo): bool
    {
        $query = "INSERT INTO concurso_has_modo(Concurso_Identificador,Modo_idModo) VALUES('$idConcur','$idModo')";
        return $con->exec($query);
    }

    static function getAllbyidConcur(PDO $con,$idConcur)
    {
        $stmt = $con->prepare("SELECT Modo_idModo FROM concurso_has_modo WHERE Concurso_identificador = '$idConcur'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function deleteConcursoModo($con,$idconcur ): bool
    {
        $query = "DELETE from concurso_has_modo where concurso_identificador='$idconcur'";
        return $con->exec($query);
    }
}
?>
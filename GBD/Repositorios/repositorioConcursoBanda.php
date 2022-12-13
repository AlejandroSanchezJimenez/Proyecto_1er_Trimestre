<?php
class repositorioConcursoBanda {
    static function insertConcursoBanda($con,$idConcur,$idBanda ): bool
    {
        $query = "INSERT INTO concurso_has_banda(Concurso_Identificador,Banda_idBanda) VALUES('$idConcur','$idBanda')";
        return $con->exec($query);
    }
    
    static function getAllbyidConcur(PDO $con,$idConcur)
    {
        $stmt = $con->prepare("SELECT Banda_idBanda FROM concurso_has_banda WHERE Concurso_identificador = '$idConcur'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function deleteConcursoBanda($con,$idconcur ): bool
    {
        $query = "DELETE from concurso_has_banda where concurso_identificador='$idconcur'";
        return $con->exec($query);
    }

}
?>
<?php
class repositorioBanda {
    static function insertBanda($con, Banda $banda): bool
    {
        $query = "INSERT INTO banda(distancia,minrango,maxrango) VALUES('$banda->distancia','$banda->minRango','$banda->maxRango')";
        return $con->exec($query);
    }


    static function getAllBandas(PDO $con)
    {
        $stmt = $con->prepare("SELECT distancia FROM Banda");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function getIdBanda(PDO $con, $distancia) {
        $stmt = $con->prepare("SELECT idBanda FROM Banda where distancia = '$distancia'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function deleteBandaByDistancia(PDO $con, $distancia)
    {
        $query = "DELETE FROM banda WHERE distancia = '$distancia'";
        return $con->exec($query);
    }

    static function getBandaPage(
        PDO $con,
        int $NPagina,
        int $NLineas = 10,
        int $mode = PDO::FETCH_BOTH
    ) {
        $PIni = ($NPagina - 1) * $NLineas + 1;
        $query = "SELECT * FROM banda WHERE idBanda >= $PIni ORDER BY idBanda LIMIT $NLineas";
        $resul = $con->query($query);
        return $resul->fetchAll($mode);
    }
    
    static function getBandaByDistancia(PDO $con, $distancia, int $mode = PDO::FETCH_BOTH)
    {
        $query = "SELECT distancia,minRango,maxRango FROM banda WHERE distancia = '$distancia'";
        $resul = $con->query($query);
        return $resul->fetch($mode);
    }

    static function updateBandaByDistancia(PDO $con, $distancia, $arrayCol, $arrayDatos)
    {
        $query = "UPDATE banda SET ";
        for ($i = 1; $i <= count($arrayCol); $i++) {
            if (count($arrayCol) > $i) {
                $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "', ";
            } else {
                $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "' ";
            }
        }
        $query = $query . "WHERE distancia = '$distancia'";
        return $con->exec($query);
    }
}
?>
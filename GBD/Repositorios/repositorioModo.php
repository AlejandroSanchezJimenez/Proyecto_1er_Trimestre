<?php
class repositorioModo {
    static function insertModo($con, Modo $modo): bool
    {
        $query = "INSERT INTO modo(identificador) VALUES('$modo->identificador')";
        return $con->exec($query);
    }

    static function getAllBandas(PDO $con)
    {
        $stmt = $con->prepare("SELECT identificador FROM Modo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    static function getIdModo(PDO $con, $identificador) {
        $stmt = $con->prepare("SELECT idModo FROM Modo where identificador = '$identificador'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    static function getModoPage(
        PDO $con,
        int $NPagina,
        int $NLineas = 10,
        int $mode = PDO::FETCH_BOTH
    ) {
        $PIni = ($NPagina - 1) * $NLineas + 1;
        $query = "SELECT * FROM modo WHERE idModo >= $PIni ORDER BY idModo LIMIT $NLineas";
        $resul = $con->query($query);
        return $resul->fetchAll($mode);
    }

    static function deleteModoByIndificador(PDO $con, $identificador)
    {
        $query = "DELETE FROM modo WHERE identificador = '$identificador'";
        return $con->exec($query);
    }

    static function updateModoByIdentificador(PDO $con, $identificador, $arrayCol, $arrayDatos)
    {
        $query = "UPDATE modo SET ";
        for ($i = 1; $i <= count($arrayCol); $i++) {
            if (count($arrayCol) > $i) {
                $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "', ";
            } else {
                $query = $query . $arrayCol[$i - 1] . " = '" . $arrayDatos[$i - 1] . "' ";
            }
        }
        $query = $query . "WHERE identificador = '$identificador'";
        return $con->exec($query);
    }
}
?>
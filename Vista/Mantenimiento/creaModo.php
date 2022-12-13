<?php
if (isset($_POST["añadeConcur"])) {
    $modo = new Modo($_POST["identificador"]);
    repositorioModo::insertModo(Conexion::getConnection(), $modo);
    echo '<script>alert("Modo creado con éxito")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="creaconcursos">
            <br>
            <h1>Crear un modo</h1>
            <br><br>
            <form class="añadeConcurso" action="" method="post" enctype="multipart/form-data">
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label class="concurso" for="identificador">Identificador:</label><br>
                        <input type="text" name="identificador" id="identificador" class="identificador">
                    </div>
                </div>
                <br><br><br><br>
                <div class="agrupaForm-Concur">
                    <input class="añadeConcur" type="submit" name="añadeConcur" id="añadeConcur" value="CREAR">
                    <br><br>
                    <input class="reset-cambios" type="reset" value="RESTABLECER">
                </div>
            </form>
        </div>
    </center>
</body>

</html>
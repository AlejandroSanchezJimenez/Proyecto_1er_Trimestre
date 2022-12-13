<?php
if (isset($_POST["añadeConcur"])) {
    $banda = new Banda($_POST["distancia"], $_POST["minrango"], $_POST["maxrango"]);
    repositorioBanda::insertBanda(Conexion::getConnection(), $banda);
    echo '<script>alert("Banda creada con éxito")</script>';
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
            <h1>Crear una banda</h1>
            <br><br>
            <form class="añadeConcurso" action="" method="post" enctype="multipart/form-data">
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label class="concurso" for="distancia">Distancia:</label><br>
                        <input type="text" name="distancia" id="distancia" class="distancia">
                    </div>
                </div>
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label class="concurso" for="minrango">Rango mínimo:</label><br>
                        <input type="text" name="minrango" id="minrango" class="minrango"></textarea>
                    </div>
                </div>
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label class="concurso" for="maxrango">Rango máximo:</label><br>
                        <input type="text" name="maxrango" id="maxrango" class="maxrango">
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
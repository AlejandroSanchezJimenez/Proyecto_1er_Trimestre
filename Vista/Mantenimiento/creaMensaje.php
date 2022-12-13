<?php
$idUser = repositorioUser::getAnybyIndicativo(Conexion::getConnection(), 'idUser', session::getAttribute("Indicativo"));
$arrayConcursos = repositorioConcurso::getAllConcursosbyidUser(Conexion::getConnection(), $idUser[0]);
if (isset($_POST["añadeConcur"])) {
    $idConcurso=repositorioConcurso::getAnybyNombre(Conexion::getConnection(),'idConcurso',$_POST["concursos"]);
    $idModo=repositorioModo::getIdModo(Conexion::getConnection(),$_POST["modo"]);
    $idBanda=repositorioBanda::getIdBanda(Conexion::getConnection(),$_POST["banda"]);
    $fecha_hoy= new DateTime();
    $result = $fecha_hoy->format('Y-m-d H:i:s');
    $mensaje = new Mensaje($result,false);
    repositorioMensaje::insertMensaje(Conexion::getConnection(),$mensaje,$idUser[0],$idConcurso[0],$idModo[0],$idBanda[0]);
    echo '<script>alert("Mensaje enviado con éxito")</script>';
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
            <h1>Crear un mensaje</h1>
            <br><br>
            <form class="añadeConcurso" action="" method="post" enctype="multipart/form-data">
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label for="concursos" class="concurso">Concurso para el que vas a enviar el mensaje:</label>
                        <select name='concursos' class="concursos" id="concursos[]">
                            <?php
                            $i = 0;
                            while ($i < count($arrayConcursos)) {
                            ?>
                                <option value="<?php echo $arrayConcursos[$i]; ?>"><?php echo $arrayConcursos[$i]; ?></option>
                            <?php
                                $i++;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label for="banda" class="concurso">Bandas válidas:</label>
                        <select name='banda' class="bandaConcur" id="banda[]">
                            <?php
                            $arrayBandas = repositorioBanda::getAllBandas(Conexion::getConnection());
                            $i = 0;
                            while ($i < count($arrayBandas)) {
                            ?>
                                <option value="<?php echo $arrayBandas[$i]; ?>"><?php echo $arrayBandas[$i]; ?></option>
                            <?php
                                $i++;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="agrupaForm-Concur">
                    <div class="agrupaCell-Concur">
                        <label for="modo" class="concurso">Modos válidos:</label>
                        <select name='modo' class="modoConcur" id="modo[]">
                            <?php
                            $arrayModos = repositorioModo::getAllBandas(Conexion::getConnection());
                            $i = 0;
                            while ($i < count($arrayModos)) {
                            ?>
                                <option value="<?php echo $arrayModos[$i]; ?>"><?php echo $arrayModos[$i]; ?></option>
                            <?php
                                $i++;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br><br><br><br>
                <div class="agrupaForm-Concur">
                    <input class="añadeConcur" type="submit" name="añadeConcur" id="añadeConcur" value="MANDAR">
                    <br><br>
                    <input class="reset-cambios" type="reset" value="RESTABLECER">
                </div>
            </form>
        </div>
    </center>
</body>

</html>
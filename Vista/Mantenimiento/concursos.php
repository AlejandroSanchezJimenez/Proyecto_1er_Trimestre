<?php
if (isset($_GET['page']) && $_GET['page'] > 1) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_POST['participaConcurso'])) {
    if (isset($_SESSION['Indicativo'])) {
        $idConcurso = repositorioConcurso::getAnybyNombre(Conexion::getConnection(), 'idConcurso', $_GET["nombreconcur"]);
        $idUser = repositorioUser::getAnybyIndicativo(Conexion::getConnection(), 'idUser', Session::getAttribute("Indicativo"));
        $juez = repositorioParticipacion::isJuez(Conexion::getConnection(),$idConcurso[0],$idUser[0]);
        if (empty($juez)){
            repositorioParticipacion::insertParticipacion(Conexion::getConnection(), $idUser[0], $idConcurso[0], false);
            echo '<script>alert("Te has inscrito correctamente")</script>';
        }
        else if ($juez[0]==1) {
            echo '<script>alert("Eres juez, no puedes participar en este concurso")</script>';
        }
        else if ($juez[0]==0) {
            echo '<script>alert("Ya estás participando en este concurso")</script>';
        }
    } else {
        header("Location: ?menu=login");
    }
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

<body class="concursos">
    <?php
    $pagina = repositorioConcurso::getConcurPage(Conexion::getConnection(), $page, 10);
    if (empty($pagina)) {
        echo "No hay concursos en este momento";
    } else {
        foreach ($pagina as $value) {
    ?>

            <div class="containerConcur">
                <div class="fondoConcurContainer">
                    <img class="foto_concur" src="Helpers\Media\lineas-de-colores_3840x2160_xtrafondos.com.jpg">
                </div>
                <div class="nombreConcur">
                    <?php echo $value[0];  ?>
                    <div class="premioConcur">
                        <p>Premio: <?php echo $value[6];  ?></p>
                    </div>
                </div>
                <div class="descriConcur">
                    <?php echo $value[1];  ?>
                </div>
                <div class="fechaConcur">
                    <p>Empieza el <strong><u><?php echo $value[4]; ?></u></strong> y termina el <strong><u><?php echo $value[5];  ?></u></strong>
                </div>
                <div class="botonConcur">
                    <form method="post" action="?menu=concursos&nombreconcur=<?php echo $value[0]?>">
                        <input type="submit" class="participaConcurso" name="participaConcurso" id="participaConcurso" value="Participar">
                    </form>
                </div>
                <div class="finInsConcur">
                    <p>Termina en
                        <?php
                        $date1 = new DateTime();
                        $date2 = new DateTime("$value[3]");
                        $interval = $date2->diff($date1);
                        echo $interval->days . " días " . $interval->h . " horas ";
                        ?>
                </div>
            </div>
    <?php
        }
    }
    ?>

</body>

</html>
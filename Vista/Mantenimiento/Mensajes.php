<?php
if (isset($_GET['page']) && $_GET['page'] > 1) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$pagina = repositorioMensaje::getMensajePage(Conexion::getConnection(), $page, 10);
$iduser = repositorioUser::getAnybyIndicativo(Conexion::getConnection(), "idUser", Session::getAttribute('Indicativo'));
$juez = repositorioParticipacion::isJuezUser(Conexion::getConnection(), $iduser[0]);
$participante = repositorioParticipacion::isParticipanteUser(Conexion::getConnection(),$iduser[0]);
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
        <?php
        if (empty($participante)) {
            ?>
            <button class="a_añade_Concur"><a href="?menu=concursos">Ver concursos</a></button>
            <?php
        }
        else if ($participante[0] == 0) {
            ?>
        <button class="a_añade_Concur"><a href="?menu=creaMensaje">Nuevo mensaje</a></button>
        <?php
        }
        ?>
        <br><br><br>
        <table id="tabla">
            <tr>
                <th colspan='9'>
                    <h2>Mensajes</h2>
                </th>
            </tr>
            <tr>
                <th id="indicativo">Indicativo</th>
                <th id="concurso">Concurso</th>
                <th id="modo">Modo</th>
                <th id="modosvalidos">Modos válidos</th>
                <th id="banda">Banda</th>
                <th id="bandasvalidas">Bandas válidas</th>
                <th id="fecha">Fecha</th>
                <th id="hora">Hora</th>
                <th id="validado">Validar</th>
            </tr>
            <?php
            if (empty($juez)) {
                echo "<tr><td colspan='9'>No eres juez, por tanto no puedes validar mensajes.</td></tr>";
            } else if (empty($pagina)) {
                echo "<tr><td colspan='9'>No hay mensajes que validar en este momento</td></tr>";
            } else if ($juez[0] == 1) {
                foreach ($pagina as $value) {
                    $arrayBandas = repositorioConcursoBanda::getAllbyidConcur(Conexion::getConnection(), $value[1]);
                    $arrayBandasdata = implode(',', $arrayBandas);
                    $arrayModos = repositorioConcursoModo::getAllbyidConcur(Conexion::getConnection(), $value[1]);
                    $arrayModosdata = implode(',', $arrayModos);
                    echo "<tr>
                            <td>$value[0]</td>
                            <td>$value[1]</td>" . "  
                            <td>$value[3]</td>
                            <td>$arrayModosdata</td>
                            <td>$value[2]</td>
                            <td>$arrayBandasdata</td>
                            <td>$value[4]</td> 
                            <td>$value[5]:$value[6]</td> 
                            <td><a onclick='return ConfirmValida()'' href='?menu=validaMensaje&fecha_hora=" . "$value[7]'>✓</a><a onclick='return ConfirmDelete()'' href='?menu=borra&fecha_hora=" . "$value[7]'>🗑️</a></td>
                        </tr>";
                }
            }
            ?>
            </tr>
            <tr>
                <td colspan="9">
                    <button id="anterior" page=<?php echo "$page"; ?>>◀</button>
                    Página: <?php echo $page ?>
                    <button id="siguiente" page=<?php echo "$page"; ?>>▶</button>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
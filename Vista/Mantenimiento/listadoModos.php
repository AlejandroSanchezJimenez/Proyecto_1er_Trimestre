<?php
if (isset($_GET['page']) && $_GET['page'] > 1){
    $page = $_GET['page'];
} else {
    $page = 1;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Vista\Principal\CSS\layout.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <center>
        <button class="a_añade_Concur"><a href="?menu=creaModo">Nuevo modo</a></button>
        <br><br><br>
        <table id="tabla">
            <tr>
                <th colspan='2'>
                    <h2>Listado de modos</h2>
                </th>
            </tr>
            <tr>
                <th id="identificador">Identificador</th>
                <th id="accion">Acción</th>
            </tr>
            <?php
            $pagina = repositorioModo::getModoPage(Conexion::getConnection(), $page, 10);
            if (empty($pagina)) {
                echo "<tr><td colspan='2'>No hay concursos en este momento</td></tr>";
            } else {
                foreach ($pagina as $value) {
                    echo "<tr>
                            <td>$value[1]</td>
                            <td><a href='?menu=editaModo&identificador="."$value[1]'>✏️</a><a onclick='return ConfirmDelete()'' href='?menu=borra&identificador=" ."$value[1]'>🗑️</a></td>
                        </tr>";
                }
            }
            ?>
            </tr>
            <tr>
                <td colspan="2">
                    <button id="anterior" page=<?php echo "$page"; ?>>◀</button>
                    Página: <?php echo $page ?>
                    <button id="siguiente" page=<?php echo "$page"; ?>>▶</button>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
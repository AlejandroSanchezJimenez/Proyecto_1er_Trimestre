<?php
$array=repositorioBanda::getBandaByDistancia(Conexion::getConnection(),$_GET["distancia"]);

//definimos dos array, uno que guarda los campos que vamos a cambiar, y otro con los datos nuevos
$campos = array();
$valoresnuevos = array();

//comprobamos que los campos no esten vacios, y vamos mirando uno a uno si el valor nuevo es 
//distinto al anterior, de ser así los añadimos a la lista. Finalmente realizamos el update
if (isset($_POST["guarda-cambios"])) {
    if (strcmp($_POST["distancia"],$array[0]!==0)) {
        $campos[]="distancia";
        $valoresnuevos[]=$_POST["distancia"];
    }
    if (strcmp($_POST["minRango"],$array[1]!==0)) {
        $campos[]="minRango";
        $valoresnuevos[]=$_POST["minRango"];
    }
    if (strcmp($_POST["maxRango"],$array[2]!==0)) {
        $campos[]="maxRango";
        $valoresnuevos[]=$_POST["maxRango"];
    }
    repositorioBanda::updateBandaByDistancia(Conexion::getConnection(),$array[0],$campos,$valoresnuevos);
    header("Location:?menu=listadoBanda");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="Vista\Principal\CSS\layout.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Vista\Principal\JS\layout.js"></script>
    <title>Document</title>
</head>

<body class="body-perfil">
    <div class="cuerpo-perfil">
        <p class="titulo-cuerpo-perfil">Información de la banda</p>
        <hr />
        <form class="edita-perfil" action="" method="post" enctype="multipart/form-data">
            <div class="seccion-perfil">
                <p class="titulo-seccion">Datos</p>
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="distancia">Distancia</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" name="distancia" id="distancia" class="distancia"  value="<?php echo $array[0] ?>">
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="minRango">Rango mínimo </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" name="minRango" id="minRango" class="minRango" value="<?php echo $array[1] ?>">
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="maxRango">Rango máximo</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" name="maxRango" id="maxRango" class="maxRango"  value="<?php echo $array[2] ?>">
                <hr />
            </div>
            <br><br>
            <center><input class="guarda-cambios" type="submit" name="guarda-cambios" id="guarda-cambios" value="GUARDAR CAMBIOS"></center>
            <br>
            <center><input class="reset-cambios-perfil" type="reset" value="RESTABLECER"></center>
        </form>
    </div>
</body>

</html>
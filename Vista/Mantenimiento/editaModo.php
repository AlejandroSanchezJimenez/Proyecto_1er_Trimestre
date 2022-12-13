<?php
//definimos dos array, uno que guarda los campos que vamos a cambiar, y otro con los datos nuevos
$campos = array();
$valoresnuevos = array();

//comprobamos que los campos no esten vacios, y vamos mirando uno a uno si el valor nuevo es 
//distinto al anterior, de ser así los añadimos a la lista. Finalmente realizamos el update
if (isset($_POST["guarda-cambios"])) {
    if (strcmp($_POST["identificador"],$_GET["identificador"])) {
        $campos[]="identificador";
        $valoresnuevos[]=$_POST["identificador"];
    }
    repositorioModo::updateModoByIdentificador(Conexion::getConnection(),$_GET["identificador"],$campos,$valoresnuevos);
    header("Location:?menu=listadoModo");
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
        <p class="titulo-cuerpo-perfil">Información del modo</p>
        <hr />
        <form class="edita-perfil" action="" method="post" enctype="multipart/form-data">
            <div class="seccion-perfil">
                <p class="titulo-seccion">Datos</p>
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="identificador">Identificador</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" name="identificador" id="identificador" class="identificador"  value="<?php echo $_GET["identificador"]?>">
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
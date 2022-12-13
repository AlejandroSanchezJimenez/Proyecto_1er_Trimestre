<?php
$array=repositorioConcurso::getAllbyNombre(Conexion::getConnection(),$_GET["nombreConcur"]);

//definimos dos array, uno que guarda los campos que vamos a cambiar, y otro con los datos nuevos
$campos = array();
$valoresnuevos = array();

//comprobamos que los campos no esten vacios, y vamos mirando uno a uno si el valor nuevo es 
//distinto al anterior, de ser así los añadimos a la lista. Finalmente realizamos el update
if (isset($_POST["guarda-cambios"])) {
    if (strcmp($_POST["nombre"],$array[0]!==0)) {
        $campos[]="nombre";
        $valoresnuevos[]=$_POST["nombre"];
    }
    if (strcmp($_POST["descripcion"],$array[1]!==0)) {
        $campos[]="descripcion";
        $valoresnuevos[]=$_POST["descripcion"];
    }
    if (strcmp($_POST["fecha_ini_ins"],$array[2]!==0)) {
        $campos[]="fecha_ini_inscripcion";
        $valoresnuevos[]=$_POST["fecha_ini_ins"];
    }
    if (strcmp($_POST["fecha_fin_ins"],$array[3]!==0)) {
        $campos[]="fecha_fin_inscripcion";
        $valoresnuevos[]=$_POST["fecha_fin_ins"];
    }
    if (strcmp($_POST["fecha_ini_con"],$array[4]!==0)) {
        $campos[]="fecha_ini_concurso";
        $valoresnuevos[]=$_POST["fecha_ini_con"];
    }
    if (strcmp($_POST["fecha_fin_con"],$array[5]!==0)) {
        $campos[]="fecha_fin_concurso";
        $valoresnuevos[]=$_POST["fecha_fin_con"];
    }
    if (strcmp($_POST["premio"],$array[7]!==0)) {
        $campos[]="premio";
        $valoresnuevos[]=$_POST["premio"];
    }
    repositorioConcurso::updateConcurByNombre(Conexion::getConnection(),$array[0],$campos,$valoresnuevos);
    header("Location:?menu=listadoconcursos");
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
    <div class="foto-perfil">
        <img src='Helpers\Media\ejemplo.png' class='imgRedonda' />
    </div>
    <div class="cuerpo-perfil">
        <p class="titulo-cuerpo-perfil">Información del concurso</p>
        <hr />
        <form class="edita-perfil" action="" method="post" enctype="multipart/form-data">
            <div class="seccion-perfil">
                <p class="titulo-seccion">Datos</p>
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="nombre">Nombre</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" name="nombre" id="nombre" class="nombre"  value="<?php echo $array[0] ?>">
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="descripcion">Descripción</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <textarea rows="7" cols="30" name="descripcion" id="descripcion" class="descripcion" ><?php echo $array[1] ?></textarea>
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="fecha_ini_ins">Fecha de inicio de inscripción</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="date" name="fecha_ini_ins" id="fecha_ini_ins" class="fecha_ini_ins"  value="<?php echo $array[2] ?>">
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="fecha_fin_ins">Fecha de inicio de inscripción</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="date" name="fecha_fin_ins" id="fecha_fin_ins" class="fecha_fin_ins"  value="<?php echo $array[3] ?>">
                <hr />
            </div>
            <div class="dato-perfil">
                <label class="perfil" for="fecha_ini_con">Fecha de inicio de concurso </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="date" name="fecha_ini_con" id="fecha_ini_con" class="fecha_ini_con"  value="<?php echo $array[4] ?>">
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="fecha_fin_con">Fecha de fin de concurso</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="date" name="fecha_fin_con" id="fecha_fin_con"  class="fecha_fin_con" value="<?php echo $array[5]?>">
                <hr />
            </div>
            <div classs="dato-perfil">
                <label class="perfil" for="premio">Premio</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="text" name="premio" id="premio"  class="premio" value="<?php echo $array[7]?>">
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
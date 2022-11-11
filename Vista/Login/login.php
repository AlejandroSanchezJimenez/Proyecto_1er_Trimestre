<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="iniciasesion">
        <h1>INICIA SESIÓN</h1>
        <hr/>
        <br><br>
        <form class="inicia" action="" method="post" enctype="multipart/form-data">
            <label for="user">Indicativo</label><br>
            <input type="text" name="user" id="user" placeholder="Escriba su indicativo">
            <br><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass" id="pass" placeholder="Escriba su contraseña">
            <button class="olvidada" onclick="window.location.href='?menu=login'">¿Has olvidado tu contraseña?</button>
            <br><br>
            <input class="iniciaSesion" type="submit" name="Guardar" value="INICIAR SESIÓN">
        </form>
    </div>
    <div class="registra">
        <h1>REGÍSTRATE</h1>
        <hr/>
        <br><br>
        <p>SI TODAVÍA NO TIENES UNA CUENTA DE USUARIO DE RADIO-ASAJI.COM UTILIZA ESTA OPCIÓN PARA ACCEDER AL FORMULARIO DE REGISTRO. <br><br> TE SOLICITAREMOS LA INFORMACIÓN IMPRESCINDIBLE PARA PODER PARTICIPAR EN CONCURSOS.</p>
        <br><br>
        <input class="accedeRegis" type="submit" name="Guardar" value="REGISTRARSE" onclick="window.location.href='?menu=registro'">
    </div>
</body>
</html>
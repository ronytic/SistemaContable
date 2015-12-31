<?php
$folder="../";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Ingreso al Sistema</title>
    <link rel="icon" href="<?php echo $folder;?>imagenes/favicon.png" type="image/x-icon" />
    <link href="<?php echo $folder;?>css/core/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $folder;?>css/core/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $folder;?>css/core/animate.css" rel="stylesheet">
    <link href="<?php echo $folder;?>css/core/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SC+</h1>

            </div>
            <h3>Bienvenido al Sistema de Contabilidad Plus</h3>
            <p>Desarrollado y Diseñado perfectamente el Sistema de Contabilidad Plus cuenta con nuevos puntos de vista adicionales de los Sistemas Contables.
            </p>
            <p>Inicia sesión. Para verlo en acción.</p>
            <?php if(isset($_GET['incompleto'])){?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Los Datos Introducidos se encuentran Incompletos
            </div>
            <?php }?>
            <?php if(isset($_GET['error'])){?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Los Datos Introducidos son erroneos, Verifique y vuelva a Intentarlo
            </div>
            <?php }?>
            <form class="m-t" role="form" action="login.php" method="post">
                <input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Usuario" required="" autofocus name="usuario">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" required="" name="pass">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Acceder</button>

                <a href="#ayuda"><small>¿Olvidaste tu Contraseña?</small></a>
                <p class="text-muted text-center"><small>¿Aún No tienes una Cuenta?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="registro/">Crear Nueva Cuenta</a>
            </form>
            <p class="m-t"> <small>Sistema de Administración Contable Plus &copy; 2015 - <?php echo date("Y")?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo $folder;?>js/core/jquery-2.1.1.js"></script>
    <script src="<?php echo $folder;?>js/core/bootstrap.min.js"></script>

</body>
</html>

<?php
include("class/usuario.php");
$usuario=new usuario;
$datosusu=$usuario->mostrarDatos($_SESSION['CodUsuarioLog']);
$datosusu=array_shift($datosusu);

$nombrecompleto=$datosusu['Nombres']." ".$datosusu['Paterno']." ".$datosusu['Materno'];
$cargo=$datosusu['Nick'];
$foto=$datosusu['Foto']!=""?$datosusu['Foto']:"general.jpg";

include("class/menu.php");
$menu=new menu;
include("class/submenu.php");
$submenu=new submenu;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Contable - SISCON</title>
    <link rel="icon" href="<?php echo $folder?>imagenes/favicon.png" type="image/x-icon" />
    <link href="<?php echo $folder?>css/core/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $folder?>css/core/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $folder?>css/core/animate.css" rel="stylesheet">
    <link href="<?php echo $folder?>css/core/style.css" rel="stylesheet">
    <link href="<?php echo $folder?>css/core/core.css" rel="stylesheet">
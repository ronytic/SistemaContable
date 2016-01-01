<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
$plancuentas_capitulo->eliminarRegistro("CodCapitulo=$Cod");

?>
<?php
include("../../../login/check.php");
extract($_POST);
include("../../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
$valores=array("Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'");
$plancuentas_capitulo->insertarRegistro($valores);
?>
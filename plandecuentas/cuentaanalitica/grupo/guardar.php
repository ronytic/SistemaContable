<?php
include("../../../login/check.php");
extract($_POST);
include("../../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
$valores=array("Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'","CodCapitulo"=>"'$CodCapitulo'");
$plancuentas_grupo->insertarRegistro($valores);
?>
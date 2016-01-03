<?php
include("../../../login/check.php");
extract($_POST);
include("../../../class/plancuentas_cuenta.php");
$plancuentas_cuenta=new plancuentas_cuenta;
$valores=array("Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'","CodGrupo"=>"'$CodGrupo'");
$plancuentas_cuenta->insertarRegistro($valores);
?>
<?php
include("../../../login/check.php");
extract($_POST);
include("../../../class/plancuentas_subcuenta.php");
$plancuentas_subcuenta=new plancuentas_subcuenta;
$valores=array("Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'","CodCuenta"=>"'$CodCuenta'");
$plancuentas_subcuenta->insertarRegistro($valores);
?>
<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_cuenta.php");
$plancuentas_cuenta=new plancuentas_cuenta;
$plancuentas_cuenta->eliminarRegistro("CodCuenta=$Cod");

?>
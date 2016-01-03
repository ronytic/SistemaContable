<?php
include("../../../login/check.php");
extract($_GET);
include("../../../class/plancuentas_subcuenta.php");
$plancuentas_subcuenta=new plancuentas_subcuenta;
$plancuentas_subcuenta->eliminarRegistro("CodSubcuenta=$Cod");

?>
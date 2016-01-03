<?php
include("../../../login/check.php");
extract($_GET);
include("../../../class/plancuentas_cuentaanalitica.php");
$plancuentas_cuentaanalitica=new plancuentas_cuentaanalitica;
$plancuentas_cuentaanalitica->eliminarRegistro("CodCuentaAnalitica=$Cod");

?>
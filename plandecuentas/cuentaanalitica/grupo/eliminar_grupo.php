<?php
include("../../../login/check.php");
extract($_GET);
include("../../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
$plancuentas_grupo->eliminarRegistro("CodGrupo=$Cod");

?>
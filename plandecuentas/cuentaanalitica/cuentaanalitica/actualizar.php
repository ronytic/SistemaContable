<?php
include("../../../login/check.php");
extract($_POST);
include("../../../class/plancuentas_cuentaanalitica.php");
$plancuentas_cuentaanalitica=new plancuentas_cuentaanalitica;
$valores=array("Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'","CodCapitulo"=>"'$CodCapitulo'","CodGrupo"=>"'$CodGrupo'","CodCuenta"=>"'$CodCuenta'","CodSubcuenta"=>"'$CodSubcuenta'");
$plancuentas_cuentaanalitica->actualizarRegistro($valores,"CodCuentaAnalitica=$Cod");


<?php
session_start();
include_once("../configuracion.php");
include_once("../funciones/url.php");
foreach($_SESSION as $k=>$v){
//	echo $k."-".$v;
	unset($_SESSION[$k]);
}
unset($_SESSION["Login"]);
unset($_SESSION["CodUsuarioLog"]);
unset($_SESSION["Nivel"]);
unset($_SESSION["LoginSistemaContable"]);

session_destroy();
header("Location:".url_base().$directory);
?>
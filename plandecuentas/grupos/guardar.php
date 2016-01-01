<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
$valores=array("CodCapitulo"=>"'$CodCapitulo'","Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'");
$plancuentas_grupo->insertarRegistro($valores);
$titulo="Plan de Cuentas - Grupos";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<?php include_once($folder."cabecera.php");?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content text-center p-md">
                <h2><span class="text-navy">DATOS GUARDADOS CORRECTAMENTE</span></h2>
                <a href="./" class="btn btn-success">Volver</a>
            </div>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>
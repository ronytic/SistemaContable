<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_subcuenta.php");
$plancuentas_subcuenta=new plancuentas_subcuenta;
$valores=array("CodCuenta"=>"'$CodCuenta'","Codigo"=>"'$Codigo'","Nombre"=>"'$Nombre'");
$plancuentas_subcuenta->insertarRegistro($valores);
$titulo="Plan de Cuentas - Subcuentas";
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
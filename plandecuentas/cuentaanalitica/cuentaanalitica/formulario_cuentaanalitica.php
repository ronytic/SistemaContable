<?php
include_once("../../../login/check.php");
if($_GET['Cod']!=""){
    $titulo="Modificar";  
    $archivo="actualizar.php";
    include_once("../../../class/plancuentas_cuentaanalitica.php");
    $plancuentas_cuentaanalitica=new plancuentas_cuentaanalitica;
    $pc_cap=$plancuentas_cuentaanalitica->mostrarTodoRegistro("CodCuentaAnalitica=".$_GET['Cod'],"1");
    $pc_cap=array_shift($pc_cap);
    
}else{
    $titulo="Nuevo";    
    $archivo="guardar.php";
}
?>
<small>
    <strong><?php echo $titulo?></strong>
    <span class="pull-right">
        <a href="#" class="cerrar"><i class="fa fa-close"></i></a>
    </span>
</small>
<div class="input-group">
    <input type="text" name="Codigo" value="<?php echo $pc_cap['Codigo']?>" placeholder="Código" class="input input-sm  form-control col-sm-2" size="2" style="width:25%;">
    <input type="text" name="Nombre" value="<?php echo $pc_cap['Nombre']?>" placeholder="Nombre" class="input input-sm form-control col-sm-12" size="20" style="width:75%;"> 
    <span class="input-group-btn">
        <a href="#" class="btn btn-sm btn-success" id="GuardarCuentaAnalitica">Guardar</a>
    </span>
</div>
<input type="hidden" value="<?php echo $_GET['Cod']?>" name="Cod">
<input type="hidden" value="cuentaanalitica/<?php echo $archivo?>" name="ArchivoGuardar">
<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_cuentaanalitica.php");
$plancuentas_cuentaanalitica=new plancuentas_cuentaanalitica;
$pc_subcue=$plancuentas_cuentaanalitica->mostrarTodoRegistro("CodSubcuenta=$CodSubcuenta","1","Codigo,Nombre");

include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
include("../../class/plancuentas_cuenta.php");
$plancuentas_cuenta=new plancuentas_cuenta;
include("../../class/plancuentas_subcuenta.php");
$plancuentas_subcuenta=new plancuentas_subcuenta;
?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr><th width="50">Código General</th><th>Nombre</th><th>Detalle</th></tr>

</thead>
<?php foreach($pc_subcue as $c){
    $pc_cap=$plancuentas_capitulo->mostrarTodoRegistro("CodCapitulo=".$c['CodCapitulo']);    $pc_cap=array_shift($pc_cap);
    $pc_gru=$plancuentas_grupo->mostrarTodoRegistro("CodGrupo=".$c['CodGrupo']);
    $pc_gru=array_shift($pc_gru);
    $pc_cue=$plancuentas_cuenta->mostrarTodoRegistro("CodCuenta=".$c['CodCuenta']);
    $pc_cue=array_shift($pc_cue);
    $pc_subcue=$plancuentas_subcuenta->mostrarTodoRegistro("CodSubcuenta=".$c['CodSubcuenta']);
    $pc_subcue=array_shift($pc_subcue);
?>
<tr>
    <td class="der middle"><?php echo $pc_cap['Codigo']?>.<?php echo $pc_gru['Codigo']!=""?$pc_gru['Codigo']:'0';?>.<?php echo $pc_cue['Codigo']!=""?$pc_cue['Codigo']:'0';?>.<?php echo $pc_subcue['Codigo']!=""?$pc_subcue['Codigo']:'0';?>.<?php echo $c['Codigo']!=""?$c['Codigo']:'0';?></td>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodCuentaAnalitica" value="<?php echo $c['CodCuentaAnalitica']?>" id="CodCuentaAnalitica<?php echo $c['CodCuentaAnalitica']?>">
        <label for="CodCuentaAnalitica<?php echo $c['CodCuentaAnalitica']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    <td><?php echo $c['Detalle']?></td>
    <td width="40">
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="cuentaanalitica/formulario_cuentaanalitica.php?Cod=<?php echo $c['CodCuentaAnalitica']?>" class="btn btn-xs btn-white modificarcuenta" title="Modificar" rel-formulario="formulariocuentaanalitica"><i class="fa fa-pencil"></i></a>
    <?php }?>
    
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="cuentaanalitica/eliminar_cuentaanalitica.php?Cod=<?php echo $c['CodCuentaAnalitica']?>" class="btn btn-xs btn-white eliminarcuenta" title="Eliminar" rel="<?php echo $sc['CodCuentaAnalitica']?>" rel-cuenta="listarcuentaanalitica"><i class="fa fa-trash"></i></a>
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
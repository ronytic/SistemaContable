<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_cuentaanalitica.php");
$plancuentas_cuentaanalitica=new plancuentas_cuentaanalitica;
$pc_subcue=$plancuentas_cuentaanalitica->mostrarTodoRegistro("CodSubcuenta=$CodSubcuenta","1","Codigo,Nombre");
?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr><th>Nombre</th></tr>

</thead>
<?php foreach($pc_subcue as $c){?>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodCuentaAnalitica" value="<?php echo $c['CodCuentaAnalitica']?>" id="CodCuentaAnalitica<?php echo $c['CodCuentaAnalitica']?>">
        <label for="CodCuentaAnalitica<?php echo $c['CodCuentaAnalitica']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    
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
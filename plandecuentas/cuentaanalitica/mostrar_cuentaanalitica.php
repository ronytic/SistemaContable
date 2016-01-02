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
        <input type="radio" name="CodSubcuenta" value="<?php echo $c['CodCuenta']?>" id="CodSubcuenta<?php echo $c['CodSubcuenta']?>">
        <label for="CodSubcuenta<?php echo $c['CodSubcuenta']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    
    <td width="40">
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="?CodSubcuenta=<?php echo $c['CodSubcuenta']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a>
    <?php }?>
    
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $sc['CodSubcuenta']?>"><i class="fa fa-trash"></i></a>
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
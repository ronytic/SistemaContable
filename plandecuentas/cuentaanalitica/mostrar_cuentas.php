<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_cuenta.php");
$plancuentas_cuenta=new plancuentas_cuenta;
$pc_cue=$plancuentas_cuenta->mostrarTodoRegistro("CodGrupo=$CodGrupo","1","Codigo,Nombre");
?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr><th>Nombre</th></tr>

</thead>
<?php foreach($pc_cue as $c){?>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodCuenta" value="<?php echo $c['CodCuenta']?>" id="Cuenta<?php echo $c['CodCuenta']?>">
        <label for="Cuenta<?php echo $c['CodCuenta']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    
    <td width="40">
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="?CodCuenta=<?php echo $c['CodCuenta']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a>
    <?php }?>
    
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $sc['CodCuenta']?>"><i class="fa fa-trash"></i></a>
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
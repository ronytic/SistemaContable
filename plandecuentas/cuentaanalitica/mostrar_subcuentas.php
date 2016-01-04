<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_subcuenta.php");
$plancuentas_subcuenta=new plancuentas_subcuenta;
$pc_subcue=$plancuentas_subcuenta->mostrarTodoRegistro("CodCuenta=$CodCuenta","1","Codigo,Nombre");
?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr><th>Nombre</th></tr>

</thead>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodSubcuenta" value="0" id="Subcuenta0">
        <label for="Subcuenta0">0 - Ninguno</label>
        </div> 
    </td>
</tr>
<?php foreach($pc_subcue as $c){?>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodSubcuenta" value="<?php echo $c['CodSubcuenta']?>" id="CodSubcuenta<?php echo $c['CodSubcuenta']?>">
        <label for="CodSubcuenta<?php echo $c['CodSubcuenta']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    
    <td width="40">
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="subcuenta/formulario_subcuenta.php?Cod=<?php echo $c['CodSubcuenta']?>" class="btn btn-xs btn-white modificarcuenta" title="Modificar" rel-formulario="formulariosubcuenta"><i class="fa fa-pencil"></i></a>
    <?php }?>
    
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="subcuenta/eliminar_subcuenta.php?Cod=<?php echo $c['CodSubcuenta']?>" class="btn btn-xs btn-white eliminarcuenta" title="Eliminar" rel="<?php echo $sc['CodGrupo']?>" rel-cuenta="listarsubcuentas"><i class="fa fa-trash"></i></a>
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
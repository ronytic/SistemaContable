<?php
include("../../login/check.php");
include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
$pc_cap=$plancuentas_capitulo->mostrarTodoRegistro("","1","Codigo,Nombre");
?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr><th>Nombre</th></tr>

</thead>
<?php foreach($pc_cap as $c){?>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodCapitulo" value="<?php echo $c['CodCapitulo']?>" id="Capitulo<?php echo $c['CodCapitulo']?>">
        <label for="Capitulo<?php echo $c['CodCapitulo']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    
    <td width="40">
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="?CodCapitulo=<?php echo $c['CodCapitulo']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a>
    <?php }?>
    
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $sc['CodCapitulo']?>"><i class="fa fa-trash"></i></a>
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
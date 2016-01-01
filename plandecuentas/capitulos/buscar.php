<?php
include("../../login/check.php");
extract($_POST);
$Nombre=$Nombre!=""?$Nombre:'%';
include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
$plancuentas_cap=$plancuentas_capitulo->mostrarTodoRegistro("Nombre  LIKE '$Nombre%'","1","Nombre");
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr><th width="50">N</th><th>Nombre</th></tr>
    </thead>
    <?php foreach($plancuentas_cap as $c){$i++;?>
        <tr>
            <td class="der"><?php echo $i;?></td>
            <td><?php echo $c['Nombre']?></td>
            
            <td width="40"><?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="?CodCapitulo=<?php echo $c['CodCapitulo']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a><?php }?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $c['CodCapitulo']?>"><i class="fa fa-trash"></i></a><?php }?></td>
        </tr>
    <?php }?>
</table>
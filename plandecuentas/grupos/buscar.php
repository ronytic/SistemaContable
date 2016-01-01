<?php
include("../../login/check.php");
extract($_POST);
$Nombre=$Nombre!=""?$Nombre:'%';
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
$plancuentas_gru=$plancuentas_grupo->mostrarTodoRegistro("Nombre  LIKE '$Nombre%' and CodCapitulo LIKE '$CodCapitulo'","1","Codigo");

include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr><th width="50">N</th><th width="100">Código</th><th>Nombre</th><th>Capítulo</th></tr>
    </thead>
    <?php foreach($plancuentas_gru as $g){$i++;
        $plancuentas_cap=$plancuentas_capitulo->mostrarTodoRegistro("CodCapitulo=".$g['CodCapitulo'],"1","Codigo");
        $plancuentas_cap=array_shift($plancuentas_cap);
        ?>
        <tr>
            <td class="der"><?php echo $i;?></td>
            <td><?php echo $g['Codigo']?></td>
            <td><?php echo $g['Nombre']?></td>
            <td><?php echo $plancuentas_cap['Codigo']?> - <?php echo $plancuentas_cap['Nombre']?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$g['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="?CodGrupo=<?php echo $g['CodGrupo']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a><?php }?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$g['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $g['CodGrupo']?>"><i class="fa fa-trash"></i></a><?php }?></td>
        </tr>
    <?php }?>
</table>
<?php
include("../../login/check.php");
extract($_POST);
$Nombre=$Nombre!=""?$Nombre:'%';
include("../../class/plancuentas_cuenta.php");
$plancuentas_cuenta=new plancuentas_cuenta;
$plancuentas_cue=$plancuentas_cuenta->mostrarTodoRegistro("Nombre  LIKE '$Nombre%' and CodGrupo LIKE '$CodGrupo'","1","Codigo");

include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr><th width="50">N</th><th width="100">Código</th><th>Nombre</th><th>Grupo</th><th>Capítulo</th></tr>
    </thead>
    <?php foreach($plancuentas_cue as $c){$i++;
        
        $plancuentas_gru=$plancuentas_grupo->mostrarTodoRegistro("CodGrupo=".$c['CodGrupo'],"1","Codigo");
        $plancuentas_gru=array_shift($plancuentas_gru);
        
        $plancuentas_cap=$plancuentas_capitulo->mostrarTodoRegistro("CodCapitulo=".$plancuentas_gru['CodCapitulo'],"1","Codigo");
        $plancuentas_cap=array_shift($plancuentas_cap);
        ?>
        <tr>
            <td class="der"><?php echo $i;?></td>
            <td><?php echo $c['Codigo']?></td>
            <td><?php echo $c['Nombre']?></td>
            <td><?php echo $plancuentas_gru['Codigo']?> - <?php echo $plancuentas_gru['Nombre']?></td>
            <td><?php echo $plancuentas_cap['Codigo']?> - <?php echo $plancuentas_cap['Nombre']?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="?CodCuenta=<?php echo $c['CodCuenta']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a><?php }?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $c['CodCuenta']?>"><i class="fa fa-trash"></i></a><?php }?></td>
        </tr>
    <?php }?>
</table>
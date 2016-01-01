<?php
include("../../login/check.php");
extract($_POST);
$Nombre=$Nombre!=""?$Nombre:'%';
include("../../class/plancuentas_subcuenta.php");
$plancuentas_subcuenta=new plancuentas_subcuenta;
$plancuentas_subcue=$plancuentas_subcuenta->mostrarTodoRegistro("Nombre  LIKE '$Nombre%' and CodCuenta LIKE '$CodCuenta'","1","Codigo");

include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
include("../../class/plancuentas_cuenta.php");
$plancuentas_cuenta=new plancuentas_cuenta;
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr><th width="50">N</th><th width="100">Código</th><th>Nombre</th><th>Cuenta</th><th>Grupo</th><th>Capítulo</th></tr>
    </thead>
    <?php foreach($plancuentas_subcue as $sc){$i++;
        $plancuentas_cue=$plancuentas_cuenta->mostrarTodoRegistro("CodCuenta=".$sc['CodCuenta'],"1","Codigo");
        $plancuentas_cue=array_shift($plancuentas_cue);
        
        $plancuentas_gru=$plancuentas_grupo->mostrarTodoRegistro("CodGrupo=".$plancuentas_cue['CodGrupo'],"1","Codigo");
        $plancuentas_gru=array_shift($plancuentas_gru);
        
        $plancuentas_cap=$plancuentas_capitulo->mostrarTodoRegistro("CodCapitulo=".$plancuentas_gru['CodCapitulo'],"1","Codigo");
        $plancuentas_cap=array_shift($plancuentas_cap);
        ?>
        <tr>
            <td class="der"><?php echo $i;?></td>
            <td><?php echo $sc['Codigo']?></td>
            <td><?php echo $sc['Nombre']?></td>
            <td><?php echo $plancuentas_cue['Codigo']?> - <?php echo $plancuentas_cue['Nombre']?></td>
            <td><?php echo $plancuentas_gru['Codigo']?> - <?php echo $plancuentas_gru['Nombre']?></td>
            <td><?php echo $plancuentas_cap['Codigo']?> - <?php echo $plancuentas_cap['Nombre']?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$sc['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="?CodSubcuenta=<?php echo $sc['CodSubcuenta']?>" class="btn btn-xs btn-white modificar" title="Modificar"><i class="fa fa-pencil"></i></a><?php }?></td>
            <td width="40"><?php if($_SESSION['CodEmpresa']==$sc['CodEmpresa'] || $_SESSION['Nivel']==1){?><a href="#" class="btn btn-xs btn-white eliminar" title="Eliminar" rel="<?php echo $sc['CodSubcuenta']?>"><i class="fa fa-trash"></i></a><?php }?></td>
        </tr>
    <?php }?>
</table>
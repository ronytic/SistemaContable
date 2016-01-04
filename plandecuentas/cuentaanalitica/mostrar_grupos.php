<?php
include("../../login/check.php");
extract($_POST);
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
$pc_gru=$plancuentas_grupo->mostrarTodoRegistro("CodCapitulo=$CodCapitulo","1","Codigo,Nombre");
?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr><th>Nombre</th></tr>

</thead>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodGrupo" value="0" id="Grupo0">
        <label for="Grupo0">0 - Ninguno</label>
        </div> 
    </td>
</tr>
<?php foreach($pc_gru as $c){?>
<tr>
    <td>
        <div class="radio radio-danger">
        <input type="radio" name="CodGrupo" value="<?php echo $c['CodGrupo']?>" id="Grupo<?php echo $c['CodGrupo']?>">
        <label for="Grupo<?php echo $c['CodGrupo']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></label>
        </div>    
    </td>
    
    <td width="40">
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="grupo/formulario_grupo.php?Cod=<?php echo $c['CodGrupo']?>" class="btn btn-xs btn-white modificarcuenta" title="Modificar" rel-formulario="formulariogrupo"><i class="fa fa-pencil"></i></a>
    <?php }?>
    
    <?php if($_SESSION['CodEmpresa']==$c['CodEmpresa'] || $_SESSION['Nivel']==1){?>
    <a href="grupo/eliminar_grupo.php?Cod=<?php echo $c['CodGrupo']?>" class="btn btn-xs btn-white eliminarcuenta" title="Eliminar" rel="<?php echo $sc['CodGrupo']?>" rel-cuenta="listargrupos"><i class="fa fa-trash"></i></a>
    <?php }?>
    </td>
</tr>
<?php }?>
</table>
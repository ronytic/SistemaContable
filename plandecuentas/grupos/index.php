<?php
include("../../login/check.php");
include("../../class/plancuentas_capitulo.php");
$plancuentas_capitulo=new plancuentas_capitulo;
$pc_cap=$plancuentas_capitulo->mostrarTodoRegistro("","1","Codigo");
$titulo="Plan de Cuentas - Grupos";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<?php include_once($folder."cabecera.php");?>
<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="<?php echo empty($_GET)?'active':'';?>"><a data-toggle="tab" href="#tab-1"> Listar Grupos</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2"> Nuevo Grupo</a></li>
                <?php if($_GET['CodGrupo']){?><li class="active"><a data-toggle="tab" href="#tab-3"> Modificar Capítulo</a></li><?php }?>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane <?php echo empty($_GET)?'active':'';?>">
                    <div class="panel-body">
                        <form action="buscar.php" method="post" class="formulario" rel-respuesta="">
                        <table class="table table-bordered">
                            <thead>
                                <tr><th>Capítulo</th><th class="">Nombre</th></tr>
                            </thead>
                            <tr>
                                <td><select name="CodCapitulo" class="form-control">
                                    <option value="%">Todos</option>
                                    <?php foreach($pc_cap as $c){?>
                                    <option value="<?php echo $c['CodCapitulo']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></option>
                                    <?php }?>
                                </select></td>
                                <td><input type="text" name="Nombre" class="form-control"></td>
                                <td><input type="submit" value="Buscar" class="btn btn-success"></td>
                            </tr>
                        </table>
                        </form>
                        <div id="respuestaformulario"></div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <form action="guardar.php" method="post">
                        <table class="table">
                            <tr>
                                <td class="label-m col-sm-3">Capítulo:</td>
                                <td><select name="CodCapitulo" class="form-control">
                                    <?php foreach($pc_cap as $c){?>
                                    <option value="<?php echo $c['CodCapitulo']?>"><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></option>
                                    <?php }?>
                                </select></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Código del Grupo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Codigo"></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Nombre del Grupo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Nombre"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Guardar" class="btn btn-success"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                <?php if($_GET['CodGrupo']){
                    $CodGrupo=$_GET['CodGrupo'];
                    include("../../class/plancuentas_grupo.php");
                    $plancuentas_grupo=new plancuentas_grupo;
                    $pc_gru=$plancuentas_grupo->mostrarTodoRegistro("CodGrupo  LIKE '$CodGrupo'","1","Nombre");
                    $pc_gru=array_shift($pc_gru);
                ?>
                <div id="tab-3" class="tab-pane active">
                    <div class="panel-body">
                        <form action="actualizar.php" method="post">
                        <input type="hidden" name="CodGrupo" value="<?php echo $_GET['CodGrupo']?>">
                        <table class="table">
                            <tr>
                                <td class="label-m col-sm-3">Capítulo:</td>
                                <td><select name="CodCapitulo" class="form-control">
                                    <?php foreach($pc_cap as $c){?>
                                    <option value="<?php echo $c['CodCapitulo']?>" <?php echo $pc_gru['CodCapitulo']==$c['CodCapitulo']?'selected="selected"':''?>><?php echo $c['Codigo']?> - <?php echo $c['Nombre']?></option>
                                    <?php }?>
                                </select></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Código del Capítulo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Codigo" value="<?php echo $pc_gru['Codigo']?>"></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Nombre del Capítulo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Nombre" value="<?php echo $pc_gru['Nombre']?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Modificar" class="btn btn-success"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div><!--Col12-->
</div><!--Row-->
<?php include_once($folder."pie.php");?>
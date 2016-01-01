<?php
include("../../login/check.php");
include("../../class/plancuentas_grupo.php");
$plancuentas_grupo=new plancuentas_grupo;
$pc_gru=$plancuentas_grupo->mostrarTodoRegistro("","1","Codigo");
$titulo="Plan de Cuentas - Cuentas";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<?php include_once($folder."cabecera.php");?>
<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="<?php echo empty($_GET)?'active':'';?>"><a data-toggle="tab" href="#tab-1"> Listar Cuentas</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2"> Nueva Cuenta</a></li>
                <?php if($_GET['CodCuenta']){?><li class="active"><a data-toggle="tab" href="#tab-3"> Modificar Cuenta</a></li><?php }?>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane <?php echo empty($_GET)?'active':'';?>">
                    <div class="panel-body">
                        <form action="buscar.php" method="post" class="formulario" rel-respuesta="">
                        <table class="table table-bordered">
                            <thead>
                                <tr><th>Grupo</th><th class="">Nombre</th></tr>
                            </thead>
                            <tr>
                                <td><select name="CodGrupo" class="form-control">
                                    <option value="%">Todos</option>
                                    <?php foreach($pc_gru as $g){?>
                                    <option value="<?php echo $g['CodGrupo']?>"><?php echo $g['Codigo']?> - <?php echo $g['Nombre']?></option>
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
                                <td class="label-m col-sm-3">Grupo:</td>
                                <td><select name="CodGrupo" class="form-control">
                                    <?php foreach($pc_gru as $g){?>
                                    <option value="<?php echo $g['CodGrupo']?>"><?php echo $g['Codigo']?> - <?php echo $g['Nombre']?></option>
                                    <?php }?>
                                </select></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Código de la Cuenta:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Codigo"></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Nombre de la Cuenta:</td>
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
                <?php if($_GET['CodCuenta']){
                    $CodCuenta=$_GET['CodCuenta'];
                    include("../../class/plancuentas_cuenta.php");
                    $plancuentas_cuenta=new plancuentas_cuenta;
                    $pc_cue=$plancuentas_cuenta->mostrarTodoRegistro("CodCuenta  LIKE '$CodCuenta'","1","Nombre");
                    $pc_cue=array_shift($pc_cue);
                ?>
                <div id="tab-3" class="tab-pane active">
                    <div class="panel-body">
                        <form action="actualizar.php" method="post">
                        <input type="hidden" name="CodCuenta" value="<?php echo $_GET['CodCuenta']?>">
                        <table class="table">
                            <tr>
                                <td class="label-m col-sm-3">Grupo:</td>
                                <td><select name="CodGrupo" class="form-control">
                                     <?php foreach($pc_gru as $g){?>
                                    <option value="<?php echo $g['CodGrupo']?>" <?php echo $pc_cue['CodGrupo']==$g['CodGrupo']?'selected="selected"':''?>><?php echo $g['Codigo']?> - <?php echo $g['Nombre']?></option>
                                    <?php }?>
                                </select></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Código de la Cuenta:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Codigo" value="<?php echo $pc_cue['Codigo']?>"></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Nombre de la Cuenta:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Nombre" value="<?php echo $pc_cue['Nombre']?>"></td>
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
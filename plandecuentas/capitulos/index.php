<?php
include("../../login/check.php");
$titulo="Plan de Cuentas - Capítulos";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<?php include_once($folder."cabecera.php");?>
<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="<?php echo empty($_GET)?'active':'';?>"><a data-toggle="tab" href="#tab-1"> Listar Capítulos</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2"> Nuevo Capítulo</a></li>
                <?php if($_GET['CodCapitulo']){?><li class="active"><a data-toggle="tab" href="#tab-3"> Modificar Capítulo</a></li><?php }?>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane <?php echo empty($_GET)?'active':'';?>">
                    <div class="panel-body">
                        <form action="buscar.php" method="post" class="formulario" rel-respuesta="">
                        <table class="table table-bordered">
                            <thead>
                                <tr><th class="">Nombre</th></tr>
                            </thead>
                            <tr>
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
                                <td class="label-m col-sm-3">Código del Capítulo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Codigo"></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Nombre del Capítulo:</td>
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
                <?php if($_GET['CodCapitulo']){
                    $CodCapitulo=$_GET['CodCapitulo'];
                    include("../../class/plancuentas_capitulo.php");
                    $plancuentas_capitulo=new plancuentas_capitulo;
                    $pc_cap=$plancuentas_capitulo->mostrarTodoRegistro("CodCapitulo  LIKE '$CodCapitulo'","1","Nombre");
                    $pc_cap=array_shift($pc_cap);
                ?>
                <div id="tab-3" class="tab-pane active">
                    <div class="panel-body">
                        <form action="actualizar.php" method="post">
                        <input type="hidden" name="CodCapitulo" value="<?php echo $_GET['CodCapitulo']?>">
                        <table class="table">
                            <tr>
                                <td class="label-m col-sm-3">Código del Capítulo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Codigo" value="<?php echo $pc_cap['Codigo']?>"></td>
                            </tr>
                            <tr>
                                <td class="label-m col-sm-3">Nombre del Capítulo:</td>
                                <td><input type="text" class="form-control" placeholder="" name="Nombre" value="<?php echo $pc_cap['Nombre']?>"></td>
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
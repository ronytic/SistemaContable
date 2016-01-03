<?php
include("../../login/check.php");
$titulo="Plan de Cuentas - Cuentas Analíticas";
$folder="../../";
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript">
$(document).on("ready",function(){
    listarcapitulos();
    //listargrupos();
    //listarcuentas();
    //listarsubcuentas();
    //listarcuentaanalitica();
    $(document).on("change","[name=CodCapitulo]",function(){
        listargrupos(); 
    });
    $(document).on("change","[name=CodGrupo]",function(){
        listarcuentas();   
    });
    $(document).on("change","[name=CodCuenta]",function(){
        listarsubcuentas();   
    });
    $(document).on("change","[name=CodSubcuenta]",function(){
        listarcuentaanalitica();   
    });
    $(document).on("click","#nuevocapitulo",function(e){
        e.preventDefault();
        $.post("capitulo/formulario_capitulo.php",{},function(data){
            $("#formulariocapitulo").html(data).slideDown("slow");    
        });
    });
    $(document).on("click"," .cerrar",function(e){
        e.preventDefault();
        $(this).parent().parent().parent().html('');
    });
    $(document).on("click","#GuardarCapitulo",function(e){
        e.preventDefault();
        var Codigo=$("#formulariocapitulo [name=Codigo]").val(); 
        var Nombre=$("#formulariocapitulo [name=Nombre]").val(); 
        var Cod=$("#formulariocapitulo [name=Cod]").val(); 
        var ArchivoGuardar=$("#formulariocapitulo [name=ArchivoGuardar]").val(); 
        $.post(ArchivoGuardar,{"Codigo":Codigo,"Nombre":Nombre,"Cod":Cod},function(){
            listarcapitulos();    
             $("#formulariocapitulo").html('');
        })
    })
    $(document).on("click",".modificarcuenta",function(e){
        e.preventDefault();
        if(confirm("¿Esta seguro que desea Modificar esta Cuenta?")){
            var dir=$(this).attr("href");
            var formulario=$(this).attr("rel-formulario");
            $.get(dir,{},function(data){
               $("#"+formulario).html(data);
            }); 
        }
        
    })
    $(document).on("click",".eliminarcuenta",function(e){
        e.preventDefault();
        if(confirm("¿Esta seguro que desea Eliminar esta Cuenta?\nRecuerde que si contiene algun elemento dentro su jerarquia se perderan sin posibilidad de recuperarlo")){
            var dir=$(this).attr("href");
            var listado=$(this).attr("rel-cuenta");
            $.get(dir,{},function(data){
               setTimeout(listado+"()",0)
            });
        }
        
    })
});
function listarcapitulos(){
    $("#listadogrupos").html(""); 
    $("#listadocuentas").html("");   
    $("#listadosubcuentas").html("");
    $("#listadocuentaanalitica").html("");
    $.post("mostrar_capitulos.php",{},function(data){
        $("#listadocapitulos").html(data);
    });
}
function listargrupos(){
    var CodCapitulo=$("[name=CodCapitulo]:checked").val();
    $.post("mostrar_grupos.php",{"CodCapitulo":CodCapitulo},function(data){
        $("#listadogrupos").html(data);
    });
}
function listarcuentas(){
    var CodGrupo=$("[name=CodGrupo]:checked").val();
    $.post("mostrar_cuentas.php",{"CodGrupo":CodGrupo},function(data){
        $("#listadocuentas").html(data);
    });
}
function listarsubcuentas(){
    var CodCuenta=$("[name=CodCuenta]:checked").val();
    $.post("mostrar_subcuentas.php",{"CodCuenta":CodCuenta},function(data){
        $("#listadosubcuentas").html(data);
    });
}
function listarcuentaanalitica(){
    var CodSubcuenta=$("[name=CodSubcuenta]:checked").val();
    $.post("mostrar_cuentaanalitica.php",{"CodSubcuenta":CodSubcuenta},function(data){
        $("#listadocuentaanalitica").html(data);
    });
}
</script>
<?php include_once($folder."cabecera.php");?>
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title"><h5>1.- Capítulo </h5> <span class="pull-right"><a href="#" id="nuevocapitulo" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a></span></div>
            <div class="ibox-content">
                <div id="listadocapitulos"></div>
                <div id="formulariocapitulo"></div>
            </div>
        </div>
    </div><!--Col12-->
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title"><h5>2.- Grupo</h5></div>
            <div class="ibox-content" id="listadogrupos"></div>
        </div>
    </div><!--Col12-->
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title"><h5>3.- Cuenta</h5></div>
            <div class="ibox-content" id="listadocuentas"></div>
        </div>
    </div><!--Col12-->
</div><!--Row-->
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title"><h5>4.- Subcuenta</h5></div>
            <div class="ibox-content" id="listadosubcuentas"></div>
        </div>
    </div><!--Col12-->
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-title"><h5>5.- Cuenta Analitica</h5></div>
            <div class="ibox-content" id="listadocuentaanalitica"></div>
        </div>
    </div><!--Col12-->
</div>
<?php include_once($folder."pie.php");?>
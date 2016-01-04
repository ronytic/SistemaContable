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
    $(document).on("click","#nuevogrupo",function(e){
        e.preventDefault();
        var CodCapitulo=$("[name=CodCapitulo]:checked").val();
        $.post("grupo/formulario_grupo.php",{"CodCapitulo":CodCapitulo},function(data){
            $("#formulariogrupo").html(data).slideDown("slow");    
        });
    });
    $(document).on("click","#nuevocuenta",function(e){
        e.preventDefault();
        var CodGrupo=$("[name=CodGrupo]:checked").val();
        $.post("cuenta/formulario_cuenta.php",{"CodGrupo":CodGrupo},function(data){
            $("#formulariocuenta").html(data).slideDown("slow");    
        });
    });
    $(document).on("click","#nuevosubcuenta",function(e){
        e.preventDefault();
        var CodCuenta=$("[name=CodCuenta]:checked").val();
        $.post("subcuenta/formulario_subcuenta.php",{"CodCuenta":CodCuenta},function(data){
            $("#formulariosubcuenta").html(data).slideDown("slow");    
        });
    });
    $(document).on("click","#nuevocuentaanalitica",function(e){
        e.preventDefault();
        var CodSubcuenta=$("[name=CodSubcuenta]:checked").val();
        $.post("cuentaanalitica/formulario_cuentaanalitica.php",{"CodSubcuenta":CodSubcuenta},function(data){
            $("#formulariocuentaanalitica").html(data).slideDown("slow");    
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
    $(document).on("click","#GuardarGrupo",function(e){
        e.preventDefault();
        var CodCapitulo=$("[name=CodCapitulo]:checked").val();
        if(isNaN(CodCapitulo)){alert("¡Seleccione un Capitulo!");return false;}
        
        var Codigo=$("#formulariogrupo [name=Codigo]").val(); 
        var Nombre=$("#formulariogrupo [name=Nombre]").val(); 
        var Cod=$("#formulariogrupo [name=Cod]").val(); 
        var ArchivoGuardar=$("#formulariogrupo [name=ArchivoGuardar]").val(); 
        $.post(ArchivoGuardar,{"Codigo":Codigo,"Nombre":Nombre,"Cod":Cod,"CodCapitulo":CodCapitulo},function(){
            listargrupos();    
             $("#formulariogrupo").html('');
        })
    })
    $(document).on("click","#GuardarCuenta",function(e){
        e.preventDefault();
        var CodGrupo=$("[name=CodGrupo]:checked").val();
        if(isNaN(CodGrupo)){alert("¡Seleccione un Grupo!");return false;}
        
        var Codigo=$("#formulariocuenta [name=Codigo]").val(); 
        var Nombre=$("#formulariocuenta [name=Nombre]").val(); 
        var Cod=$("#formulariocuenta [name=Cod]").val(); 
        var ArchivoGuardar=$("#formulariocuenta [name=ArchivoGuardar]").val(); 
        $.post(ArchivoGuardar,{"Codigo":Codigo,"Nombre":Nombre,"Cod":Cod,"CodGrupo":CodGrupo},function(){
            listarcuentas();    
             $("#formulariocuenta").html('');
        })
    })
    $(document).on("click","#GuardarSubcuenta",function(e){
        e.preventDefault();
        var CodCuenta=$("[name=CodCuenta]:checked").val();
        if(isNaN(CodCuenta)){alert("¡Seleccione una Cuenta!");return false;}
        
        var Codigo=$("#formulariosubcuenta [name=Codigo]").val(); 
        var Nombre=$("#formulariosubcuenta [name=Nombre]").val(); 
        var Cod=$("#formulariosubcuenta [name=Cod]").val(); 
        var ArchivoGuardar=$("#formulariosubcuenta [name=ArchivoGuardar]").val(); 
        $.post(ArchivoGuardar,{"Codigo":Codigo,"Nombre":Nombre,"Cod":Cod,"CodCuenta":CodCuenta},function(){
            listarsubcuentas();    
             $("#formulariosubcuenta").html('');
        })
    })
    $(document).on("click","#GuardarCuentaAnalitica",function(e){
        e.preventDefault();
        var CodCapitulo=$("[name=CodCapitulo]:checked").val();
        var CodGrupo=$("[name=CodGrupo]:checked").val();
        var CodCuenta=$("[name=CodCuenta]:checked").val();
        var CodSubcuenta=$("[name=CodSubcuenta]:checked").val();
        
        if(isNaN(CodCapitulo)){alert("¡Seleccione un Capitulo!");return false;}
        if(isNaN(CodGrupo)){alert("¡Seleccione un Grupo!");return false;}
        if(isNaN(CodCuenta)){alert("¡Seleccione una Cuenta!");return false;}
        if(isNaN(CodSubcuenta)){alert("¡Seleccione una Subcuenta!");return false;}
        
        var Codigo=$("#formulariocuentaanalitica [name=Codigo]").val(); 
        var Nombre=$("#formulariocuentaanalitica [name=Nombre]").val(); 
        var Cod=$("#formulariocuentaanalitica [name=Cod]").val(); 
        var Detalle=$("#formulariocuentaanalitica [name=Detalle]").val(); 
        var ArchivoGuardar=$("#formulariocuentaanalitica [name=ArchivoGuardar]").val(); 
        $.post(ArchivoGuardar,{"Codigo":Codigo,"Nombre":Nombre,"Detalle":Detalle,"Cod":Cod,"CodCapitulo":CodCapitulo,"CodGrupo":CodGrupo,"CodCuenta":CodCuenta,"CodSubcuenta":CodSubcuenta},function(){
            listarcuentaanalitica();    
             $("#formulariocuentaanalitica").html('');
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
    $("#listadocuentas").html("");   
    $("#listadosubcuentas").html("");
    $("#listadocuentaanalitica").html("");
    
    var CodCapitulo=$("[name=CodCapitulo]:checked").val();
    $.post("mostrar_grupos.php",{"CodCapitulo":CodCapitulo},function(data){
        $("#listadogrupos").html(data);
    });
}
function listarcuentas(){
    $("#listadosubcuentas").html("");
    $("#listadocuentaanalitica").html("");
    var CodGrupo=$("[name=CodGrupo]:checked").val();
    $.post("mostrar_cuentas.php",{"CodGrupo":CodGrupo},function(data){
        $("#listadocuentas").html(data);
    });
}
function listarsubcuentas(){
    $("#listadocuentaanalitica").html("");
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
            <div class="ibox-title"><h5>2.- Grupo</h5> <span class="pull-right"><a href="#" id="nuevogrupo" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a></span></div>
            <div class="ibox-content">
                <div id="listadogrupos"></div>
                <div id="formulariogrupo"></div>
            </div>
        </div>
    </div><!--Col12-->
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title"><h5>3.- Cuenta</h5> <span class="pull-right"><a href="#" id="nuevocuenta" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a></span></div>
            <div class="ibox-content">
                <div id="listadocuentas"></div>
                <div id="formulariocuenta"></div>
            </div>
        </div>
    </div><!--Col12-->
</div><!--Row-->
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title"><h5>4.- Subcuenta</h5> <span class="pull-right"><a href="#" id="nuevosubcuenta" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a></span></div>
            <div class="ibox-content">
                <div id="listadosubcuentas"></div>
                <div id="formulariosubcuenta"></div>
            </div>
        </div>
    </div><!--Col12-->
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-title"><h5>5.- Cuenta Analitica</h5> <span class="pull-right"><a href="#" id="nuevocuentaanalitica" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a></span></div>
            <div class="ibox-content">
                <div id="listadocuentaanalitica"></div>
                <div id="formulariocuentaanalitica"></div>
            </div>
        </div>
    </div><!--Col12-->
</div>
<?php include_once($folder."pie.php");?>
$(document).on("ready",function(){
	
});
$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};
$(document).on('submit','form.formulario', function(e) {
		e.preventDefault(); // prevent native submit
        var respuesta=$(this).attr("rel-respuesta");
        if(respuesta==""){respuesta="respuestaformulario";}
        if(!$(this).hasAttr("rel-respuesta")){respuesta="respuestaformulario";}
		var percent=$("#"+respuesta)
    	$(this).ajaxSubmit({
        	target: '#'+respuesta,
			beforeSend: function() {
				//status.empty();
				var percentVal = '0%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			complete: function(xhr) {
			//bar.width("100%");
			//percent.html("100%");
			$("#"+respuesta).html(xhr.responseText);
			
			}
    	})
});
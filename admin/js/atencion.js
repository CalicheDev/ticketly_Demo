$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./ajax/atenciones.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
		}
	})
}



function eliminar (id)
{
	var q= $("#q").val();
	if (confirm("Realmente deseas eliminar el ticket?")){	
		$.ajax({
			type: "GET",
			url: "./ajax/atenciones.php",
			data: "id="+id,"q":q,
			beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			},
			success: function(datos){
				$("#resultados").html(datos);
				load(1);
			}
		});
	}
}

$(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "action/atenciones.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
           });
      });
}); 
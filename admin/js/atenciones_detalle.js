$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
	$("#loader2").fadeIn('slow');
	$.ajax({
		url:'./ajax/atenciones_detalle.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loader2').html('<img src="./images/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
			$(".outer_div2").html(data).fadeIn('slow');
			$('#loader2').html('');
		}
	})
}

function eliminar (id)
{
	var q= $("#q").val();
	if (confirm("Realmente deseas eliminar el ticket?")){	
		$.ajax({
			type: "GET",
			url: "./ajax/atenciones_detalle.php",
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

/*
function show_files_bitacora(id){
	var parametros ={"action":"ajax","id":id};
	$.ajax({
		url:'./ajax/atenciones_detalle.php?action=ajax&page='+page+'&q='+q,
		data: parametros,
		beforeSend: function(objeto){
			$('#loader2').html('<img src="./images/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
			$(".outer_div2").html(data).fadeIn('slow');
			$('#loader2').html('');
		}
	})
}*/


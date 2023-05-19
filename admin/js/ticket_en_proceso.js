$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
	//var t= $("#t").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		//url:'./ajax/tickets_en_proceso.php?action=ajax&page='+page+'&q='+q,
		url:'./ajax/show_files_ticket.php?action=ajax&page='+page+'&q='+q,
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
			//url: "./ajax/tickets_en_proceso.php",
			url: "./ajax/show_files_ticket.php",
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
function show_files_ticket(page){
		var q= $("#q").val();
        //var parametros = {"action":"ajax","id":id};
        $("#loader2").fadeIn('slow');
        $.ajax({
            url:'ajax/show_files_ticket.php',
            //url:'./ajax/show_files_ticket.php?action=ajax&page='+page+'&q='+q,
            //data: parametros,
             beforeSend: function(objeto){
            //$("#loader2").html("<img src='./images/ajax-loader.gif'>");
            $('#loader2').html('<img src="./images/ajax-loader.gif"> Cargando...');
          },
            success:function(data){
              //$(".outer_div2").html(data).fadeIn('slow'); 
                $(".outer_div2").html(data).fadeIn('slow');               
                $("#loader2").html("");                
            }
        })
    }   
    function show_files_bitacora(id){
        var parametros = {"action":"ajax","id":id};
        $.ajax({
            url:'ajax/show_files_bitacora.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loader2").html("<img src='../images/ajax-loader.gif'>");
          },
            success:function(data){
                $(".outer_div2").html(data).fadeIn('slow');
                $("#loader2").html("");
            }
        })
    } */
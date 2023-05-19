<?php
    $title ="Soporte | ";
    include "head.php";
    include "sidebar.php";
?>








 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-edit icon-title"></i> Agregar Ticket</h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li class="active"> Nuevo Ticket </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <!-- datos con ajax en el finish -->
                            <div class="outer_div2"></div><!-- Datos ajax Final -->   
                            <div id="loader2" class="text-center"></div>
                            <!-- fin -->
                            <form name="update_register" id="update_register" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="col-sm-4">
                                    <input type="hidden"  id="id" name="id"  value="431" >
                                </div>
                                <div class="row">

                                    <div id="resultados" class='col-md-12' style="margin-top:15px"></div><!-- Carga los datos ajax -->

                                    <div class="col-md-12" id="wiz">
                                        <div class=" wizard-content">
                                            <div style="">
                                                <div style="display: inline-block;text-align: center;font-size: 18px;position: relative;width: 24%;;">
                                                <div style="" id="text1"></div>
                                                </div>
                                                <div style="width: 24%;display: inline-block;text-align: center;font-size: 18px;position: relative;" id="text2"></div>
                                                <div style="width: 24%;display: inline-block;text-align: center;font-size: 18px;position: relative;" id="text3"></div>
                                                <div style="width: 23%;display: inline-block;text-align: center;font-size: 18px;position: relative;" id="text4"></div>
                                            </div>
    <div class="wizard-step">
        <br><br>
        <h5>Seleccione el área  al que desea reportar su ticket:</h5>
        <!-- <div class="table-responsive"> -->
        <table id="example3" class="table table-bordered table-striped">
            <thead class="table_header">
                <tr>
                    <th style="width: 30px"></th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="7" value="7">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="7">
                            Area de prueba  
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="3" value="3">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="3">
                            Finanzas  
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="4" value="4">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="4">
                            Ingenieria  
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="8" value="8">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="8">
                            IT  
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="5" value="5">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="5">
                            Mensajeria  
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="2" value="2">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="2">
                            Recursos Humanos  
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="1" value="1">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="1">
                            Soporte TI   
                        </label>
                    </td>
                </tr>
                            <tr>
                    <td style="width: 30px; text-align: center;">
                        <input onchange="return ticket_update(this.value,1);" type="radio" name="area" id="6" value="6">
                    </td>
                    <td>
                        <label style="font-weight: normal;" for="6">
                            Tesoreria  
                        </label>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <!-- </div> -->
    </div>


    <div class="wizard-step">

        <!-- <div class="row">
            <br><br>
            <h5 class="text-left" style="display: inline-block;margin-bottom: 10px;margin-left: 30px;">Seleccione la categoría a reportar:</h5>
            <br>
            <div class="col-xs-3 pull-right" style="padding-bottom: 5px;padding-right: 30px;width: 200px;">
                <input type="text" class="form-control" id='q' onkeyup="load(1);">
            </div>
            <div class="col-xs-3"></div>
            antiguo
        </div> -->
        
        <div class="row">
            <br><br>
            <h5 class="text-left" style="display: inline-block;margin-bottom: 10px;margin-left: 30px;">Seleccione la categoría a reportar:</h5>
            <br>
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <div id="example3_filter" class="dataTables_filter">
                    <label>
                        Buscar:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example3" id='q' onkeyup="load(1);">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="resultados_ajax"></div>
                <div class="outer_div"></div><!-- Datos ajax Final -->    
            </div>
        </div>
    </div>
    <div class="wizard-step">
        <!-- <h3>Descripción:</h3> <br> -->
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="form-group col-md-12">
                    <label for="asunt">Asunto:</label>
                    <input type="text" class="form-control" id="asunt" name="asunt" placeholder="Asunto" onblur="return ticket_update(this.value,3);">
                </div>
                <div class="form-group col-md-12">
                    <label for="descripcion">Descripción:</label>
                    <textarea onblur="return ticket_update(this.value,4);" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" rows="10"></textarea>
                </div>
                <div class="form-group col-md-8">
                    <label for="asunt">Adjunto:</label>
                    <input type="file" class='form-control' name="imagefile[]" multiple id="imagefile">
                    <span class="text-info">Selecciona un archivo, Peso Máximo 2MB</span><br>
                    <span class="text-muted">Archivos permitidos:  doc, docx, xls, xlsx, pdf, zip, jpg, png, jpeg </span>
                </div>
                <div style="margin-top: 24px;" class="col-md-4" id="load_img"></div>   
            </div>
        </div>
    </div>
    

<script>
	$(document).ready(function() {
		// Table 1
	    var table = $('#example1').DataTable( {
	    	"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	        responsive: true
	    } );
    	// new $.fn.dataTable.FixedHeader(table);

    	//table 2
    	var table1 = $('#example2').DataTable( {
	    	"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	        "paging": true,
	      	"lengthChange": false,
	      	"searching": false,
	      	"ordering": true,
	      	"info": true,
	      	"autoWidth": false,
	        responsive: true
	    } );
    	// new $.fn.dataTable.FixedHeader(table1);
    	
    	//table 3
    	var table3 = $('#example3').DataTable( {
	    	"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	        "paging": false,
	      	"lengthChange": false,
	      	"autoWidth": false,
	      	"bInfo": false,
	      	 "bSort": false,//nuevo, add 20/10/18
	        responsive: true
	    } );
    	// new $.fn.dataTable.FixedHeader(table3);

    	//table 4
    	var table4 = $('#ticketDetail').DataTable( {
	    	"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	        "order": [[ 1, "desc" ]],
	        "bPaginate": false,
	        "bLengthChange": false,
	        "bFilter": false,
	        "bSort": true,
	        "bInfo": false,
	        "bAutoWidth": false,
	        "paging": false,
	        "lengthChange": false,
	        "autoWidth": false,
	        "bInfo": false,
	        responsive: true
	    } );
    	// new $.fn.dataTable.FixedHeader(table4);

    	//table 5
    	var table5 = $('#tableSolution').DataTable( {
	    	"language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
	        },
	        "paging": true,
	      	"lengthChange": true,
	      	"searching": false,
	      	"ordering": true,
	      	"info": false,
	      	"autoWidth": false,
	        responsive: true
	    } );
    	// new $.fn.dataTable.FixedHeader(table5);
	});

  	$(function () {
	    //Initialize Select2 Elements
	    $(".select2").select2();

	    // chosen select
	    $('.chosen-select').chosen({allow_single_deselect:true}); 
	    //resize the chosen on window resize

	    //Date picker
	    $('#datepicker').datepicker({
	      format: 'yyyy-mm-dd',
	      autoclose: true
	    });


	    
	});
</script>
</body>
</html>
<script>
    function ticket_update(value,campo){
        $.ajax({
            type: "POST",
            url: "../ajax/upd_ticket_ajax.php",
            data: "value="+value+"&campo="+campo+"&id="+431,
                success: function(datos){
                    $("#resultados").html(datos);
                }
        });
    }
</script>  

<script>
    $(function() {
        load(1);
        //escondo el botton de tickets
        $("#btn_new_ticket").hide();
    });


    function load(page){ 
                $("input[name=area]").change(function () {
                    $("#btn_next").removeAttr("disabled");

                    txt=$('input:radio[name=area]:checked').val();
                    $("#checked").val(txt);
                });

                var area=$("#checked").val();
                var query=$("#q").val();
                var parametros = {"action":"ajax","page":page,'query':query,'area':area};
            $("#loader").fadeIn('slow');
            $.ajax({
                url:'../ajax/categorias_ajax.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader").html("<img src='images/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");


                    $("input[name=categoria]").change(function () {   
                        $("#btn_next").removeAttr("disabled");
                    });


                   //compruebo que selecciono un radio button de la fase categoria para dejarlo ir al siguiente paso 
                    $("#btn_next").click(function() {  
                        if($("input[name=categoria]").is(':checked')) {  
                            $("#btn_next").removeAttr("disabled"); 
                        }else{  
                            $("#btn_next").attr("disabled","disabled"); 
                        }  
                        $("input[name=categoria]").change(function () { 
                            if($("input[name=categoria]").is(':checked')) {  
                                $("#btn_next").removeAttr("disabled"); 
                            }else{  
                                $("#btn_next").attr("disabled","disabled"); 
                            }  
                        }); 

                        //compruebo que lleno los campos asunto y descripcionpara dejarlo ir al siguiente paso 
                        $("#btn_next").click(function() { 

                            if($("#asunt").text()==""){
                                $("#btn_next").attr("disabled","disabled"); 
                            }
                            if($("#descripcion").val()==""){
                                $("#btn_next").attr("disabled","disabled");
                            }


                            $("#asunt").blur(function() {  
                                if($("#asunt").val()==""){
                                    $("#btn_next").attr("disabled","disabled"); 
                                }
                            });
                            $("#descripcion").blur(function() {  
                                if($("#descripcion").val()==""){
                                    $("#btn_next").attr("disabled","disabled"); 
                                }
                            });

                            setInterval(function(){
                                if($("#descripcion").val()!="" && $("#asunt").val()!=""){
                                    $("#btn_next").removeAttr("disabled"); 
                                }
                            }, 100);

                            //le cambio el nombre del boton siguiente:
                             // $("#btn_next").html('Finalizar el Ticket');
                        });    
                    });  
                }
            }); //fin ajax
        // }, 1000);
    }

    function per_page(valor){
        $("#per_page").val(valor);
        load(1);
        $('.dropdown-menu li' ).removeClass( "active" );
        $("#"+valor).addClass( "active" );
    }
</script>

<script>
    function finalizar(id){
        var page=1;
        var query=$("#q").val();
        var per_page=$("#per_page").val();
        var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};
        
        $.ajax({
            url:'../ajax/finish_ticket.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loader2").html("<img src='images/ajax-loader.gif'>");
          },
            success:function(data){
                $(".outer_div2").html(data).fadeIn('slow');
                $("#loader2").html("");
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});}, 5000);
                //llamada a la funcion verNumeroTicket
                verNumeroTicket(id);
            }
        })
    }

    function verNumeroTicket(id){
        var page=1;
        var query=$("#q").val();
        var per_page=$("#per_page").val();
        var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};

        $.ajax({
            url:'../ajax/show_number_ticket.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loader2").html("<img src='images/ajax-loader.gif'>");
          },
            success:function(data){
                $(".number_ticket_class").html(data).fadeIn('slow');
                $("#loader2").html("");
            }
        })
        
    }
</script>

<script src="../easyWizard.js"></script> 
<script>
    $(document).on("ready", function(){
        $("#wiz").wizard({
            onfinish:function(){
                finalizar(431);
                $("#btn_back").hide();
                $("#btn_finish").hide();

                $("#4").removeClass('doing');
                $("#4").addClass('done');

                //muestro el botton de finish
                $("#btn_new_ticket").show();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#imagefile').change(function(){3
            $('#update_register').submit();
        });
        $('#update_register').on('submit', function(e){
            e.preventDefault();
            var id = $("#id").val();
            $.ajax({
                url : "../ajax/file_ticket.php?id="+id,
                method : "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function(data){
                    //$('#imagefile').val('');
                    $('#load_img').html(data); 
                    showFiles(id);
                }
            })
        });
    });
</script>

<!-- eliminar archivo cargado -->
<script>
    function del_file(id){
        if(confirm('Esta acción  eliminará el archivo subido \n\n Desea continuar?')){
            var page=1;
            var query=$("#q").val();
            var ticket_id=$("#id").val();
            var per_page=$("#per_page").val();
            var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};
            
            $.ajax({
                url:'../ajax/del_file.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader2").html("<img src='images/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div2").html(data).fadeIn('slow');
                    $("#loader2").html("");
                    window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();});}, 5000);

                    showFiles(ticket_id);//llamada a la funcion de mostrar archivos
                }
            })
        }    
    }
</script>
<script>
    function showFiles(id){
        var page=1;
        var query=$("#q").val();
        var per_page=$("#per_page").val();
        var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};

        $.ajax({
            url:'../ajax/show_files.php',
            data: parametros,
            beforeSend: function(objeto){
            // $("#loader2").html("<img src='images/ajax-loader.gif'>");
          },
            success:function(data){
                $('#load_img').html(data); 
            }
        })
        
    }
</script>
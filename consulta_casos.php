<?php
    $title ="Tickets | ";
    include "head.php";
    include "sidebar.php";
?>

    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    ini_set('display_errors',1);
                        //include("modal/new_ticket.php");
                        include("modal/consulta_ticket_detalle.php");                        
                    ?>

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Consulta solicitud de soporte</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        
                        <!-- form search -->
                        <form class="form-horizontal" role="form" id="Consulta solicitud de soporte">
                            <div class="form-group row">
                                <label for="q" class="col-md-2 control-label">ID Soporte</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="q" placeholder="Buscar caso" onkeyup='load(1);'>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-default" onclick='load(1);'>
                                        <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                                    <span id="loader"></span>
                                    <!--<span id="loader2"></span>-->
                                </div>
                            </div>
                        </form>     
                        <!-- end form seach -->


                        <div class="x_content">
                            <div class="table-responsive">
                                <!-- ajax -->
                                    <div id="resultados"></div><!-- Carga los datos ajax -->
                                    <div class='outer_div'></div><!-- Carga los datos ajax -->
                                    <!--<div class='outer_div2'></div>-->
                                <!-- /ajax -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
<script type="text/javascript" src="js/ticket_detalle.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
$("#add").submit(function(event) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/addticket.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})


$( "#upd" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/updticket.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result2").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

$( "#img" ).submit(function( event ) {
  $('#upd_data2').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upload-multimedia.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result3").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result3").html(datos);
            $('#upd_data2').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

    function obtener_datos(id){
        var description = $("#description"+id).val();
        var title = $("#title"+id).val();
        var kind_id = $("#kind_id"+id).val();
        var project_id = $("#project_id"+id).val();
        var category_id = $("#category_id"+id).val();
        var priority_id = $("#priority_id"+id).val();
        var status_id = $("#status_id"+id).val();
        var asigned_id =$("#asigned_id"+id).val();
        var profile_pic =$("#profile_pic"+id).val();
        var cliente_id =$("#cliente_id"+id).val();
            $("#mod_id").val(id);
            $("mod_id_ticket").val(id);
            $("#mod_title").val(title);
            $("#mod_description").val(description);
            $("#mod_kind_id").val(kind_id);
            $("#mod_project_id").val(project_id);
            $("#mod_category_id").val(category_id);
            $("#mod_priority_id").val(priority_id);
            $("#mod_status_id").val(status_id);
            $("#mod_asigned_id").val(asigned_id);
            $("#mod_profile_pic").val(profile_pic);
            $("#mod_cliente_id").val(cliente_id);
        }
</script>

<script type="text/javascript">
  var ventana;
  var cont = 0;

  function mostrarVentanaImagen (rutaFoto, tituloVentana, centrar, botonCerrar)
  {
    //cerraremos la ventana emergente si aún está abierta
    if (cont == 1) 
    {
      ventana.close();
      ventana = null;
    }
    ventana = window.open('', 'ventana_imagen', 'resizable = yes, scrollbars = no');
    ventana.document.write('<html><head><title>' + tituloVentana + 
      '</title></head><body style="overflow:hidden" marginwidth="0" ' +
      'marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" ' +
      'rightmargin="0" scroll="no" onUnload="opener.cont=0"><img src="' + 
      rutaFoto + '" onLoad="opener.redimensionar(this.width, this.height, centrar)">');

    if (botonCerrar == true)
    {
      ventana.document.write('<FORM><INPUT type="button" value="Cerrar ventana" ' +
          'onClick="window.close()"></FORM>');
    }
    
    ventana.document.close();
    cont++;
  }

  function redimensionar (ancho, alto, centrar)
  {
    ventana.resizeTo (ancho + 12, alto + 28);
    if (centrar == true)
    {
      ventana.moveTo((screen.width - ancho) / 2, (screen.height - alto) / 2);
    }  
  }
</script>

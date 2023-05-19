<?php 
    $title ="Atenciones - "; 
    include "head.php";
    include "sidebar.php";

    //mysqli_query($con, "SET NAMES 'utf8'");
    $TicketData=mysqli_query($con, "select * from ticket where status_id=1");
    $TicketData2=mysqli_query($con, "select * from ticket where status_id=5");
    //$ProjectData=mysqli_query($con, "select * from project");
    $CategoryData=mysqli_query($con, "select * from category");
    $TicketAtendido=mysqli_query($con, "select * from ticket where status_id=7");
    //$UserData=mysqli_query($con, "select * from user order by created_at desc");
?>

     
    <div class="right_col" role="main"> <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="row top_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-ticket"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketData) ?></div>
                          <h3>Tickets Pendientes</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-archive"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketData2) ?></div>
                          <h3>Tickets Cerrados</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-th-list"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($CategoryData) ?></div>
                          <h3>Categorias</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-slideshare"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketAtendido) ?></div>
                          <h3>Tickets Atendidos</h3>
                        </div>
                    </div>
                </div>
            </div>

                <!-- content -->
                <br><br>
                <div class="row">  <!-- page content -->
                <div class="">
                    <div class="page-title">
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php
                                //include("modal/new_atencion.php");
                                include("modal/upd_atencion.php");
                                //include("action/upload-multimedia.php");
                            ?>
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Atender solicitud de soporte</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                <div class="clearfix"></div>
                                </div>
                                
                                <!-- form search -->
                                <form class="form-horizontal" role="form" id="Atender solicitud de soporte">
                                    <div class="form-group row">
                                        <label for="q" class="col-md-2 control-label">ID Soporte</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="q" placeholder="Buscar caso" onkeyup='load(1);'>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-default" onclick='load(1);'>
                                                <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                                            <span id="loader"></span>
                                        </div>
                                    </div>
                                </form>     
                                <!-- end form seach -->

                                <div class="x_content">
                                    <div class="table-responsive">
                                        <!-- ajax -->
                                            <div id="resultados"></div><!-- Carga los datos ajax -->
                                            <div class='outer_div'></div><!-- Carga los datos ajax -->
                                        <!-- /ajax -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /page content -->
        </div>
    </div>

<?php include "footer.php" ?>

<script type="text/javascript" src="js/atencion.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
 $("#add").submit(function(event) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/add_atencion.php",
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
            url: "action/updatencion.php",
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

$(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "action/upload-multimedia.php";
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

    function obtener_datos(id){
        //var id = $("#mod_id"+id).val();
        var detalle_atencion = $("#detalle_atencion"+id).val();
        var title = $("#title"+id).val();
        var kind_id = $("#kind_id"+id).val();
        var project_id = $("#project_id"+id).val();
        var category_id = $("#category_id"+id).val();
        var priority_id = $("#priority_id"+id).val();
        var status_id = $("#status_id"+id).val();
        var asigned_id =$("#asigned_id"+id).val();
        var profile_pic =$("#profile_pic"+id).val();
            $("#mod_id").val(id);
            $("#mod_title").val(title);
            $("#mod_detalle_atencion").val(detalle_atencion);
            $("#mod_kind_id").val(kind_id);
            $("#mod_project_id").val(project_id);
            $("#mod_category_id").val(category_id);
            $("#mod_priority_id").val(priority_id);
            $("#mod_status_id").val(status_id);
            $("#mod_asigned_id").val(asigned_id);
            $("#mod_profile_pic").val(profile_pic);
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
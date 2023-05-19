<?php
    $title ="Asesor | ";
    include "head.php";
    include "sidebar.php";
?>  
    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                        include("modal/new_asesor.php");
                        include("modal/upd_asesor.php");
                    ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Asesores</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li> -->
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <!-- form search -->
                        <form class="form-horizontal" role="form" id="datos_cotizacion">
                            <div class="form-group row">
                                <label for="q" class="col-md-4 control-label">Buscar:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="q" placeholder="Nombre o Cargo del Empleado" onkeyup='load(1);'>
                                </div>
                                <div class="col-md-3">
                                    <!--<button type="button" class="btn btn-default" onclick='load(1);'>
                                        <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                                    <span id="loader"></span> -->
                                </div>
                            </div>
                        </form>   
                        <!-- end form search -->

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

<?php include "footer.php" ?>

<script type="text/javascript" src="js/asesores.js"></script>

<script>
$( "#add_asesor" ).submit(function( event ) {
    $('#save_data').attr("disabled", true);
  
    var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/add_asesor.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result_asesor").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result_asesor").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

// success

$( "#upd_asesor" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upd_asesor.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result_asesor2").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result_asesor2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

    function obtener_datos(id){
            var username = $("#username"+id).val();
            var name = $("#name"+id).val();
            var telefono = $("#telefono"+id).val();
            var email = $("#email"+id).val();
            var status = $("#status"+id).val();
            //Las variables de arriba corresponden a los datos guardados en new_asesor.php y las de abajo son de upd_asesor.php
            $("#mod_id").val(id);
            $("#mod_username").val(username);
            $("#mod_name").val(name);
            $("#mod_telefono").val(telefono);
            $("#mod_email").val(email);
            $("#mod_status").val(status);
        }
</script>
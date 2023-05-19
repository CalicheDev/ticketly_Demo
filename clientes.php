<?php
    $title ="Clientes | ";
    include "head.php";
    include "sidebar.php";
?>  
    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                        include("modal/new_cliente.php");
                        include("modal/upd_cliente.php");
                    ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Clientes</h2>
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
                                    <input type="text" class="form-control" id="q" placeholder="Nombre o Nit de la Empresa" onkeyup='load(1);'>
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

<script type="text/javascript" src="js/clientes.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
$( "#add_cliente" ).submit(function( event ) {
    $('#save_data').attr("disabled", true);
  
    var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/add_cliente.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result_cliente").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result_cliente").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

// success

$( "#upd_cliente" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upd_cliente.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result_cliente2").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result_cliente2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

    function obtener_datos(id){
            var nit = $("#Nit"+id).val();
            var name_Empresa = $("#name_Empresa"+id).val();
            var name_Representante = $("#name_Representante"+id).val();
            var telefono = $("#telefono"+id).val();
            var email = $("#email"+id).val();            
            var email = $("#email"+id).val();
            var asigned_id =$("#asigned_id"+id).val();
            var Observaciones = $("#Observaciones"+id).val();
            var status_cliente = $("#status_cliente"+id).val();        
                        
            //Las variables de arriba corresponden a los datos guardados en new_cliente.php y las de abajo son de upd_cliente.php    
            $("#mod_id_cliente").val(id);            
            $("#mod_Nit").val(nit);
            $("#mod_name_Empresa").val(name_Empresa);
            $("#mod_name_Representante").val(name_Representante);
            $("#mod_telefono").val(telefono);
            $("#mod_email").val(email);            
            $("#mod_asigned_id").val(asigned_id);
            $("#mod_Observaciones").val(Observaciones);
            $("#mod_status_cliente").val(status_cliente);

            //var Fecha_Ini_Contrato = $("#Fecha_Ini_Contrato"+id).val();
            //var Fecha_Fin_Contrato = $("#Fecha_Fin_Contrato"+id).val();
            //var Fecha_Ini_Servicio = $("#Fecha_Ini_Servicio"+id).val();
            //var Fecha_Fin_Servicio = $("#Fecha_Fin_Servicio"+id).val();
            //$("#mod_Fecha_Ini_Contrato").val(Fecha_Ini_Contrato);
            //$("#mod_Fecha_Fin_Contrato").val(Fecha_Fin_Contrato);
            //$("#mod_Fecha_Ini_Servicio").val(Fecha_Ini_Servicio);
            //$("#mod_Fecha_Fin_Servicio").val(Fecha_Fin_Servicio);            
        }
</script>
<?php
    $title ="Roles | ";
    include "head.php";
    include "sidebar.php";
?>  
    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                        include("modal/new_rol.php");
                        include("modal/upd_rol.php");
                        include("modal/upd_permisos.php");
                    ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Roles de usuario</h2>
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
                                    <input type="text" class="form-control" id="q" placeholder="Nombre o E-mail" onkeyup='load(1);'>
                                </div>
                                <div class="col-md-3">
                                   <!--  <button type="button" class="btn btn-default" onclick='load(1);'>
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

<script type="text/javascript" src="js/roles.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>

<script>
$( "#add_rol" ).submit(function( event ) {
    $('#save_data').attr("disabled", true);
  
    var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/add_rol.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result_rol").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result_rol").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

// success

$( "#upd_rol" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upd_rol.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result_rol2").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result_rol2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

    function obtener_datos(id){
            var name = $("#nombre_rol"+id).val();
            var description = $("#descripcion_rol"+id).val();
            var status = $("#status_rol"+id).val();            
            $("#mod_id_rol").val(id);
            $("#mod_nombre_rol").val(name);
            $("#mod_descripcion_rol").val(description);
            $("#mod_status_rol").val(status);            
        }

    function obtener_permisos(id_rol){
    var idrol = id_rol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = 'ajax/Permisos/getPermisosRol/'+idrol;
    request.open("GET",ajaxUrl,true);
    request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#contentAjax').innerHTML = request.responseText;
                $('.modalPermisos').modal('show');
                document.querySelector('#upd_permisos').addEventListener('submit',fntSavePermisos,false);
            }
        }
    }
</script>
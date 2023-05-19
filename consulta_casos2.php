<?php
    $title ="Reportes | ";
    include "head.php";
    include "sidebar.php";
        
    $tickets = mysqli_query($con, "select * from ticket");
    $projects = mysqli_query($con, "select * from project");
    $priorities = mysqli_query($con,  "select * from priority");
    $statuses = mysqli_query($con, "select * from status");
    $kinds = mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $profile_pic = mysqli_query($con, "select * from ticket");
    $categories =mysqli_query($con, "select * from category");
    $client = mysqli_query($con, "select * from clientes");
?>  
<!-- Codigo ingresado por Carlos Bejarano-->
    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
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
                                </div>
                                <a href="#" class='btn btn-default' title='Consultar Ticket' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal-body" data-target=".wizard-content"><i class="glyphicon glyphicon-edit"></i></a> 
                            </div>
                        </form>     
                        <!-- end form seach -->
<!-- Modal -->

<div class="row">
    <div id="result2" class="col-md-12"></div>
       <div class="col-md-12" id="wiz">
            <div class="wizard-content">
                
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="action/upd_profile.php" method="post">
                        <div id="result2"></div>
                        <input type="hidden" name="mod_id" id="mod_id">
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                        <select class="form-control" name="kind_id" required id="mod_kind_id" style="pointer-events: none;" readonly>
                                           <option selected="" value="">-- Selecciona --</option> 
                                            <?php foreach($kinds as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['kind_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Cliente
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                    <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                        <select class="form-control" name="cliente_id"  id="mod_cliente_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                                  <?php foreach($client as $p):?>
                                                    <option value="<?php echo $p['id_cliente']; ?>"><?php echo $p['name_Empresa']; ?></option>
                                                  <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Asesor
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="asigned_id" required id="mod_asigned_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Cambiar Asesor --</option>
                                          <?php foreach($asesores as $p):?>
                                            <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="text" name="title" class="form-control" placeholder="Titulo" id="mod_title" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <textarea name="description" id="mod_description" class="form-control col-md-7 col-xs-12" required readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proyecto
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="project_id" required id="mod_project_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                              <?php foreach($projects as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['proyect_name']; ?></option>
                                              <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Categoria
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="category_id" required id="mod_category_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                              <?php foreach($categories as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['category_name']; ?></option>
                                              <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Prioridad
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">                                
                                    <!--<input type="text" class="form-control"  value="<?php echo $p['id']; ?>" readonly><?php echo $p['priority_name']; ?>-->
                                    <select class="form-control" name="priority_id" required id="mod_priority_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="" >-- Selecciona --</option>
                                          <?php foreach($priorities as $p):?>
                                            <option value="<?php echo $p['id']; ?>" ><?php echo $p['priority_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select  class="form-control" name="status_id" required id="mod_status_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                          <?php foreach($statuses as $p):?>
                                            <option value="<?php echo $p['id']; ?>"><?php echo $p['status_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">   
                                    <label for="archivo" class="control-label col-md-3 col-sm-3 col-xs-12">Ajunto </label>                                                      
                                     <div class="col-md-9 col-sm-9 col-xs-12">           
                                            <!--EN ESTA SECCION SE DEBEN CARGAR LAS IMAGENES DE LOS TICKETS -->                                     
                                            <input type="file" class="form-control" name="archivo" id="archivo" readonly>                                            
                                    </div>                                                                                                                            
                                </div>                             
                        </form>
                    </div>
                </div>
            </div>       
    </div>
  </div>
</div>
</div>
</div>
</div>
                       

<?php include "footer.php" ?>

<script type="text/javascript" src="js/ticket.js"></script>
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
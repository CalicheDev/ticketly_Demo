<?php
    $title ="Detalle | ";
    include "head.php";
    include "sidebar.php";
?>

<?php

include './lib/class_mysql.php';
    
  global $sql_aten;
  global $reg2;
       
  $id = MysqlQuery::RequestGet('id');
  $sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
  $sql_aten = Mysql::consulta("SELECT * FROM atencion WHERE id_ticket= '$id'");
  $sql_files = Mysql::consulta("SELECT * FROM files_ticket WHERE id_ticket= '$id'");
  $reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);
  $reg2=mysqli_fetch_array($sql_aten, MYSQLI_ASSOC);
  $reg3=mysqli_fetch_array($sql_files, MYSQLI_ASSOC);
  $status_id=$reg['status_id'];
  $cliente_id=$reg['cliente_id']; 
  $profile_pic=$reg['profile_pic']; 
  //$title=$reg['title'];
        $sql2 = mysqli_query($con, "select * from status where id=$status_id");
            if($c=mysqli_fetch_array($sql2)) {
            $name_statu=$c['status_name'];
        }

        $sql2 = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
            if($c=mysqli_fetch_array($sql2)) {
            $name_cliente=$c['name_Empresa'];
        }  
        $sql2 = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
            if($c=mysqli_fetch_array($sql2)) {
            $email_cliente=$c['email'];
        }

                                            
?>
<?php  include("modal/upd_atencion_3.php"); ?>
        <!--************************************ Page content******************************-->
            
          <!-- <div class="container"> -->
        <div class="right_col" role="main">
          <div class="page-title">  
           <div class="col-md-12 col-sm-12 col-xs-12">
            <?php  include("modal/modal_files_ticket.php");?>
            <div class="x_panel">
                <div class="x_title">
                            <div class="container">
                                
                                 <div class="col-sm-3"></div>
                                    <div class="col-sm-12">
                                        <a href="Tickets_Asignados.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver a Tickets Asignados</a>
                                    </div>
                                
                            </div>
                </div>
                <form class="form-horizontal" role="form" action="" method="POST">
                    <input type="hidden" name="id_edit" value="<?php echo $reg['id']?>">
                        <div class="form-group"> 
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Ticket</label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="serie_ticket" readonly="" value="<?php echo $reg['id']?>">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                </div>
                            </div>

                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Estado</label>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="status_id" value="<?php echo $name_statu?>">
                                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                </div>
                            </div>

                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Fecha</label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="fecha_ticket" value="<?php echo $reg['created_at']?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Asunto</label>
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="title" value="<?php echo $reg['title']?>">
                                    <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                                </div>
                            </div>

                            <label class="control-label col-md-1 col-sm-3 col-xs-12" ><!-- Descargar Adjuntos: --></label>
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                <!-- <a href="" class="btn btn-success">Archivos</a> -->
                              <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal_files_ticket" style="color: #87CEEB"><i class="fa fa-paperclip" ></i> Ver Documentos</a>
                              <!--<a class="btn btn-default" title="Download" download href="images/multimedia/<?php echo $profile_pic; ?>" style="color: #87CEEB"><i class="fa fa-paperclip"></i> Descargar archivo</a>  -->                         
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Cliente</label>
                            <div class="col-md-5 col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="cliente_id" value="<?php echo $name_cliente?>">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-9 col-xs-12">
                                <div class="input-group">
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo $email_cliente?>">                              
                                  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" readonly="">Descripción </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea class="form-control" readonly="" rows="3"  name="Descripción_ticket" readonly=""><?php echo $reg['description']?></textarea>
                            </div>
                            <a href="#" class='btn btn-info btn-sm pull-right' title='Agregar Atención' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target=".bs-example-modal-lg-udp"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>                                                                

                        <!--Còdigo que muestra en una tabla responsive las atenciones realizadas al ticket-->
                        <div class="form-group">
                        <!--<div class="right_col" role="main"><!-- page content -->
                              <div class="well well-sm">
                                  <a>DETALLE DE ATENCIONES</a>
                              </div>                        
                            <div class="table-responsive">
                                <?php
                                //$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                //mysqli_set_charset($mysqli, "utf8");
                                mysqli_set_charset($con, "utf8");
                                  //$id = MysqlQuery::RequestGet('id');
                                  //$sql = Mysql::consulta("SELECT * FROM atencion WHERE id_ticket= '$id'");
                                  //$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);                                

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 10;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;
                                
                                
                                if(isset($_GET['atencion'])){
                                    if($_GET['atencion']=="all"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM atencion LIMIT $inicio, $regpagina";
                                    }elseif($_GET['atencion']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM atencion WHERE id_ticket= '$reg2' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['atencion']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM atencion WHERE status_id='2' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['atencion']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM atencion WHERE status_id='5' LIMIT $inicio, $regpagina";
                                    }else{
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM atencion LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    $consulta="SELECT * FROM atencion WHERE id_ticket= '$id' order by fecha_atencion desc";
                                }


                                $selticket=mysqli_query($con,$consulta);

                                $totalregistros = mysqli_query($con,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Soluciòn</th>
                                        <th class="text-center">Fecha Atenciòn</th>
                                        <th class="text-center">Asesor</th>                                        
                                        <th class="column-title">Estado</th>                                        
                                        <th class="column-title"><!--Acciones --></th>
                                        <th class="column-title no-link last"><span class="nobr"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //$ct=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)):
                                            $ct=$row['id_ticket'];
                                            $created_at=date('d/m/Y', strtotime($row['fecha_atencion']));
                                            $description=$row['description'];
                                            $asigned_id=$row['asigned_id'];
                                            $status_id=$row['status_id'];                                            
                                            $project_id=$row['project_id'];
                                            $priority_id=$row['priority_id']; 
                                            $category_id=$row['category_id'];                                            
                                            $multimedia=$row['id_multimedia'];

                                            $sql = mysqli_query($con, "select * from priority where id=$priority_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_priority=$c['priority_name'];
                                            }

                                            $sql = mysqli_query($con, "select * from status where id=$status_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_status=$c['status_name'];
                                            }

                                            $sql = mysqli_query($con, "select * from asesor where id=$asigned_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_asigned=$c['name'];
                                            }

                                            $sql = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_cliente=$c['name_Empresa'];
                                            } 
                                    ?>
                                    <input type="hidden" value="<?php echo $id;?>" id="id<?php echo $id;?>">                                  
                                    <input type="hidden" value="<?php echo $description;?>" id="description<?php echo $id;?>">

                                    <!-- me obtiene los datos -->
                                    <input type="hidden" value="<?php echo $kind_id;?>" id="kind_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $cliente_id;?>" id="cliente_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $project_id;?>" id="project_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $category_id;?>" id="category_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $priority_id;?>" id="priority_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $status_id;?>" id="status_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $asigned_id;?>" id="asigned_id<?php echo $id;?>">
                                    <!--<input type="hidden" value="<?php echo $profile_pic;?>" id="profile_pic?php echo $id;?>">-->
                                    <tr class="even pointer">
                                        <!--<td class="text-center"><?php echo $ct; ?></td> -->
                                        <td class="text-left"><?php echo $description;?></td>
                                        <td class="text-center"><?php echo $created_at;?></td>
                                        <td class="text-center"><?php echo $name_asigned; ?></td>                                        
                                        <!--<td class="text-center"><span class="label label-info"><?php //echo $name_status;?></span></td>-->
                                        <?php if ($name_status == 'Registrado')
                                            { ?>
                                            <td class="text-center"><span class="label label-warning"><?php echo $name_status;?>
                                            </span></td>
                                            <?php
                                              } elseif ($name_status == 'Asignado') 
                                            { ?>
                                            <td class="text-center"><span class="label label-info"><?php echo $name_status;?>
                                            </span></td>
                                            <?php
                                              } elseif ($name_status == 'En Proceso')
                                            { ?>
                                            <td class="text-center"><span class="label label-primary"><?php echo $name_status;?>
                                            </span></td>
                                            <?php
                                              } elseif ($name_status == 'Finalizado')
                                            { ?>
                                            <td class="text-center"><span class="label label-success"><?php echo $name_status;?>
                                            </span></td>  
                                            <?php
                                              } //end if
                                            ?>                                        

                                        <td class="text-center">
                                            <a href="./lib/pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success" title="Download" download href="images/soporte_multimedia/<?php echo $multimedia; ?>"><i class="fa fa-paperclip"></i> <!--Descargar archivo --></a>


                                            <!--<a href="ticketedit-view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                            <form action="" method="POST" style="display: inline-block;">
                                                <input type="hidden" name="id_del" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form> -->
                                        </td>
                                    </tr>
                                    <?php
                                        $ct++;
                                        endwhile; 
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2 class="text-center">No hay atenciones registradas en el sistema para este ticket </h2>
                            <?php endif; ?>
                            </div> <!-- End table Responsive -->
                        <!--</div> End x_content -->
                      <!--</div><!--End x_panel -->
                    </div>
                    
                        <!--Còdigo que muestra en una tabla responsive las atenciones realizadas al ticket-->   
                        
                        <!--<div class="form-group">
                            <div class="col-sm-offset-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option1" checked>
                                        No enviar solución al email del usuario
                                    </label>
                                 </div>


                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option2">
                                         Enviar solución al email del usuario
                                    </label>
                                 </div>
                            </div>
                        </div>-->
                    
                                         
                        <div class="form-group">
                        
                          <div class="col-sm-offset-2 col-sm-10 text-center">                              
                            <a href="#" class='btn btn-info' title='Agregar Atención' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target=".bs-example-modal-lg-udp">Agregar Atención</a>
                          </div>
                        </div>

                      </form>
            </div><!--End x_panel -->
          </div> 
         </div><!--End page title -->
        </div><!--container-->

<?php include "footer.php" ?>
<script type="text/javascript" src="js/ticket_registrado.js"></script>
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
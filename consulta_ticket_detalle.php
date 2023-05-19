<?php
    $title ="Atenciones | ";
    include "head.php";
    include "sidebar.php";
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
    $client = mysqli_query($con, "select * from clientes");
    //$tickets = mysqli_query($con, "SELECT * from ticket");
    //$tickets = mysqli_query($con, "SELECT * from ticket");
    //$profile_pic = mysqli_query($con, "select profile_pic from ticket");
?>

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Detalle de la Solicitud</h4>
                </div>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">

                            <li><a href="#tab_1" data-toggle="tab">Detalle</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Atenciones</a></li>
                    </ul>
                <!-- <div class="modal-body">-->
                <div class="tab-content">
                        <div class="tab-pane tab: active" id="tab_1"> 
                            <!-- <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd" enctype="multipart/form-data">-->
                                <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data">
                                <!--<div id="result2"></div>-->
                                <div class="box-body">
                                <input type="hidden" name="mod_id" id="mod_id">


                                <div class="row">
                                    <div class="col-sm-8">
                                          <div class="well well-sm">
                                            <h2>Titulo</h2>
                                            <p><input type="text" name="title" class="form-control" id="mod_title" readonly></p>
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                          <div class="well well-sm">
                                            <h4>Prioridad</h4>
                                            <p><select class="form-control" name="priority_id" required id="mod_priority_id" style="pointer-events: none;" readonly>
                                                <option selected="" value="" >-- Selecciona --</option>
                                              <?php foreach($priorities as $p):?>
                                                <option value="<?php echo $p['id']; ?>" ><?php echo $p['priority_name']; ?></option>
                                              <?php endforeach; ?>
                                            </select></p> 
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                      <div class="well well-sm">
                                        <h4>Tipo</h4>
                                        <p><select class="form-control" name="kind_id" required id="mod_kind_id" style="pointer-events: none;" readonly>
                                                  <?php foreach($kinds as $p):?>
                                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['kind_name']; ?></option>
                                                  <?php endforeach; ?>
                                            </select></p> 
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="well well-sm">
                                        <h4>Cliente</h4>
                                        <p><select class="form-control" name="cliente_id"  id="mod_cliente_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                              <?php foreach($client as $p):?>
                                                <option value="<?php echo $p['id_cliente']; ?>"><?php echo $p['name_Empresa']; ?></option>
                                              <?php endforeach; ?>
                                        </select></p> 
                                      </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <div class="well well-sm">
                                        <h4>Asesor</h4>
                                        <p> <select class="form-control" name="asigned_id" required id="mod_asigned_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Cambiar Asesor --</option>
                                          <?php foreach($asesores as $p):?>
                                            <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                          <?php endforeach; ?>
                                        </select> </p> 
                                      </div>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                      <div class="well well-sm">
                                        <h4>Proyecto</h4>
                                        <p><select class="form-control" name="project_id" required id="mod_project_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                              <?php foreach($projects as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['proyect_name']; ?></option>
                                              <?php endforeach; ?>
                                        </select></p> 
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="well well-sm">
                                        <h4>Categoria</h4>
                                        <p><select class="form-control" name="category_id" required id="mod_category_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                              <?php foreach($categories as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['category_name']; ?></option>
                                              <?php endforeach; ?>
                                        </select></p> 
                                      </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <div class="well well-sm">
                                        <h4>Estado</h4>
                                        <p><select  class="form-control" name="status_id" required id="mod_status_id" style="pointer-events: none;" readonly>
                                            <option selected="" value="">-- Selecciona --</option>
                                          <?php foreach($statuses as $p):?>
                                            <option value="<?php echo $p['id']; ?>"><?php echo $p['status_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select></p> 
                                      </div>
                                    </div>                                                                        
                                </div>
                                <div class="row">                                    
                                    <!--<div class="col-sm-3">
                                          <div class="well well-sm">                                                                                                                             
                                            
                                            <h4>Archivo Ajunto</h4> -->    
                                            <!--<input value="<?php echo $id; ?>"><?php echo $row['profile_pic']; ?></input>
                                            <p><img class="thumb-image" style="width: 100%; display: block;" src="images/multimedia/<?php echo $profile_pic; ?>" alt="image" /></p>
                                            <p><a title="Download" download href="images/multimedia/<?php echo $profile_pic; ?>" style="color: #87CEEB" ></a> </p>
                                            <!--<a href= "#" style="color: #87CEEB" onClick= "mostrarVentanaImagen('images/multimedia/<?php echo $profile_pic; ?>','Contenido Multimedia',false,true);return false" >Ver Imagen/Archivo</a>-->
                                            
                                         <!-- </div> -->    
                                    <!--</div>      -->                                                              
            
                                    <div class="col-sm-8">
                                          <div class="well well-sm">
                                            <h2>Descripción</h2>
                                            <p><textarea autofocus type="text" name="description" class="form-control" id="mod_description" readonly> </textarea ></p>
                                          </div>
                                    </div>                                                                         
                                </div>
                             </div>
                            </form>                
                        </div>

                            <div class="tab-pane" id="tab_2">
                                
                             <div class="row">
                                    <div class="col-md-12 table-responsive">
                                      <label for="q" class="col-md-2 control-label"></label>
                                    <!--<form class="form-horizontal" method="post" id="files_bitacora" name="files_bitacora">-->
                                    <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data">
                                        <!--<div id="result2"></div>-->
                                        <div class="box-body">
                                        <input type="hidden" name="mod_id" id="mod_id">
                                    <div class="modal-fade" id="modal_files_bitacora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-body">
                                        <div id="loader" class="text-center"></div>
                                        <div id="resultados"></div>
                                        <!--<div class="outer_div"></div>   -->
                                                                                            
                                        <table cellspacing="0" style="width: 98%; border: solid 1px black; background: #F7F7F7; font-size: 10pt;" class="table table-striped">
                                            <colgroup>
                                                <col style="width: 10%; text-align: left">
                                                <col style="width: 17%; text-align: left">
                                                <col style="width: 10%; text-align: left">
                                                <col style="width: 8%; text-align: left">
                                                <col style="width: 10%; text-align: right">
                                                <col style="width: 10%; text-align: right">
                                                <!--<col style="width: 24%; text-align: right">-->
                                            </colgroup>
                                            <thead>
                                                <tr style="background: #E7E7E7;">
                                                    <th style="border-bottom: solid 1px black;">Numero Ticket</th>
                                                    <th style="border-bottom: solid 1px black;">Detalle Atenciones</th>
                                                    <th style="border-bottom: solid 1px black;">Fecha Atención</th>
                                                    <th style="border-bottom: solid 1px black;">Prioridad</th>
                                                    <th style="border-bottom: solid 1px black;">Asesor</th>
                                                    <th style="border-bottom: solid 1px black;">Estado</th>
                                                    <!--<th style="border-bottom: solid 1px black;">FECHA</th>-->
                                                </tr>
                                            </thead> 

                                            <tbody>
                                    
                                    <?php   



                                        $users= array();
                                                                            if((isset($_GET["status_id"]) && isset($_GET["kind_id"]) && isset($_GET["project_id"]) && isset($_GET["priority_id"]) && isset($_GET["id_ticket"]) && isset($_GET["finish_at"]) ) && ($_GET["status_id"]!="" ||$_GET["kind_id"]!="" || $_GET["project_id"]!="" || $_GET["priority_id"]!="" || ($_GET["id_ticket"]!="" && $_GET["finish_at"]!="") ) ) {
                                                                            $sql = "select * from atencion where ";
                                                                            if($_GET["status_id"]!=""){
                                                                                $sql .= " status_id = ".$_GET["status_id"];
                                                                            }

                                                                            if($_GET["id_ticket"]!=""){
                                                                              $sql .= " id_ticket = ".$_GET["mod_id"];
                                                                                $sql .= " and ";
                                                                            }

                                                                            if($_GET["asigned_id"]!=""){
                                                                            if($_GET["status_id"]!=""){
                                                                                $sql .= " and ";
                                                                            }
                                                                                $sql .= " asigned_id = ".$_GET["asigned_id"];
                                                                            }


                                                                            if($_GET["project_id"]!=""){
                                                                            if($_GET["status_id"]!=""||$_GET["kind_id"]!=""){
                                                                                $sql .= " and ";
                                                                            }
                                                                                $sql .= " project_id = ".$_GET["project_id"];
                                                                            }

                                                                            if($_GET["priority_id"]!=""){
                                                                            if($_GET["status_id"]!=""||$_GET["project_id"]!=""||$_GET["kind_id"]!=""){
                                                                                $sql .= " and ";
                                                                            }

                                                                                $sql .= " priority_id = ".$_GET["priority_id"];
                                                                            }



                                                                            if($_GET["id_ticket"]!="" && $_GET["finish_at"]){
                                                                            if($_GET["status_id"]!=""||$_GET["project_id"]!="" ||$_GET["priority_id"]!="" ||$_GET["kind_id"]!="" ){
                                                                                $sql .= " and ";
                                                                            }

                                                                                $sql .= " ( date_at >= \"".$_GET["start_at"]."\" and date_at <= \"".$_GET["finish_at"]."\" ) ";
                                                                            }

                                                                                    $users = mysqli_query($con, $sql);

                                                                            }else{
                                                                                    $users = mysqli_query($con, "select * from atencion order by fecha_atencion desc");

                                                                            }
                                                                            if(@mysqli_num_rows($users)>0){
                                                                                // si hay reportes
                                                                                $_SESSION["report_data"] = $users;
                                                                            
                                                                            ?>

                                    <?php
                                             //end else
                                         //end if
                                    ?>


                                    <?php


                                                $total = 0;
                                                foreach($users as $user){
                                                    $ticket_id=$user['id_ticket'];
                                                    //$project_id=$user['project_id'];
                                                    $priority_id=$user['priority_id'];
                                                    $kind_id=$user['kind_id'];
                                                    $asignados = $user['asigned_id'];
                                                    $category_id=$user['category_id'];
                                                    $status_id=$user['status_id'];
                                                    $fech = $user['fecha_atencion'];
                                                                                                         


                                                    $ticket=mysqli_query($con, "select atencion.id_atencion, atencion.id_ticket, atencion.detalle_atencion
                                                                                  from atencion 
                                                                                  INNER JOIN ticket tick ON atencion.id_ticket=tick.id where atencion.id_ticket=id_ticket");
                                                    //$tickets = mysqli_query($con, "select * from ticket where id=id_ticket");
                                                    $status=mysqli_query($con, "select * from status where id=$status_id");
                                                    $category=mysqli_query($con, "select * from category where id=$category_id");
                                                    $kinds = mysqli_query($con,"select * from kind where id=$kind_id");
                                                    $asigned_asesor = mysqli_query($con,"select * from asesor where id=$asignados");
                                                    //$project  = mysqli_query($con, "select * from project where id=$project_id");
                                                    $medic = mysqli_query($con,"select * from priority where id=$priority_id");


                                                    
                                                    ?>
                                                    <tr>


                                                    <td ><?php echo $user['id_ticket'] ?></td>
                                                    <?php foreach($ticket as $tickets){?>
                                                    <?php } ?>
                                                    <td><?php echo $user['detalle_atencion'] ?></td>                                                    
                                                    
                                                    <td><?php echo $user['fecha_atencion']; ?></td>
                                                    
                                                    <?php foreach($medic as $medics){?>
                                                    <td><?php echo $medics['priority_name']; ?></td>
                                                    <?php } ?>
                                                    <?php foreach($asigned_asesor as $asignado){?>
                                                    <td><?php echo $asignado['name'] ?></td>
                                                    <?php } ?>
                                                    <?php foreach($status as $stat){?>
                                                    <td><?php echo $stat['status_name']; ?></td>
                                                    <?php } ?>                                                  
                                                    
                                                    </tr>
                                                 <?php  
                                                    
                                                    }

                                                  ?> 
                                                  <?php

                                                    }else{
                                                        echo "<p class='alert alert-danger'>No hay atenciones</p>";
                                                    }


                                                    ?>
                                                <tr style="background: #E7E7E7;">
                                                    <th colspan="5" style="border-top: solid 1px black; text-align: right;"></th>
                                                    <th style="border-top: solid 1px black;"></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>                                        
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

    </div> <!-- /Modal -->

<?php
    $title ="Tickets Registrados | ";
    include "head.php";
    include "sidebar.php";
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
    $client = mysqli_query($con, "select * from clientes");
    $atenciones=mysqli_query($con, "select * from atencion");
?>

<?php
include './lib/class_mysql.php';
  //Validacion para enviar por email los datos del caso al correo del cliente
  /*if(isset($_POST['id_edit']) && isset($_POST['solucion_ticket']) && isset($_POST['status_id']) && isset($_POST['cliente_id'])){
    $id_edit=MysqlQuery::RequestPost('id_edit');
    $estado_edit=  MysqlQuery::RequestPost('status_id');
    $solucion_edit=  MysqlQuery::RequestPost('solucion_ticket');
    $radio_email=  MysqlQuery::RequestPost('optionsRadios');

    $cabecera="From: LinuxStore El Salvador<linuxstore@hifenix.com>";
    $mensaje_mail="Estimado usuario la solución a su problema es la siguiente : ".$solucion_edit;
    $mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");

    if(MysqlQuery::Actualizar("ticket", "status_id='$estado_edit', solucion='$solucion_edit'", "id='$id_edit'")){

      echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">TICKET Actualizado</h4>
                    <p class="text-center">
                        El ticket fue actualizado con exito
                    </p>
                </div>
            ';
      if($radio_email=="option2"){
        mail($email_edit, $asunto_edit, $mensaje_mail, $cabecera);
      }

    }else{
      echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido actualizar el ticket
                    </p>
                </div>
            '; 
    }
  }    */ 

  //global $id;
  global $sql_aten;
  global $reg2;
       
  $id = MysqlQuery::RequestGet('id');
  $sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
  $sql_aten = Mysql::consulta("SELECT * FROM atencion WHERE id_ticket= '$id'");
  $reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);
  $reg2=mysqli_fetch_array($sql_aten, MYSQLI_ASSOC);
  $status_id=$reg['status_id'];
  $cliente_id=$reg['cliente_id'];  
  //$title=$reg['title'];

                                          $sql2 = mysqli_query($con, "select * from status where id=$status_id");
                                           if($c=mysqli_fetch_array($sql2)) {
                                            $name_status=$c['status_name'];
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


        <!--************************************ Page content******************************-->
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <img src="./img/Edit.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-9">
                <a href="Tickets_Registrados.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver a Tickets Registrados</a>
            </div>
          </div>
        </div>
            
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                    <input type="hidden" name="id_edit" value="<?php echo $reg['id']?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="fecha_ticket" value="<?php echo $reg['created_at']?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Soporte</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="serie_ticket" readonly="" value="<?php echo $reg['id']?>">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Asunto</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="title" value="<?php echo $reg['title']?>">
                                    <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" readonly="">Descripción </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea class="form-control" readonly="" rows="3"  name="Descripción_ticket" readonly=""><?php echo $reg['description']?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select  class="form-control" name="status_id" >
                                    <!-- <option selected="" value="">-- Selecciona --</option>-->
                                    <option value="<?php echo $name_status?>"><?php echo $name_status?> (Actual)</option>
                                  <?php foreach($statuses as $reg):?>
                                    <option value="<?php echo $reg['id']; ?>"><?php echo $reg['status_name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Cliente
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->                              
                                <select class="form-control" name="cliente_id"  readonly="">
                                    <option value="<?php echo $name_cliente?>"><?php echo $name_cliente?></option>
                                      <?php foreach($client as $reg):?>
                                        <option value="<?php echo $reg['id']; ?>"><?php echo $reg['name_Empresa']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Email Cliente </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo $email_cliente?>">                              
                                  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                </div>
                              </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Solución</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">                                
                                  <textarea class="form-control" readonly="" rows="3"  name="solucion_ticket" readonly=""><?php echo $reg2['description']?></textarea> 
                              </div>
                        </div>                                                 

                        <!--Còdigo que muestra en una tabla responsive las atenciones realizadas al ticket-->
                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">                          
                                  <h2>Solución</h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>                          
                              </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <?php
                                //$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                //mysqli_set_charset($mysqli, "utf8");
                                mysqli_set_charset($con, "utf8");
                                  //$id = MysqlQuery::RequestGet('id');
                                  //$sql = Mysql::consulta("SELECT * FROM atencion WHERE id_ticket= '$id'");
                                  //$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);                                

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 15;
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
                                    $consulta="SELECT * FROM atencion WHERE id_ticket= '$id'";
                                }


                                $selticket=mysqli_query($con,$consulta);

                                $totalregistros = mysqli_query($con,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Soluciòn</th>
                                        <th class="text-center">Fecha Atenciòn</th>
                                        <th class="text-center">Asesor</th>                                        
                                        <th class="text-center">Estado</th>                                        
                                        <th class="text-center">Generar pdf</th>
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
                                            //$title=$row['title'];
                                            $project_id=$row['project_id'];
                                            $priority_id=$row['priority_id'];                                            
                                            //$kind_id=$row['kind_id'];
                                            //$cliente_id=$row['cliente_id'];
                                            $category_id=$row['category_id'];                                            
                                            //$profile_pic=$row['profile_pic'];

                                            $sql = mysqli_query($con, "select * from project where id=$project_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_project=$c['proyect_name'];
                                            }

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
                                    <tr>
                                        <!--<td class="text-center"><?php echo $ct; ?></td> -->
                                        <td class="text-center"><?php echo $description;?></td>
                                        <td class="text-center"><?php echo $created_at;?></td>
                                        <td class="text-center"><?php echo $name_asigned; ?></td>
                                        <td class="text-center"><?php echo $name_status; ?></td>
                                        <!--<td class="text-center"><?php echo $name_priority; ?></td>
                                        <td class="text-center"><?php echo $name_project; ?></td> -->
                                        <td class="text-center">
                                            <a href="./lib/pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

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
                                <h2 class="text-center">No hay atenciones registrados en el sistema</h2>
                            <?php endif; ?>
                            </div>
                        </div> <!--End x_content -->
                    </div><!--End x_panel -->
                    </div>
                    </div>
                        <!--Còdigo que muestra en una tabla responsive las atenciones realizadas al ticket-->   
                        
                        <div class="row">
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
                        </div>
                    
                    <br>
                    
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Actualizar ticket</button>
                          </div>
                        </div>

                      </form>
            </div><!--col-md-12-->
          </div><!--container-->


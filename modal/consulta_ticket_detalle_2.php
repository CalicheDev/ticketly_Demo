<?php
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
    $client = mysqli_query($con, "select * from clientes");
?>
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
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
                        <div class="tab-pane tab: active"  id="tab_1"> 
                            <!-- <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd" enctype="multipart/form-data">-->
                                <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data">
                                <div id="result2"></div>

                                <input type="hidden" name="mod_id" id="mod_id">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="kind_id" required id="mod_kind_id" style="pointer-events: none;" readonly>
                                              <?php foreach($kinds as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['kind_name']; ?></option>
                                              <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Codigo ingresado por Carlos Bejarano-->
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="text" name="title" class="form-control" placeholder="Titulo" id="mod_title" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <textarea name="description" id="mod_description" class="form-control col-md-7 col-xs-12" readonly></textarea>
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
                                <!-- Codigo ingresado por Carlos Bejarano-->
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
                                <!-- Codigo ingresado por Carlos Bejarano-->
                                <div class="form-group">                  
                                    
                                    <label for="archivo" class="control-label col-md-3 col-sm-3 col-xs-12">Ajunto </label>                                                      
                                     <div class="col-md-9 col-sm-9 col-xs-12">
                                                <!-- <span class="btn btn-my-button btn-file"> -->
                                                    <!-- <form class="form-horizontal form-label-left input_mask" method="post" id="formulario" name="formulario" enctype="multipart/form-data">-->
                       <!-- Agregar contenido multimedia: --><input type="file" class="form-control" name="archivo" id="archivo" readonly>
                                                    <!--</form>-->
                                                <!--</span> -->
                                    </div>                                                                                                                            
                                </div>
                            </form>                
                        </div>
                        <!--<div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div> -->

                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                    <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data">
                                        <div id="result2"></div>

                                        <input type="hidden" name="mod_id" id="mod_id">
                            <?php
                                if($action == 'ajax'){
                                    // escaping, additionally removing everything that could be (html/javascript-) code
                                    $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
                                    $aColumns = array('id_ticket');//Columnas de busqueda
                                    $sTable = "atencion";
                                    $sWhere = "where id_ticket=" .$_GET["mod_id"];
                                    if ( $_GET['q'] != "" )
                                    {
                                        $sWhere = "WHERE (";
                                        for ( $i=0 ; $i<count($aColumns) ; $i++ )
                                        {
                                            $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
                                        }
                                        $sWhere = substr_replace( $sWhere, "", -3 );
                                        $sWhere .= ')';
                                    }
                                    $sWhere.=" order by fecha_atencion desc";
                                    include 'pagination.php'; //include pagination file
                                    //pagination variables
                                    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
                                    $per_page = 10; //how much records you want to show
                                    $adjacents  = 4; //gap between pages after number of adjacents
                                    $offset = ($page - 1) * $per_page;
                                    //Count the total number of row in your table*/
                                    $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
                                    $row= mysqli_fetch_array($count_query);
                                    $numrows = $row['numrows'];
                                    $total_pages = ceil($numrows/$per_page);
                                    $reload = './expences.php';
                                    //main query to fetch the data
                                    $sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
                                    $query = mysqli_query($con, $sql);
                                    //loop through fetched data
                                    if ($numrows>0){
                                        
                            ?>    

                                        <table id="ticketDetail" class="table table-striped table-bordered">
                                            <thead class="table_header">
                                                <tr role="row">
                                                    <th class="sorting">Detalle Atenciones</th>
                                                    <th>Fecha Atención</th>
                                                    <th>Prioridad</th>
                                                    <th>Asesor</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                            <?php 
                                while ($r=mysqli_fetch_array($query)) {
                                    $id=$r['id_ticket'];
                                    $created_at=date('d/m/Y', strtotime($r['created_at']));
                                    $description=$r['description'];
                                    $title=$r['title'];
                                    $project_id=$r['project_id'];
                                    $priority_id=$r['priority_id'];
                                    $status_id=$r['status_id'];
                                    $kind_id=$r['kind_id'];
                                    $cliente_id=$r['cliente_id'];
                                    $category_id=$r['category_id'];
                                    $asigned_id=$r['asigned_id'];
                                    $profile_pic=$r['profile_pic'];

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
                                            <tbody>
                                                <tr role="row" class="odd"> 
                                                    <td><?php echo $id;?></td>
                                                    <td>   </td>
                                                    <td>   </td>
                                                    <td>   </td>
                                                    <td>   </td>
                                                </tr>
                                            </tbody>
                            <?php
                                } //en while
                            ?>
                                            <tr>
                                                <td colspan=5><span class="pull-right">
                                                    <!--<td colspan=7><span class="pull-right">-->
                                                    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                                                </span></td>
                                            </tr>
                                        </table>
                                    </form>
                                    </div>
                            <?php
                                    }else{
                                    ?> 
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Aviso!</strong> No hay datos para mostrar!
                                        </div>
                                    <?php    
                                    }
                                }
                            ?>
                                </div>
                            </div>
                  </div>
                </div>

            </div>            
            </div>            
        </div>

    </div> <!-- /Modal -->


    

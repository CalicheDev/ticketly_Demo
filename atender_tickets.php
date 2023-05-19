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
                            <!--<?php
                                //include("modal/new_atencion.php");
                                //include("modal/upd_ticket.php");
                                //include("action/upload-multimedia.php");
                            ?>-->
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
                                    
                                <!-- end form seach -->
                                
                                
                <div class="x_content">
                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="action/add_atencion.php" method="post">
                                    <input type="hidden" name="mod_id" id="mod_id">
                                    <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                            <select class="form-control" name="kind_id" >
                                                <option selected="" value="<?php echo $tipo; ?>"></option>
                                                  <?php foreach($kinds as $p):?>
                                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                                  <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Asesor
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                            <select class="form-control" name="asigned_id" >
                                                <option selected="" value=""></option>
                                              <?php foreach($asesores as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input type="text" name="title" class="form-control" placeholder="Titulo" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                          <textarea name="description" class="form-control col-md-7 col-xs-12"  placeholder="Descripción"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proyecto
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control" name="project_id" >
                                                <option selected="" value=""></option>
                                                  <?php foreach($projects as $p):?>
                                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                                  <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Categoria
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                            <select class="form-control" name="category_id" >
                                                <option selected="" value=""></option>
                                                  <?php foreach($categories as $p):?>
                                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                                  <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prioridad
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control" name="priority_id" >
                                                <option selected="" value=""></option>
                                              <?php foreach($priorities as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control" name="status_id" >
                                                <option selected="" value=""></option>
                                              <?php foreach($statuses as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                     
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Detalle <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                          <textarea name="description" class="form-control col-md-7 col-xs-12"  placeholder="Detalle de la Atencion"></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                          <button id="save_data" type="submit" class="btn btn-success">Guardar</button>
                                          <!--  <input type="submit" class="btn btn-success" value="Guardar">  -->
                                          <input type="reset" class="btn btn-success" value="Borrar"/> 
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                          
                                        </div>
                                    </div>
                                </form>


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

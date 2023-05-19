<?php
    //mysqli_query($con, "SET NAMES 'utf8'");
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $profile_pic = mysqli_query($con, "select * from ticket");
    $categories =mysqli_query($con, "select * from category");
    //$categories = utf8_decode($categories);
?>

    <div> <!-- Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Ticket</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Ticket</h4>
                </div>
                
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" action="action/addticket.php" enctype="multipart/form-data">
                        <div id="result"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12">Asunto: <span class="required"></span></label>
                            <div class="col-md-14 col-sm-12 col-xs-12">
                              <input type="text" name="title" class="form-control" placeholder="Titulo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12">Descripción: <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <textarea name="description" class="form-control col-md-7 col-xs-12"  placeholder="Descripción" required></textarea>
                            </div>
                        </div>
                        <!-- Codigo ingresado por Carlos Bejarano-->
                        <div class="form-group">                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="kind_id">
                                    <option value="" selected>-- Seleccionar Tipo --</option>
                                    <?php foreach($kinds as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                    <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="asigned_id">
                                    <option value="" selected>-- Seleccionar Asesor --</option>
                                    <?php foreach($asesores as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                            </select>
                        </div>                        
                        
                        <!-- Codigo ingresado por Carlos Bejarano-->
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="project_id">
                                    <option value="" selected>-- Seleccionar Proyecto --</option>
                                    <?php foreach($projects as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                      <?php endforeach; ?> 
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="category_id">
                                    <option value="" selected>-- Seleccionar Categoria --</option>
                                    <?php foreach($categories as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>                            
                        
                        <!-- Codigo ingresado por Carlos Bejarano-->                        
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="priority_id">
                                    <option value="" selected>-- Seleccionar Prioridad --</option>
                                    <?php foreach($priorities as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="status_id">
                                    <option value="" selected>-- Seleccionar Estado --</option>
                                    <?php foreach($statuses as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                            </select>
                        </div>                                            
                                                 
                            <label for="archivo" class="control-label col-md-1 col-sm-1 col-xs-12">Ajunto </label>                                                      
                             <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!-- <span class="btn btn-my-button btn-file"> -->
                                            <!-- <form class="form-horizontal form-label-left input_mask" method="post" id="formulario" name="formulario" enctype="multipart/form-data">-->
               <!-- Agregar contenido multimedia: --><input type="file" class="form-control" name="archivo" id="archivo">
                                            <!--</form>-->
                                        <!--</span> -->
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
                </div>
                <!-- <div class="modal-footer"> -->
                        
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
                <!-- </div> -->
            </div>
        </div>
    </div> <!-- /Modal -->
    

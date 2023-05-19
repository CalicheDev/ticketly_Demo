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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Atención</button>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                <select class="form-control" name="kind_id" >
                                      <?php foreach($kinds as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Codigo ingresado por Carlos Bejarano-->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Asesor
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                <select class="form-control" name="asigned_id" >
                                    <option selected="" value="">-- Selecciona --</option>
                                  <?php foreach($asesores as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Codigo ingresado por Carlos Bejarano-->
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
                                    <option selected="" value="">-- Selecciona --</option>
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
                                    <option selected="" value="">-- Selecciona --</option>
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
                                    <option selected="" value="">-- Selecciona --</option>
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
                                    <option selected="" value="">-- Selecciona --</option>
                                  <?php foreach($statuses as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">                  
                            
                            <label for="archivo" class="control-label col-md-3 col-sm-3 col-xs-12">Ajunto </label>                                                      
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
    

<?php        
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor where is_active=1");
    $profile_pic = mysqli_query($con, "select * from ticket");
    $categories =mysqli_query($con, "select * from category");
    $client = mysqli_query($con, "select * from clientes where is_active=1");    
?>

    <div> <!-- Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Ticket</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span>
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
                                    <!--<option selected="" value="">-- Selecciona --</option>-->
                                      <?php foreach($kinds as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['kind_name']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Codigo ingresado por Carlos Bejarano-->
                        <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Cliente
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <!-- <div class="col-md-9 col-sm-9 col-xs-12"> -->
                                <select  class="form-control" name="cliente_id" >
                                <!--<input type="search" name="cliente_id" placeholder="Buscar" autofocus required>-->
                                    <option selected="" value="" >-- Selecciona --</option>
                                      <?php foreach($client as $p):?>
                                        <option value="<?php echo $p['id_cliente']; ?>"><?php echo $p['name_Empresa']; ?></option>
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
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['proyect_name']; ?></option>
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
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['category_name']; ?></option>
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
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['priority_name']; ?></option>
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
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['status_name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">                  
                            
                            <label for="archivo" class="control-label col-md-3 col-sm-3 col-xs-12">Adjunto </label>                                                      
                             <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!-- <span class="btn btn-my-button btn-file"> -->
                                            <!-- <form class="form-horizontal form-label-left input_mask" method="post" id="formulario" name="formulario" enctype="multipart/form-data">-->
                                            <!-- Agregar contenido multimedia: -->
                                <input type="file" class="form-control" name="archivo" id="archivo" multiple="">                                                     
                                            <!--</form>-->
                                        <!--</span> -->
                            </div>                                                                                                                            
                        </div>                                
                        <!-- Codigo ingresado por Carlos Bejarano-->
                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                  <!-- <button id="save_data" type="submit" class="btn btn-success">Guardar</button>-->
                                  <input type="submit" class="btn btn-success" value="Guardar"> 
                                  <input type="reset" class="btn btn-danger" value="Borrar"/> 
                                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>                             
                    </form>
                </div>                
            </div>
        </div>
    </div> <!-- /Modal -->

    <!-- Essential javascripts for application to work-->
    <script src="js/plugins/jquery-3.3.1.min.js"></script>
    <script src="js/plugins/popper.min.js"></script>
    <script src="js/plugins/bootstrap.min.js"></script>
    <script src="js/plugins/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/dropzone.js"></script>
    

<!--<script type="text/javascript" src="js/plugins/select2.js"></script>-->
<script type="text/javascript">  
    
    $('#demoSelect').select2();
    
    /*$(document).ready(function() {
        $('.js-example-basic-single').select2();
    });  */
</script>
    
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header headerRegister">
                    <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Ticket</h4>
                </div>
                
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" action="action/addticket.php" enctype="multipart/form-data">
                    <div id="result"></div>                      
                      <!--<input type="hidden" id="idUsuario" name="idUsuario" value="">-->
                      <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="first-name">Tipo <span class="required">*</span></label>
                            <select class="form-control" name="kind_id" >
                                    <!--<option selected="" value="">-- Selecciona --</option>-->
                                <?php foreach($kinds as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['kind_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="first-name">Asesor <span class="required">*</span></label>
                            <select class="form-control" name="asigned_id" >
                            <option selected="" value="">-- Selecciona --</option>
                                <?php foreach($asesores as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="first-name">Proyecto <span class="required">*</span></label>
                          <select class="form-control" name="project_id" >
                            <option selected="" value="">-- Selecciona --</option>
                                <?php foreach($projects as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['proyect_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="first-name">Categoria <span class="required">*</span></label>
                            <select class="form-control" name="category_id" >
                             <option selected="" value="">-- Selecciona --</option>
                                <?php foreach($categories as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['category_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="first-name">Prioridad <span class="required">*</span></label>
                            <select class="form-control" name="priority_id" >
                                <option selected="" value="">-- Selecciona --</option>
                                  <?php foreach($priorities as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['priority_name']; ?></option>
                                  <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="first-name">Estado </label>
                            <select class="form-control" name="status_id" >
                                <option selected="" value="">-- Selecciona --</option>
                                 <?php foreach($statuses as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['status_name']; ?></option>
                                 <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <hr>
                      <p class="text-primary">Detalle el Ticket.</p>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label>Asunto <span class="required">*</span></label>
                          <input type="text" name="title" class="form-control" placeholder="Asunto" >
                        </div>
                        <div class="form-group col-md-4">
                          <label for="cliente_id">Cliente <span class="required">*</span></label>
                            <select data-live-search="true" class="selectpicker" name="cliente_id">
                                <!--<input type="search" name="cliente_id" placeholder="Buscar" autofocus required>-->
                                <option selected="" value="" >-- Selecciona --</option>
                                      <?php foreach($client as $p):?>
                                        <option value="<?php echo $p['id_cliente']; ?>"><?php echo $p['name_Empresa']; ?></option>
                                      <?php endforeach; ?>                                    
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="archivo">Ajunto <span class="required">*</span></label>
                          <input type="file" class="form-control" name="archivo" id="archivo" multiple="">
                        </div>

                        <div class="form-group col-md-12">
                          <label>Descripción <span class="required">*</span></label>
                          <textarea name="description" class="form-control" placeholder="Descripción" required=""></textarea>                          
                        </div>
                        
                      </div>
                     <div class="form-row">
                        
                     </div>
                      <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-success" type="submit"><span id="btnText">Guardar</span></button>&nbsp;                        
                        <input type="reset" class="btn btn-danger" value="Borrar"> &nbsp;
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="Cerrar"></input>
                      </div>
                    </form>
              </div>                
            </div>
        </div>
    </div> <!-- /Modal -->

    
<?php
    $id_soporte =mysqli_query($con, "select * from ticket");
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
    $causas = mysqli_query($con, "select * from causas_soporte");
?>
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Realizar atención al Ticket</h4>
                </div>
                <div class="modal-body">
                    <!--<form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd" enctype="multipart/form-data"> -->
                        <form class="form-horizontal form-label-left input_mask" method="post" action="action/updatencion.php" enctype="multipart/form-data">
                        <div id="result2"></div>

                        <input type="hidden" name="mod_id" id="mod_id">
                        
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-6" for="first-name">Tipo
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                <select class="form-control" name="kind_id" required id="mod_kind_id">
                                      <?php foreach($kinds as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['kind_name']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                            </div>                            
                            <label class="control-label col-md-2 col-sm-2 col-xs-6" for="first-name">Prioridad</label>
                            <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                <select class="form-control" name="priority_id" required id="mod_priority_id" style="pointer-events: none;" readonly>
                                    <option selected="" value="">-- Selecciona --</option>
                                  <?php foreach($priorities as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['priority_name']; ?></option>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Solución: <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea name="detalle_atencion" class="form-control col-md-7 col-xs-12"  id="mod_detalle_atencion" placeholder="Detalle de la atención:"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Causa del soporte: <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="id_causa_sop" >
                                    <option selected="" value="">-- Selecciona --</option>
                                      <?php foreach($causas as $p):?>
                                        <option value="<?php echo $p['id_causa_sop']; ?>"><?php echo $p['causas_soporte']; ?></option>
                                      <?php endforeach; ?>
                                </select>
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
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select  class="form-control" name="status_id" required id="mod_status_id">
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
                                    <option selected="" value="">-- Selecciona --</option>
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
               <!-- Agregar contenido multimedia: --><input type="file" class="form-control" name="archivo" id="archivo">                                                     
                                            <!--</form>-->
                                        <!--</span> -->
                            </div>                                                                                                                            
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button id="upd_data" type="submit" class="btn btn-success">Guardar</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>                
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> -->
            </div>
        </div>
    </div> <!-- /Modal -->
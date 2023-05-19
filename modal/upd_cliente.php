<!--Codigo ingresado por Carlos Bejarano -->
<?php
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
?>
    <div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar datos del cliente</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="upd_cliente" name="upd_cliente">
                        <div id="result_cliente2"></div>
                        
                        <input type="hidden" id="mod_id_cliente" name="mod_id_cliente">
                        
                         <!--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"> -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="mod_Nit" id="mod_Nit" type="text" class="form-control" required>
                            <span class="fa fa-signal form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="mod_name_Empresa" id="mod_name_Empresa" type="text" class="form-control" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="mod_name_Representante" id="mod_name_Representante" type="text" class="form-control" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="mod_telefono" id="mod_telefono" type="text" class="form-control" required>
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="mod_email" id="mod_email" type="text" class="form-control has-feedback-left" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>  

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" name="mod_asigned_id" id="mod_asigned_id">
                                    <option selected="" value="">-- Cambiar Asesor de soporte --</option>
                                  <?php foreach($asesores as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-34 form-group has-feedback">
                                <!-- <input name="Observaciones" required type="text" class="form-control" placeholder="Observaciones" required> -->
                                <textarea name="mod_Observaciones" id="mod_Observaciones" type="text" class="form-control"></textarea>
                                <span class="required" aria-hidden="true"></span>
                        </div>  

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="mod_status_cliente" id="mod_status_cliente">
                                    <option value="" selected>-- Selecciona estado --</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>  
                            </select>
                        </div> 

                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                  <button id="upd_data" type="submit" class="btn btn-success">Actualizar</button>
                                  <button type="reset" class="btn btn-danger" />Borrar </button>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                  
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
    <!--Aqui termina -->
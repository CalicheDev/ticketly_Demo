
    <div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="upd_asesor" name="upd_asesor">
                        <div id="result_asesor2"></div>
                        <!--Codigo ingresado por Carlos Bejarano -->
                        <input type="hidden" id="mod_id" name="mod_id">
                        
                         <!--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"> -->
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input name="mod_username" id="mod_username" type="text" class="form-control" required>
                                <span class="fa fa-signal form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Aqui termina -->
                        <!--<input type="hidden" id="mod_id" name="mod_id"> -->
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input name="mod_name" id="mod_name" type="text" class="form-control" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Codigo ingresado por Carlos Bejarano -->
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input name="mod_telefono" id="mod_telefono" type="text" class="form-control" required>
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Aqui termina -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="mod_email" id="mod_email" type="text" class="form-control has-feedback-left" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="mod_status" id="mod_status">
                                    <option value="" selected>-- Selecciona estado --</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>  
                            </select>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                                <p class="text-muted">La contraseña solo se modificara si escribes algo, en caso contrario no se modifica.</p>
                            </div>
                        </div> -->
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
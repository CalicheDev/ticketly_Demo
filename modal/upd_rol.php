
    <div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar Rol</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="upd_rol" name="upd_rol">
                        <div id="result_rol2"></div>
                        <input type="hidden" id="mod_id_rol" name="mod_id_rol">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input name="mod_nombre_rol" type="text" class="form-control" id="mod_nombre_rol" placeholder="Nombre rol">
                                <!--<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="mod_descripcion_rol" type="text" class="form-control" id="mod_descripcion_rol" placeholder="Descripción rol">
                            </textarea>
                            <!--<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div> 
                        </div> 
                        <div class="form-group"> 
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado<span class="required">*</span></label>                     
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" required name="mod_status_rol" id="mod_status_rol">
                                    <option value="" selected>-- Selecciona estado --</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>  
                            </select>
                        </div>
                        </div> 
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button id="upd_data" type="submit" class="btn btn-success">Guardar</button>
                              <button type="reset" class="btn btn-danger" />Borrar </button>
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div> <!-- /Modal -->
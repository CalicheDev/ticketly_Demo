
  <div> <!-- Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Rol</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Rol</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="add_rol" name="add_rol">
                        <div id="result_rol"></div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="nombre_rol" type="text" class="form-control" placeholder="Nombre rol">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="descripcion_rol" type="text" class="form-control" placeholder="Descripción rol" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="status_rol">
                                    <option value="" selected>-- Selecciona estado --</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>  
                            </select>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button id="save_data" type="submit" class="btn btn-success">Guardar</button>
                              <button type="reset" class="btn btn-danger" />Borrar </button>
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div> <!-- /Modal -->
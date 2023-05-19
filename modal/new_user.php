<?php        
    $roles =mysqli_query($con, "select * from rol");        
?>

  <div> <!-- Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Usuario</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="add_user" name="add_user">
                        <div id="result_user"></div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="name" required type="text" class="form-control" placeholder="Nombre">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="lastname" type="text" class="form-control" placeholder="Apellidos" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="email" type="text" class="form-control has-feedback-left" placeholder="Correo Electronico" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="status">
                                    <option value="" selected>-- Selecciona estado --</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>  
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" name="rol_id">
                                    <option selected="" value="" selected>-- Seleccione el rol --</option>
                                    <?php foreach($roles as $p):?>
                                    <option value="<?php echo $p['id_rol']; ?>"><?php echo $p['nombre_rol']; ?></option>
                                  <?php endforeach; ?>  
                            </select>
                        </div>

                        <div class="form-group">
                            <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña<span class="required">*</span>
                            </label> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password" name="password" required class="form-control col-md-7 col-xs-12" placeholder="Contraseña*">
                            </div>
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
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Nuevo Cliente</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Registro de Clientes</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="add_cliente" name="add_cliente">
                        <div id="result_cliente"></div>
                        <!--Codigo ingresado por Carlos Bejarano -->
                         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="Nit" required type="text" class="form-control" placeholder="Nit" required>
                                <span class="fa fa-signal form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Aqui termina -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="name_Empresa" required type="text" class="form-control" placeholder="Nombre de la Empresa">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="name_Representante" type="text" class="form-control" placeholder="Representante Legal" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Codigo ingresado por Carlos Bejarano -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="telefono" type="text" class="form-control" placeholder="Telefono" required>
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Aqui termina -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="email" type="text" class="form-control has-feedback-left" placeholder="Correo Electronico" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <!--Codigo ingresado por Carlos Bejarano -->                        
                         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" name="asigned_id" >
                                    <option selected="" value="">-- Seleccione Asesor de soporte --</option>
                                  <?php foreach($asesores as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                        </div>                        
                        <!--Codigo ingresado por Carlos Bejarano -->
                        <div class="col-md-12 col-sm-12 col-xs-34 form-group has-feedback">                                
                                <textarea name="Observaciones" required type="text" class="form-control"  placeholder="Observaciones" required></textarea>
                                <span class="required" aria-hidden="true"></span>
                        </div>                        

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="status_cliente">
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
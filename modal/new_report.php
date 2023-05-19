<?php
///// INCLUIR LA CONEXIÓN A LA BD /////////////////
//require_once '../config/config.php';
///// CONSULTA A LA BASE DE DATOS /////////////////
	$tickets = mysqli_query($con, "select * from ticket");
    $projects = mysqli_query($con, "select * from project");
    $priorities = mysqli_query($con,  "select * from priority");
    $statuses = mysqli_query($con, "select * from status");
    $kinds = mysqli_query($con, "select * from kind");
?>

    <div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Descargar Reporte en Excel</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post" action="./PHPExcel/reporte.php">
                            <input type="hidden" name="view" value="reports">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                        <select name="project_id" class="form-control">
                                        <option value="">PROJECTO</option>
                                          <?php foreach($projects as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["project_id"]) && $_GET["project_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['proyect_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">                                    
                                        <span class="input-group-addon"><i class="fa fa-support"></i></span>
                                        <select name="priority_id" class="form-control" id="priority_id">
                                        <option value="">PRIORIDAD</option>
                                          <?php foreach($priorities as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["priority_id"]) && $_GET["priority_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['priority_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                      <span class="input-group-addon">INICIO</span>
                                      <input type="date" name="start_at" value="<?php if(isset($_GET["created_at"]) && $_GET["created_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                                    </div>
                                </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                          <span class="input-group-addon">FIN</span>
                                          <input type="date" name="created_at" value="<?php if(isset($_GET["created_at"]) && $_GET["created_at"]!=""){ echo $_GET["created_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                                        </div>
                                    </div>
                            </div>                            
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">ESTADO</span>
                                        <select name="status_id" class="form-control" id="status_id">
                                          <?php foreach($statuses as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["status_id"]) && $_GET["status_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['status_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">TIPO</span>
                                        <select name="kind_id" class="form-control">
                                          <?php foreach($kinds as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["kind_id"]) && $_GET["kind_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['kind_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>                         
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                  <button style="margin-right: 3px" class="btn btn-success" name="generar_reporte"><span class="fa fa-file-excel-o" aria-hidden="true"></span> Generar</button>
                                  <button type="reset" class="btn btn-danger" />Borrar </button>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </form>
                </div>                
            </div>
        </div>
    </div> <!-- /Modal -->















   <!--Modal -->
<!--
<form class="form-horizontal" method="post" id="generar_reporte" name="generar_reporte">
    <div class="modal fade" id="new_report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Descargar Reporte en Excel</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post" action="./PHPExcel/reporte.php">
                            <input type="hidden" name="view" value="reports">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                        <select name="project_id" class="form-control">
                                        <option value="">PROJECTO</option>
                                          <?php foreach($projects as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["project_id"]) && $_GET["project_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['proyect_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">                                    
                                        <span class="input-group-addon"><i class="fa fa-support"></i></span>
                                        <select name="priority_id" class="form-control">
                                        <option value="">PRIORIDAD</option>
                                          <?php foreach($priorities as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["priority_id"]) && $_GET["priority_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['priority_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-lg-3">
                                <div class="input-group">
                                  <span class="input-group-addon">INICIO</span>
                                  <input type="date" name="start_at" value="<?php if(isset($_GET["created_at"]) && $_GET["created_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                  <span class="input-group-addon">FIN</span>
                                  <input type="date" name="created_at" value="<?php if(isset($_GET["created_at"]) && $_GET["created_at"]!=""){ echo $_GET["created_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">ESTADO</span>
                                        <select name="status_id" class="form-control">
                                          <?php foreach($statuses as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["status_id"]) && $_GET["status_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['status_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">TIPO</span>
                                        <select name="kind_id" class="form-control">
                                          <?php foreach($kinds as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["kind_id"]) && $_GET["kind_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['kind_name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>                               
                                
                                <div class="col-lg-6">                                    
                                    <button style="margin-right: 3px" class="btn btn-sm btn-success"><span class="fa fa-file-excel-o" aria-hidden="true"></span> Generar Reporte</button>
                                </div>                                
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

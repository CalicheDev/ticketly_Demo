<?php
    $title ="Reportes | ";
    include "head.php";
    include "sidebar.php";
    /*Codigo ingresado por Carlos Bejarano: para mostrar los acentos de las palabras (Set names) Al crear la conexión de PHP con MySQL, 
    envía esta consulta justo tras la conexión: */
    //mysqli_query($con, "SET NAMES 'utf8'");
    
    $tickets = mysqli_query($con, "select * from ticket");
    $projects = mysqli_query($con, "select * from project");
    $priorities = mysqli_query($con,  "select * from priority");
    $statuses = mysqli_query($con, "select * from status");
    $kinds = mysqli_query($con, "select * from kind");
?>  

    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">                
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php  include("modal/new_report.php"); ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Reportes</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li> -->
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <!-- form search -->
                        <!-- <form class="form-horizontal" role="form" method="post" action="PHPExcel/reporte.php">-->
                        <form class="form-horizontal" role="form" >
                            <input type="hidden" name="view" value="reports">
                            <div class="form-group">
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <meta lang="es">
                                    
                                    <meta charset="utf-8">

                                    <span class="input-group-addon"><i class="fa fa-support"></i></span>
                                    <select name="priority_id" class="form-control">
                                    <option value="">PRIORIDAD</option>
                                      <?php foreach($priorities as $p):?>
                                        <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["priority_id"]) && $_GET["priority_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['priority_name']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
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
                                    <button style="margin-right: 3px" class="btn btn-sm btn-success" name="generar_reporte"><span class="fa fa-file-excel-o" aria-hidden="true"></span> Procesar</button>
                                    <a style="margin-right: 3px" target="_blank" href="LibreriaHTML2PDF/index.php" class="btn btn-sm btn-success">
                                      <span class="fa fa-file-pdf-o" aria-hidden="true"></span> Generar_PDF
                                    </a>
                                    <a style="margin-right: 3px" href="PHPExcel/reporte2.php" class="btn btn-sm btn-success" target="_blank" ><span class="fa fa-file-excel-o" aria-hidden="true"></span> Generar_Excel</i></a>
                                    <!--<a style="margin-right: 3px" class="btn btn-sm btn-success" data-toggle="modal" data-target="#new_report" ><span class="fa fa-file-excel-o" aria-hidden="true"></span> Generar Reporte</i></a> -->
                                    <a style="margin-right: 3px" href="#" class="btn btn-sm btn-success" title='Generar Reporte' data-toggle="modal" data-target=".bs-example-modal-lg-upd"><span class="fa fa-file-excel-o" aria-hidden="true"></span> Generar Reporte</i></a>
                                </div>                                
                            </div>
                        </form>
                        <!-- end form search -->
                        <!--<form method="post" class="form" action="PHPExcel/reporte.php">
                            <input type="date" name="start_at">
                            <input type="date" name="created_at">
                            <input type="submit" name="generar_reporte">
                        </form>-->

                         <?php
                                        $users= array();
                                        if((isset($_GET["status_id"]) && isset($_GET["kind_id"]) && isset($_GET["project_id"]) && isset($_GET["priority_id"]) && isset($_GET["start_at"]) && isset($_GET["created_at"]) ) && ($_GET["status_id"]!="" ||$_GET["kind_id"]!="" || $_GET["project_id"]!="" || $_GET["priority_id"]!="" || ($_GET["start_at"]!="" && $_GET["created_at"]!="") ) ) {
                                        $sql = "select * from ticket where ";
                                        if($_GET["status_id"]!=""){
                                            $sql .= " status_id = ".$_GET["status_id"];
                                        }

                                        if($_GET["kind_id"]!=""){
                                        if($_GET["status_id"]!=""){
                                            $sql .= " and ";
                                        }
                                            $sql .= " kind_id = ".$_GET["kind_id"];
                                        }


                                        if($_GET["project_id"]!=""){
                                        if($_GET["status_id"]!=""||$_GET["kind_id"]!=""){
                                            $sql .= " and ";
                                        }
                                            $sql .= " project_id = ".$_GET["project_id"];
                                        }

                                        if($_GET["priority_id"]!=""){
                                        if($_GET["status_id"]!=""||$_GET["project_id"]!=""||$_GET["kind_id"]!=""){
                                            $sql .= " and ";
                                        }

                                            $sql .= " priority_id = ".$_GET["priority_id"];
                                        }



                                        if($_GET["start_at"]!="" && $_GET["created_at"]){
                                        if($_GET["status_id"]!=""||$_GET["project_id"]!="" ||$_GET["priority_id"]!="" ||$_GET["kind_id"]!="" ){
                                            $sql .= " and ";
                                        }

                                            $sql .= " ( created_at >= \"".$_GET["start_at"]."\" and created_at <= \"".$_GET["created_at"]."\" ) ";
                                        }

                                                $users = mysqli_query($con, $sql);

                                        }else{
                                                $users = mysqli_query($con, "select * from ticket order by created_at desc");

                                        }

                            if(@mysqli_num_rows($users)>0){
                                // si hay reportes
                                $_SESSION["report_data"] = $users;
                            ?>
        <div class="x_content">
            <div id="example1" class="table-responsive">
                <!--<table class="table table-bordered table-hover"> Este es el original del codigo--> 
                <table class="table table-hover" id="mitabla">
                    <thead class="thead-dark">
                        <th>ID Caso</th>
                        <th>Asunto</th>
                        <th>Proyecto</th>
                        <th>Tipo</th>
                        <th>Categoria</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Ultima Actualizacion</th>
                    </thead>
            <?php
            $total = 0;
            foreach($users as $user){
                $ticket_id=$user['id'];
                $project_id=$user['project_id'];
                $priority_id=$user['priority_id'];
                $kind_id=$user['kind_id'];
                $category_id=$user['category_id'];
                $status_id=$user['status_id'];


                $ticket=mysqli_query($con, "select * from ticket where id=$ticket_id");
                $status=mysqli_query($con, "select * from status where id=$status_id");
                $category=mysqli_query($con, "select * from category where id=$category_id");
                $kinds = mysqli_query($con,"select * from kind where id=$kind_id");
                $project  = mysqli_query($con, "select * from project where id=$project_id");
                $medic = mysqli_query($con,"select * from priority where id=$priority_id");
                $date=mysqli_query($con, "select DATE(created_at) AS fecha,DATE(updated_at) AS Fech_Actu from ticket where id=$ticket_id");
                $row= mysqli_fetch_array($date);
                $fecht = $row['fecha'];
                $Fech_Act= $row['Fech_Actu'];

                
                ?>
                <tr>

                <td><?php echo $user['id'] ?></td>
                <?php foreach($ticket as $tickets){?>
                <?php } ?>
                <td><?php echo $user['title'] ?></td>
                <?php foreach($project as $pro){?>
                <td><?php echo $pro['proyect_name'] ?></td>
                <?php } ?>
                <?php foreach($kinds as $kind){?>
                <td><?php echo $kind['kind_name'] ?></td>
                <?php } ?>
                <?php foreach($category as $cat){?>
                <td><?php echo $cat['category_name']; ?></td>
                <?php } ?>
                 <?php foreach($medic as $medics){?>
                <td><?php echo $medics['priority_name']; ?></td>
                <?php } ?>
                <?php foreach($status as $stat){?>
                <td><?php echo $stat['status_name']; ?></td>
                 <?php } ?>
                <td><?php echo $fecht; ?></td>
                <td><?php echo $Fech_Act; ?></td>
                <!--<td><?php echo $user['updated_at']; ?></td>-->
                </tr>
             <?php  
                
                }

              ?>   
       <?php

        }else{
            echo "<p class='alert alert-danger'>No hay tickets</p>";
        }


        ?>
     </table>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->



<?php include "footer.php" ?>

<script>
    $(document).ready(function(){
        $('#mitabla').DataTable({
            "order": [[1, "desc"]],
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search": "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },                  
            }
        }); 
    }); 
</script>


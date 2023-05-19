<?php
    $title ="Tickets Registrados | ";
    include "head.php";
    include "sidebar.php";
?>

    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">                    
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tickets Registrados</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li> -->                                
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <?php
                                $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                mysqli_set_charset($mysqli, "utf8");

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 10;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;
                                
                                
                                if(isset($_GET['ticket'])){
                                    if($_GET['ticket']=="all"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='1' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='2' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='5' LIMIT $inicio, $regpagina";
                                    }else{
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    $consulta="SELECT * FROM ticket WHERE status_id='8'";
                                    //$consulta="SELECT * FROM ticket WHERE status_id= '5' order by created_at desc";
                                }


                                $selticket=mysqli_query($mysqli,$consulta);

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-striped jambo_table bulk_action" id="mitabla">
                                <thead>
                                    <tr class="headings">
                                        <th class="text-center">Ticket</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Prioridad</th>
                                        <th class="text-center">Proyecto</th>
                                        <th class="text-center">Asesor</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //$ct=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)):
                                            $ct=$row['id'];
                                            $created_at=date('d/m/Y', strtotime($row['created_at']));
                                            $description=$row['description'];
                                            $title=$row['title'];
                                            $project_id=$row['project_id'];
                                            $priority_id=$row['priority_id'];
                                            $status_id=$row['status_id'];
                                            $kind_id=$row['kind_id'];
                                            $cliente_id=$row['cliente_id'];
                                            $category_id=$row['category_id'];
                                            $asigned_id=$row['asigned_id'];
                                            $profile_pic=$row['profile_pic'];

                                            $sql = mysqli_query($con, "select * from project where id=$project_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_project=$c['proyect_name'];
                                            }

                                            $sql = mysqli_query($con, "select * from priority where id=$priority_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_priority=$c['priority_name'];
                                            }

                                            $sql = mysqli_query($con, "select * from status where id=$status_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_status=$c['status_name'];
                                            }

                                            $sql = mysqli_query($con, "select * from asesor where id=$asigned_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_asigned=$c['name'];
                                            }

                                            $sql = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_cliente=$c['name_Empresa'];
                                            } 
                                    ?>
                                    <input type="hidden" value="<?php echo $id;?>" id="id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $title;?>" id="title<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $description;?>" id="description<?php echo $id;?>">

                                    <!-- me obtiene los datos -->
                                    <input type="hidden" value="<?php echo $kind_id;?>" id="kind_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $cliente_id;?>" id="cliente_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $project_id;?>" id="project_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $category_id;?>" id="category_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $priority_id;?>" id="priority_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $status_id;?>" id="status_id<?php echo $id;?>">
                                    <input type="hidden" value="<?php echo $asigned_id;?>" id="asigned_id<?php echo $id;?>">
                                    <!--<input type="hidden" value="<?php echo $profile_pic;?>" id="profile_pic?php echo $id;?>">-->
                                    <tr class="even pointer">
                                        <td class="text-center"><?php echo $ct; ?></td>
                                        <td class="text-center"><?php echo $created_at; ?></td>
                                        <td class="text-center"><?php echo $title;?></td>
                                        <td class="text-center"><span class="label label-warning"><?php echo $name_status;?>
                                        </span></td>                                        
                                        <td class="text-center"><?php echo $name_priority; ?></td>
                                        <td class="text-center"><?php echo $name_project; ?></td>
                                        <td class="text-center"><?php echo $name_asigned; ?></td>
                                        <td class="text-center">
                                            <a href="./lib/pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

                                            <a href="ticketedit-view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        $ct++;
                                        endwhile; 
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2 class="text-center">No hay tickets registrados en el sistema</h2>
                            <?php endif; ?>
                            </div>
                        </div> <!--End x_content -->
                    </div><!--End x_panel -->
                </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>

<script type="text/javascript" src="js/ticket_registrado.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
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

<script>
$("#add").submit(function(event) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/addticket.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})


$( "#upd" ).submit(function( event ) {
  $('#upd_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/updticket.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result2").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})

$( "#img" ).submit(function( event ) {
  $('#upd_data2').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/upload-multimedia.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result3").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result3").html(datos);
            $('#upd_data2').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})
    function obtener_datos(id){
        var description = $("#description"+id).val();
        var title = $("#title"+id).val();
        var kind_id = $("#kind_id"+id).val();
        var project_id = $("#project_id"+id).val();
        var category_id = $("#category_id"+id).val();
        var priority_id = $("#priority_id"+id).val();
        var status_id = $("#status_id"+id).val();
        var asigned_id =$("#asigned_id"+id).val();
        var profile_pic =$("#profile_pic"+id).val();
        var cliente_id =$("#cliente_id"+id).val();
            $("#mod_id").val(id);
            $("#mod_title").val(title);
            $("#mod_description").val(description);
            $("#mod_kind_id").val(kind_id);
            $("#mod_project_id").val(project_id);
            $("#mod_category_id").val(category_id);
            $("#mod_priority_id").val(priority_id);
            $("#mod_status_id").val(status_id);
            $("#mod_asigned_id").val(asigned_id);
            $("#mod_profile_pic").val(profile_pic);
            $("#mod_cliente_id").val(cliente_id);
        }
</script>
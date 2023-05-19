<?php 
    $title ="Dashboard - "; 
    include "head.php";
    include "sidebar.php";

    //mysqli_query($con, "SET NAMES 'utf8'");
    $TicketRegistrado=mysqli_query($con, "select * from ticket where status_id=8");
    $TicketAsginado=mysqli_query($con, "select * from ticket where status_id=2");
    $TicketenProceso=mysqli_query($con, "select * from ticket where status_id=3");
    $TicketFinalizados=mysqli_query($con, "select * from ticket where status_id=5");
    $ProjectData=mysqli_query($con, "select * from project");
    $CategoryData=mysqli_query($con, "select * from category");
    $UserData=mysqli_query($con, "select * from user order by created_at desc");
    //$consulta1=mysqli_query($con, "SELECT COUNT(*) FROM ticket WHERE asigned_id = 1 AND status_id = 2");
    $consulta1=mysqli_query($con, "select * from ticket where asigned_id=1 and status_id=2");
    $consulta2=mysqli_query($con, "select * from ticket where asigned_id=1 and status_id=3");
    $consulta3=mysqli_query($con, "select * from ticket where asigned_id=1 and status_id=5");

                                
?>

     
    <div class="right_col" role="main"> <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="row top_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-ticket"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketRegistrado) ?></div>
                          <h3>Tickets Registrados</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-list"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketAsginado) ?></div>
                          <h3>Tickets Asignados</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-pencil"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketenProceso) ?></div>
                          <h3>Tickets En Proceso</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-folder"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketFinalizados) ?></div>
                          <h3>Tickets Finalizados</h3>
                        </div>
                    </div>
                </div>
                <!-- content -->
                
                <br><br>
                <div class="row">
                    <div class="col-md-6">
                        
                             <table style="width:400px" id="graph2">   
                             <caption>Asesores</caption>
                             <caption id="legend">Tickets</caption>

                                <thead>                                    
                                    <th>Asignados</th>
                                    <th>En Proceso</th>
                                    <th>Finalizados</th>                                        
                                </thead>
                                    <tbody>
                                        <tr><th>Carlos Bejarano</th>
                                            <td><?php echo mysqli_num_rows($consulta1)?></td>
                                            <td><?php echo mysqli_num_rows($consulta2)?></td>
                                            <td><?php echo mysqli_num_rows($consulta3)?></td> 
                                        </tr>
                                        <tr><th>Hector Gonzalez</th><td>12</td><td>6</td><td>2</td> </tr>
                                        <tr><th>James Machado</th><td>10</td><td>1</td><td>1</td> </tr>
                                        <tr><th>Clara Luz</th><td>10</td><td>2</td><td>2</td></tr>
                                        <tr><th>Victor Cano</th><td>13</td><td>2</td><td>2</td></tr>
                                    </tbody>
                            </table>
                            
                        <!--<div id="respuesta"></div>-->
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">                            
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Gestión Tickets de Soprote Técnico</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                            <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                
                                <?php
                                $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                mysqli_set_charset($mysqli, "utf8");

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 5;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;
                                
                                
                                if(isset($_GET['ticket'])){
                                    if($_GET['ticket']=="all"){
                                        $consulta=mysqli_query($con, "SELECT COUNT(*) AS numrows FROM ticket WHERE status_id IN ('2','3','5') ");
                                        //$row= mysqli_fetch_array($consulta);
                                        //$numrows = $row['numrows'];
                                    }
                                }else{
                                    $consulta="SELECT * FROM ticket WHERE status_id IN (8) ";
                                    //$consulta="SELECT * FROM ticket WHERE status_id= '5' order by created_at desc";
                                }

                                $selticket=mysqli_query($mysqli,$consulta);

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);
                                //$total_pages = ceil($numrows/$per_page);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-striped jambo_table bulk_action">
                            <caption id="legend" class="text-center" >Tickets</caption>
                                    <thead>
                                        <th>Asesor</th>
                                        <th>Asignados</th>
                                        <th>En Proceso</th>
                                        <th>Finalizados</th>                                        
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$name_asigned=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)) {
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

                                            

                                            $sql = mysqli_query($con, "select * from asesor where id=$asigned_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_asigned=$c['name'];
                                            }                                            
                            $sql1 = mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=2");
                            $sql2 = mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=3");
                            $sql3 = mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=5");                             

                                    ?>                        
                                        <tr>
                                            <th><?php echo $name_asigned; ?></th>
                                            <td><?php echo mysqli_num_rows($sql1)?></td>
                                            <td><?php echo mysqli_num_rows($sql2)?></td>
                                            <td><?php echo mysqli_num_rows($sql3)?></td> 
                                        </tr>
                                        
                                    <?php
                                        //$name_asigned++;
                                        }//endwhile; 
                                    ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <h2 class="text-center">No hay datos para mostrar </h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->



<?php include "footer_2.php" ?>
<script>
    $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "action/upload-profile.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
            });
        });
    });
</script>


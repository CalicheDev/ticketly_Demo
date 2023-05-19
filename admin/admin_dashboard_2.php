<?php 
    $title ="Admin-Dashboard - "; 
    require "../head.php";
    include "admin_sidebar.php";


    //mysqli_query($con, "SET NAMES 'utf8'");
    $TicketRegistrado=mysqli_query($con, "select * from ticket where status_id=8");
    $TicketAsginado=mysqli_query($con, "select * from ticket where status_id=2");
    $TicketenProceso=mysqli_query($con, "select * from ticket where status_id=3");
    $TicketFinalizados=mysqli_query($con, "select * from ticket where status_id=5");
    $ProjectData=mysqli_query($con, "select * from project");
    $CategoryData=mysqli_query($con, "select * from category");
    $UserData=mysqli_query($con, "select * from user order by created_at desc");
    //$consulta1=mysqli_query($con, "SELECT COUNT(*) FROM ticket WHERE asigned_id = 1 AND status_id = 2");  
?>

     
    <div class="right_col" role="main"> <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="row top_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="../Tickets_Registrados.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-ticket"></i></div>
                          <div class="count">                             
                                <?php echo mysqli_num_rows($TicketRegistrado) ?>          
                          </div>
                          <h3>Tickets Registrados</h3>
                        </div> 
                        </a>                       
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <a href="../Tickets_Asignados.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-list"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketAsginado) ?></div>
                          <h3>Tickets Asignados</h3>
                        </div>
                      </a> 
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <a href="../Tickets_en_proceso.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-pencil"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketenProceso) ?></div>
                          <h3>Tickets En Proceso</h3>
                        </div>
                      </a>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <a href="../cerrados.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-calendar-check-o"></i></div>
                          <div class="count"><?php echo mysqli_num_rows($TicketFinalizados) ?></div>
                          <h3>Tickets Finalizados</h3>
                        </div>
                      </a>
                    </div>
                </div>
                <!-- content -->
                
                <br><br>
                <div class="row">
                    <div class="col-md-6">   

                    <?php
                                $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                mysqli_set_charset($mysqli, "utf8");

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 5;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;
                                
                                
                                if(isset($_GET['ticket'])){
                                    if($_GET['ticket']=="all"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='2' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='3' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='5' LIMIT $inicio, $regpagina";
                                    }else{
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    //$consulta="SELECT * FROM ticket WHERE status_id='3'";
                                    $consulta="SELECT pz.asigned_id, pz.status_id, f.status_name, w.name
                                                        FROM ticket pz
                                                        INNER JOIN status f ON pz.status_id = f.id
                                                        INNER JOIN asesor w ON w.id = pz.asigned_id
                                                        WHERE pz.status_id IN (2,3,5)
                                                        GROUP BY asigned_id
                                                        ORDER BY pz.asigned_id";
                                    //$consulta="SELECT * FROM ticket WHERE status_id= '5' order by created_at desc";
                                }

                                $selticket=mysqli_query($mysqli,$consulta);

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);
                                //$total_pages = ceil($numrows/$per_page);

                                if(mysqli_num_rows($selticket)>0):
                            ?>

                             <table style="width:400px" id="graph2">   
                             <caption>Asesores</caption>
                             <caption id="legend">Tickets</caption>

                                <thead>                                    
                                    <th>Asignados</th>
                                    <th>En Proceso</th>
                                    <th>Finalizados</th>                                        
                                </thead>
                                    <tbody>
                            <?php
                                        //$asigned_id=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)) {
                                            $status_id=$row['status_id'];                                            
                                            $asigned_id=$row['asigned_id'];                                            

                                            $sql = mysqli_query($con, "select * from asesor where id=$asigned_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_asigned=$c['name'];
                                            }
                                            $sql = mysqli_query($con, "select * from status where id=$status_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_status=$c['status_name'];
                                            }
                            
                            $sql=mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=2");
                            $sq2=mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=3");
                            $sq3=mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=5");

                                    ?>
                                        <tr>
                                            <th><?php echo $name_asigned; ?></th>
                                            <td class="text-center"><?php echo mysqli_num_rows($sql)?></td>
                                            <td class="text-center"><?php echo mysqli_num_rows($sq2)?></td>
                                            <td class="text-center"><?php echo mysqli_num_rows($sq3)?></td>
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
                            
                        <!--<div id="respuesta"></div>-->
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">                            
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Cantidad de Tickets por Asesor</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>-->                                    
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
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='2' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='3' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE status_id='5' LIMIT $inicio, $regpagina";
                                    }else{
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    //$consulta="SELECT * FROM ticket WHERE status_id='3'";
                                    $consulta="SELECT pz.asigned_id, pz.status_id, f.status_name, w.name
                                                        FROM ticket pz
                                                        INNER JOIN status f ON pz.status_id = f.id
                                                        INNER JOIN asesor w ON w.id = pz.asigned_id
                                                        WHERE pz.status_id IN (2,3,5)
                                                        GROUP BY asigned_id
                                                        ORDER BY pz.asigned_id";
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
                            <!-- <caption id="legend" class="text-center" >Tickets</caption> -->
                                    <thead>
                                        <th>Asesor</th>
                                        <th>Asignados</th>
                                        <th>En Proceso</th>
                                        <th>Finalizados</th>
                                        <!-- <th>Finalizados</th> -->
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$asigned_id=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)) {
                                            //$ct=$row['id'];
                                            //$created_at=date('d/m/Y', strtotime($row['created_at']));
                                            //$description=$row['description'];
                                            //$title=$row['title'];
                                            //$project_id=$row['project_id'];
                                            //$priority_id=$row['priority_id'];
                                            $status_id=$row['status_id'];
                                            //$kind_id=$row['kind_id'];
                                            //$cliente_id=$row['cliente_id'];
                                            //$category_id=$row['category_id'];
                                            $asigned_id=$row['asigned_id'];
                                            //$profile_pic=$row['profile_pic'];                                            

                                            

                                            $sql = mysqli_query($con, "select * from asesor where id=$asigned_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_asigned=$c['name'];
                                            }
                                            $sql = mysqli_query($con, "select * from status where id=$status_id");
                                            if($c=mysqli_fetch_array($sql)) {
                                                $name_status=$c['status_name'];
                                            }
                            
                            $consulta1=mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=2");
                            $consulta2=mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=3");
                            $consulta3=mysqli_query($con, "select * from ticket where asigned_id=$asigned_id and status_id=5");

                                    ?>                        
                                        <tr>
                                            <th><?php echo $name_asigned; ?></th>
                                            <td class="text-center"><?php echo mysqli_num_rows($consulta1)?></td>
                                            <td class="text-center"><?php echo mysqli_num_rows($consulta2)?></td>
                                            <td class="text-center"><?php echo mysqli_num_rows($consulta3)?></td>
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



<?php include "../footer_2.php" ?>
<!-- <?php //include "footer_2.php" ?> -->
<script>
    $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "../action/upload-profile.php";
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


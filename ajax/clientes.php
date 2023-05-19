<?php

    include "../config/config.php";//Contiene funcion que conecta a la base de datos
    
    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if (isset($_GET['id_cliente'])){
        $id_expence=intval($_GET['id_cliente']);
        $query=mysqli_query($con, "SELECT * from clientes where id_cliente='".$id_expence."'");
        $count=mysqli_num_rows($query);
            if ($delete1=mysqli_query($con,"DELETE FROM clientes WHERE id_cliente='".$id_expence."'")){
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> Datos eliminados exitosamente.
            </div>
            <?php 
        }else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
            </div>
<?php
        } //end else
    } //end if
?>

<?php
    if($action == 'ajax'){
        // escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
         $aColumns = array('name_Empresa', 'Nit');//Columnas de busqueda
         $sTable = "clientes";
         $sWhere = "";
        if ( $_GET['q'] != "" )
        {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        $sWhere.=" order by name_Empresa asc"; //tipo de ordenamiento "asc y desc"
        include 'pagination.php'; //include pagination file
        //pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 10; //how much records you want to show
        $adjacents  = 4; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;
        //Count the total number of row in your table*/
        $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        $row= mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows/$per_page);
        $reload = './clientes.php';
        //main query to fetch the data
        $sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);
        //loop through fetched data
        if ($numrows>0){
            
            ?>
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Nit. </th>
                        <th class="column-title">Empresa </th>
                        <th class="column-title">Representante Legal </th>
                        <th class="column-title">Telefono </th>
                        <th class="column-title">Correo Electrónico </th>
                        <th class="column-title">Asesor Soporte </th>
                        <th class="column-title">Estado </th>
                        <!-- <th class="column-title">Fecha </th> -->
                        <th class="column-title no-link last"><span class="nobr"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        while ($r=mysqli_fetch_array($query)) {
                            $id=$r['id_cliente'];
                            $status=$r['is_active'];
                                if ($status==1){$status_f="Activo";}else {$status_f="Inactivo";}

                            $nit=$r['Nit'];
                            $empresa=$r['name_Empresa'];
                            $represent=$r['name_Representante'];
                            $telefono=$r['telefono'];
                            $email=$r['email'];
                            //$Fecha_Ini_Contrac=$r['Fecha_Ini_Contrato'];
                            //$Fecha_Fin_Contrac=$r['Fecha_Fin_Contrato'];
                            $asesor=$r['asigned_id'];
                            $Observation = $r['Observaciones'];
                            //$created_at=date('d/m/Y', strtotime($r['created_at']));

                            $sql = mysqli_query($con, "select * from asesor where id=$asesor");
                            if($c=mysqli_fetch_array($sql)) {
                                $name_asigned=$c['name'];
                            }
                ?>
                    <input type="hidden" value="<?php echo $nit;?>" id="Nit<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $empresa;?>" id="name_Empresa<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $represent;?>" id="name_Representante<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $telefono;?>" id="telefono<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $email;?>" id="email<?php echo $id;?>">
               <!-- <input type="hidden" value="<?php echo $Fecha_Ini_Contrac;?>" id="Fecha_Ini_Contrato<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $Fecha_Fin_Contrac;?>" id="Fecha_Fin_Contrato<?php echo $id;?>"> -->
                    <input type="hidden" value="<?php echo $asesor;?>" id="asigned_id<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $Observation;?>" id="Observaciones<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $status;?>" id="status_cliente<?php echo $id;?>">

                    <tr class="even pointer">
                        <td><?php echo $nit;?></td>
                        <td><?php echo $empresa;?></td>
                        <td><?php echo $represent;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $email;?></td>                        
                        <td><?php echo $name_asigned;?></td>
                        <td ><?php echo $status_f; ?></td>
                        <!-- <td><?php echo $created_at;?></td>-->
                        <td ><span class="pull-right">
                        <a href="#" class='btn btn-default' title='Editar datos del cliente' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target=".bs-example-modal-lg-upd"><i class="glyphicon glyphicon-edit"></i></a> 
                        <a href="#" class='btn btn-default' title='Borrar datos del cliente' onclick="eliminar('<?php echo $id; ?>');"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
                    </tr>
                <?php
                    } //end while
                ?>
                <tr>
                    <td colspan=8><span class="pull-right">
                        <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </span></td>
                </tr>
              </table>
            </div>
            <?php
        }else{
           ?> 
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> No hay datos para mostrar
            </div>
        <?php    
        }
    }
?>
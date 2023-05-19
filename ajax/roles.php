<?php

    include "../config/config.php";//Contiene funcion que conecta a la base de datos
    
    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if (isset($_GET['id_rol'])){
        $id_expence=intval($_GET['id_rol']);
        $query=mysqli_query($con, "SELECT * from rol where id_rol='".$id_expence."'");
        $count=mysqli_num_rows($query);
            if ($delete1=mysqli_query($con,"DELETE FROM rol WHERE id_rol='".$id_expence."'")){
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
         $aColumns = array('id_rol', 'nombre_rol');//Columnas de busqueda
         $sTable = "rol";
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
        $sWhere.=" order by nombre_rol asc";
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
        $reload = './rol.php';
        //main query to fetch the data
        $sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);
        //loop through fetched data
        if ($numrows>0){
            
            ?>
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Rol </th>
                        <th class="column-title">Descripción </th>
                        <th class="column-title">Estado </th>                        
                        <th class="column-title text-center"><span class="nobr">Acciones</span></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        while ($r=mysqli_fetch_array($query)) {
                            $id=$r['id_rol'];
                            $status=$r['status_rol'];
                                if ($status==1){$status_f="Activo";}else {$status_f="Inactivo";}

                            $name=$r['nombre_rol'];
                            $description=$r['descripcion_rol'];                            
                            
                            /*$role=$r['rol_id'];
                            $sql = mysqli_query($con, "select * from rol where id_rol=$role");
                            if($c=mysqli_fetch_array($sql)) {
                                $name_rol=$c['nombre_rol'];
                            }*/
                ?>
                    <input type="hidden" value="<?php echo $name;?>" id="nombre_rol<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $description;?>" id="descripcion_rol<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $status;?>" id="status_rol<?php echo $id;?>">                    

                    <tr class="even pointer">
                        <td><?php echo $name;?></td>
                        <td><?php echo $description;?></td>
                        <td ><?php echo $status_f; ?></td>                        
                        <td ><span class="pull-right">
                        <a href="#" class='btn btn-default' title='Permisos' onclick="obtener_permisos('<?php echo $id;?>');" data-toggle="modal" data-target=".modalPermisos"><i class="fa fa-key" aria-hidden="true"></i></a>
                        <a href="#" class='btn btn-default' title='Editar Rol' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target=".bs-example-modal-lg-upd"><i class="glyphicon glyphicon-edit"></i></a> 
                        <a href="#" class='btn btn-default' title='Borrar Rol' onclick="eliminar('<?php echo $id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
                    </tr>
                <?php
                    } //end while
                ?>
                <tr>
                    <td colspan=6><span class="pull-right">
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
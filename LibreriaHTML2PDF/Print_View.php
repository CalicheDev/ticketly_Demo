<?php
       
    $query = mysqli_query($con, "select * from clientes where id_cliente=1");
    
    while ($row=mysqli_fetch_array($query)) {
        $nit = $row['Nit'];
        $name_Empresa = $row['name_Empresa'];
        $phone = $row['telefono'];
        $email = $row['email'];   
  
    }
?>  

<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
-->
</style>
<page backcolor="#FEFEFE" backimg="" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;time;page" style="font-size: 12pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 75%;">
            </td>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="./res/logo.gif" alt="Logo"><br>
                REPORTE TICKETS DE SOPORTE
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:10%;"></td>
            <td style="width:10%; ">Empresa :</td>
            <td style="width:26%"><?php echo $name_Empresa; ?></td>
        </tr>        
        <tr>
            <td style="width:10%;"></td>
            <td style="width:10%; ">Email :</td>
            <td style="width:26%"><?php echo $email; ?></td>
        </tr>
        <tr>
            <td style="width:10%;"></td>
            <td style="width:10%; ">Tel :</td>
            <td style="width:26%"><?php echo $phone; ?></td>
        </tr>
        <tr>
            <td style="width:10%;"></td>
            <td style="width:18%; ">Fecha: <?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    <br>
    
    <i>
        <b><u>UNDERLINE </u>: &laquo; Listado de solicitudes de soporte &raquo;</b><br>        
    </i>
    
    <br>
    A continuación se puede visualizar el listado de tickets radicados para soporte, con su respectivo estado y fecha de radicación<br>
    <br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; font-size: 10pt;">
        <colgroup>
            <col style="width: 10%; text-align: left">
            <col style="width: 27%; text-align: left">
            <col style="width: 10%; text-align: left">
            <col style="width: 15%; text-align: left">
            <col style="width: 10%; text-align: right">
            <col style="width: 12%; text-align: right">
            <col style="width: 14%; text-align: right">
        </colgroup>
        <thead>
            <tr style="background: #E7E7E7;">
                <th style="border-bottom: solid 1px black;">CÓDIGO</th>
                <th style="border-bottom: solid 1px black;">ASUNTO</th>
                <th style="border-bottom: solid 1px black;">TIPO</th>
                <th style="border-bottom: solid 1px black;">CATEGORÍA</th>
                <th style="border-bottom: solid 1px black;">PRIORIDAD</th>
                <th style="border-bottom: solid 1px black;">ESTADO</th>
                <th style="border-bottom: solid 1px black;">FECHA</th>
            </tr>
        </thead> 

        <tbody>
<?php
  
    $users= array();
                                        if((isset($_GET["status_id"]) && isset($_GET["kind_id"]) && isset($_GET["project_id"]) && isset($_GET["priority_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"]) ) && ($_GET["status_id"]!="" ||$_GET["kind_id"]!="" || $_GET["project_id"]!="" || $_GET["priority_id"]!="" || ($_GET["start_at"]!="" && $_GET["finish_at"]!="") ) ) {
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



                                        if($_GET["start_at"]!="" && $_GET["finish_at"]){
                                        if($_GET["status_id"]!=""||$_GET["project_id"]!="" ||$_GET["priority_id"]!="" ||$_GET["kind_id"]!="" ){
                                            $sql .= " and ";
                                        }

                                            $sql .= " ( date_at >= \"".$_GET["start_at"]."\" and date_at <= \"".$_GET["finish_at"]."\" ) ";
                                        }

                                                $users = mysqli_query($con, $sql);

                                        }else{
                                                $users = mysqli_query($con, "select * from ticket order by created_at desc");

                                        }
                                        
                                        ?>

<?php
         //end else
     //end if
?>

<?php
            $total = 0;
            foreach($users as $user){
                $ticket_id=$user['id'];
                //Primera forma para ver la fecha corta en el orden Dìa/Mes/Año
                $created_at=date('d/m/Y', strtotime($user['created_at']));
                //$project_id=$user['project_id'];
                $priority_id=$user['priority_id'];
                $kind_id=$user['kind_id'];
                $category_id=$user['category_id'];
                $status_id=$user['status_id'];
                $dates=$user['created_at'];


                $ticket=mysqli_query($con, "select * from ticket where id=$ticket_id");
                $status=mysqli_query($con, "select * from status where id=$status_id");
                $category=mysqli_query($con, "select * from category where id=$category_id");
                $kinds = mysqli_query($con,"select * from kind where id=$kind_id");
                //$project  = mysqli_query($con, "select * from project where id=$project_id");
                $medic = mysqli_query($con,"select * from priority where id=$priority_id");
                //Segunda forma para ver la fecha corta en el orden Año/Mes/Dìa
                /*$date=mysqli_query($con, "select DATE(created_at) AS fecha from ticket where id=$ticket_id");
                $row= mysqli_fetch_array($date);
                $fecht = $row['fecha'];*/ //Poner esta varible en el campo fecha para que muestre el formato corto

                
                ?>
                <tr>

                <td><?php echo $user['id'] ?></td>
                <?php foreach($ticket as $tickets){?>
                <?php } ?>
                <td><?php echo $user['title'] ?></td>
                
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
                <td><?php echo $created_at; ?></td>
                
                </tr>
             <?php  
                
                }

              ?> 
            <tr style="background: #E7E7E7;">
                <th colspan="6" style="border-top: solid 1px black; text-align: right;"></th>
                <th style="border-top: solid 1px black;"></th>
            </tr>
        </tbody>
    </table>
    
</page>
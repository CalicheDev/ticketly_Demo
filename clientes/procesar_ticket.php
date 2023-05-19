<?php
session_start();
/*Inicia validacion del lado del servidor*/
//include "../config/config.php";//Contiene funcion que conecta a la base de datos
global  $id_insert;


if (empty($_POST['title'])) {
    $errors[] = "Titulo vacío";
} else if (empty($_POST['description'])) {
    $errors[] = "Description vacío";
} else if (!empty($_POST['title']) && !empty($_POST['description'])) {
    require '../action/PHPMailer-5.2.11/PHPMailerAutoload.php';
    //include "../inc/links.php";
    //Contiene funcion que conecta a la base de datos
    include "../config/config.php";

    $title = $_POST["title"];
    $description = $_POST["description"];
    $cliente_id = $_POST["id_cliente"];
    $created_at = "NOW()";
    $mysqli = "";
    /* $category_id = $_POST["category_id"]; */
    /* $project_id = $_POST["project_id"]; */
    /* $priority_id = $_POST["priority_id"]; */
    /* $user_id = $_SESSION["user_id"]; */
    /* $status_id = $_POST["status_id"]; */
    /* $kind_id = $_POST["kind_id"]; */
    /* $asigned_id=$_POST["asigned_id"]; */
    //$profile_pic = $_POST["profile_pic"];

    // $user_id=$_SESSION['user_id'];

    $sql = "insert into ticket (title,description,cliente_id,created_at) value (\"$title\",\"$description\",\"$cliente_id\", $created_at)";

    $query_new_insert = mysqli_query($con, $sql);
    //Codigo ingresado Por Carlos Bejarano
    $id_insert = mysqli_insert_id($con);


    $sql_insert = mysqli_query($con, "SELECT * FROM ticket WHERE id= '$id_insert'");
    $reg = mysqli_fetch_array($sql_insert, MYSQLI_ASSOC);
    $cliente_id = $reg['cliente_id'];
    $stado_id = $reg['status_id'];
    $fecha = $reg['created_at'];
    $producto_id = $reg['project_id'];
    $detalle = $reg['description'];

    $sql2 = mysqli_query($con, "select * from clientes where id_cliente=$cliente_id");
    if ($c = mysqli_fetch_array($sql2)) {
        $email_cliente = $c['email'];
    }
    $sql2 = mysqli_query($con, "select * from status where id=$stado_id");
    if ($c = mysqli_fetch_array($sql2)) {
        $name_status = $c['status_name'];
    }
    $sql2 = mysqli_query($con, "select * from project where id=$producto_id");
    if ($c = mysqli_fetch_array($sql2)) {
        $name_proyect = $c['proyect_name'];
    }


    if (isset($_FILES["archivo"])) {
        //$id = $_POST['user_id'];
        $file = $_FILES["archivo"];
        $name = $file["name"];
        $type = $file["type"];
        $tmp_n = $file["tmp_name"];
        $size = $file["size"];
        $folder = "../images/multimedia/";

        if ($type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif' && $type != 'application/pdf') {
            echo "Error, el archivo no es valido";
        } else if ($size > 1048576 * 5) {
            echo "Error, el tamaño máximo permitido es de 5MB";
        } else {
            $src = $folder . $name;
            @move_uploaded_file($tmp_n, $src);


            //$query=mysqli_query($con, "UPDATE ticket set profile_pic=\"$name\" where id=\"$id_insert\"");

            $mysqli = mysqli_query($con, "insert into files_ticket (id_ticket, files_ticket_name) value (\"$id_insert\",\"$name\")");

            if ($mysqli) {
                //$messages[] = "El archvio se cargo Correctamente.";
                echo "<div class='alert alert-success' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
			            <strong>¡Bien hecho!</strong> El archvio se cargo Correctamente
					</div>";
            }
        }
    }
    //Aqui termina el codigo ingresado Por Carlos Bejarano


    if ($query_new_insert) {
        $messages[] = "Tu ticket ha sido ingresado satisfactoriamente.";


        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        //$mail->SMTPDebug = 2; //funcion para mostrar un log del proceso que se realiza al enviar el e-mail
        //$mail->Debugoutput = 'html'; //funcion para mostrar un log del proceso que se realiza al enviar el e-mail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->Username = 'soporte.hashnext@gmail.com'; //Correo de donde enviaremos los correos
        $mail->Password = 'BO8655127'; // Password de la cuenta de envío

        $mail->setFrom('soporte.hashnext@gmail.com', 'Equipo de Soporte');
        $mail->addAddress($email_cliente, 'Receptor'); //Correo receptor


        $mail->Subject = 'Estimado cliente su ticket fue ingresado ';
        $mail->Body = 'Cordial saludo,' . "\n" .
            '¡Gracias por reportarnos su incidencia! Buscaremos una solución para su producto lo mas pronto posible.' . "\n" .
            'DATOS DEL TICKET' . "\n" .
            'ID ticket:              	' . $id_insert . "\n" .
            'Estado del ticket:         ' . $name_status . "\n" .
            'Fecha de reporte:        ' . $fecha . "\n" .
            'Producto:                     ' . $name_proyect . "\n" .
            'Detelle de la solicitud: ' . $detalle;
        //$mail->AltBody = 	


        if ($mail->send()) {
            echo 'Correo Enviado';
        } else {
            echo 'Error al enviar correo';
        }
    } else {
        $errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($con);
    }
} else {
    $errors[] = "Error desconocido.";
}

if (isset($errors)) {

?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>
        <?php
        foreach ($errors as $error) {
            echo $error;
        }
        ?>
    </div>
<?php
}
if (isset($messages)) {

?>
    <!--<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>¡Bien hecho!</strong>
							<?php
                            foreach ($messages as $message) {
                                echo $message;
                            }
                            ?>
					</div>-->

    <div class="alert alert-info fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Bien hecho!</strong>
        <?php
        foreach ($messages as $message) {
            echo $message;
        }
        ?>
    </div>
<?php
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

<!--	
	<div>     
        <a href= "../tickets.php" class="btn btn-primary btn-sm pull-right" onClick= "tickets.php" ><i class="fa fa-reply">&nbsp;&nbsp;Volver a Tickets</a>
    </div>
-->
<?php

 //$conn = mysqli_connect("localhost","root","","ticketly");

	session_start();
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['title'])){
			$errors[] = "Titulo vacío";
		} else if (empty($_POST['detalle_atencion'])){
			$errors[] = "Detalle de la atencion vacío";
		}  else if (
			!empty($_POST['title']) &&
			!empty($_POST['detalle_atencion'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos
		$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_set_charset($mysqli, "utf8");

		$id = $_POST['mod_id'];
		$title = $_POST["title"];
		$created_at="NOW()";
		$detalle = $_POST["detalle_atencion"];		
		//$category_id = $_POST["category_id"];
		//$project_id = $_POST["project_id"];
		//$priority_id = $_POST["priority_id"];
		$user_id = $_SESSION["user_id"];
		$status_id = $_POST["status_id"];
		//$kind_id = $_POST["kind_id"];
		//$id=$_POST['mod_id'];
		$asigned_id=$_POST["asigned_id"];
		$causas = $_POST["id_causa_sop"];
		//$profile_pic = $_POST['profile_pic'];

		
		$sql= "insert into atencion (id_ticket,fecha_atencion,description,user_id,asigned_id,status_id, id_causa_sop) value(\"$id\",$created_at,\"$detalle\",$user_id,$asigned_id, $status_id, $causas)";
				
		$query_insert = mysqli_query($mysqli,$sql);
		
		//Codigo ingresado Por Carlos Bejarano
		//$resultado = @mysqli_insert_id($mysqli->$sql);
		//$id_insert = $id;
		$id_insert = mysqli_insert_id($mysqli);

		 if (isset($_FILES["archivo"]))
			{
			    //$id = $_POST['user_id'];
			    $file = $_FILES["archivo"];
			    $name = $file["name"];
			    $type = $file["type"];
			    $tmp_n = $file["tmp_name"];
			    $size = $file["size"];
			    $folder = "../images/soporte_multimedia/";
			    
			    if ($type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif' && $type != 'application/pdf')
			    {
			      echo "Error, el archivo no es valido"; 
			    }
			    else if ($size > 1048576 * 5)
			    {
			      echo "Error, el tamaño máximo permitido es de 5MB";
			    }
			    else
			    {
			        $src = $folder.$name;
			       @move_uploaded_file($tmp_n, $src);


			       $query=mysqli_query($mysqli, "UPDATE atencion set id_multimedia=\"$name\" where id_atencion=\"$id_insert\"");
			       if($query){
			        echo "<div class='alert alert-success' role='alert'>
			            <button type='button' class='close' data-dismiss='alert'>&times;</button>
			            <strong>¡Bien hecho!</strong> El archvio se cargo Correctamente
			        </div>";
			       }
			    }
			}
		//Aqui termina el codigo ingresado Por Carlos Bejarano

		
			if ($query_insert){

				$sql2 = "update ticket set title=\"$title\",status_id=\"$status_id\", asigned_id=\"$asigned_id\", updated_at=NOW() where id=$id";				
				$query_update = mysqli_query($con,$sql2);
				$messages[] = "El caso ha sido atendido satisfactoriamente.";
				//$messages[] = "El ticket ha sido actualizado satisfactoriamente. <br>";
				
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
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
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
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
			/*if($_FILES["archivo"]["error"]>0){

			echo "Error al cargar archivo";
		}else{
			$permitidos = array("image/jpg","image/jpeg" ,"image/png","application/pdf","image/gif");
			$limit_kb = 200;
			if (in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"]<=$limit_kb*1024) 
			{
				# code...
				$file = $_FILES["archivo"];
			    $name = $file["name"];

				$ruta = '../images/soporte_multimedia/'.$id_insert2.'/';

				$archivo = $ruta.$_FILES["archivo"]["name"];

				//Validamos con if si la ruta exixte sino que se cree la ruta para no tener ningun error.
				if(!file_exists($ruta)){
					mkdir($ruta);
				}	
				if(!file_exists($archivo)){
					$resultado=@move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);
					//$query=mysqli_query($con, "UPDATE ticket set profile_pic=\"$name\" where id=$id_insert");
					$query2=mysqli_query($con, "UPDATE atencion set id_multimedia=\"$name\" where id=$id_insert2");
					if ($resultado and $query2){
						echo "Archivo guardado";
						echo "<br>Archivo guardado en la Tabla Atención";
						echo "<br> Este es el ID del registro:  " .$id_insert2;						
					}else{
						echo "Error, No se guardo el archivo";
					}
				}
			}else{
				echo "Archivo no permitido o excede el tamaño maximo 2 MB";
			}
		}

			*/

?>

	<div> <!-- Modal -->
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="tickets.php"><i class="fa fa-plus-circle"></i> Atras</button>-->
        <a href= "../Tickets_en_proceso.php" class="btn btn-primary" onClick= "tickets.php" >Atras</a>
    </div>
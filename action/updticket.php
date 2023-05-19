<?php
	session_start();
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['title'])){
			$errors[] = "Titulo vacío";
		} else if (empty($_POST['description'])){
			$errors[] = "Description vacío";
		}  else if (
			!empty($_POST['title']) &&
			!empty($_POST['description'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos



		$title = $_POST["title"];
		$description = $_POST["description"];
		$category_id = $_POST["category_id"];
		$project_id = $_POST["project_id"];
		$priority_id = $_POST["priority_id"];
		$user_id = $_SESSION["user_id"];
		$status_id = $_POST["status_id"];
		$kind_id = $_POST["kind_id"];
		$id=$_POST["mod_id"];
		$asigned_id=$_POST["asigned_id"];
		$cliente_id=$_POST["cliente_id"];
		//$profile_pic = $_POST['profile_pic'];

		$sql = "update ticket set title=\"$title\",category_id=\"$category_id\",project_id=\"$project_id\",priority_id=\"$priority_id\",description=\"$description\",status_id=\"$status_id\", asigned_id=\"$asigned_id\",kind_id=\"$kind_id\", cliente_id=\"$cliente_id\", updated_at=NOW() where id=$id";

		$query_update = mysqli_query($con,$sql);
		//Codigo ingresado Por Carlos Bejarano
		//$id_insert = mysqli_insert_id($con);

		 if (isset($_FILES["archivo"]))
			{
			    //$id = $_POST['user_id'];
			    $file = $_FILES["archivo"];
			    $name = $file["name"];
			    $type = $file["type"];
			    $tmp_n = $file["tmp_name"];
			    $size = $file["size"];
			    $folder = "../images/multimedia/";
			    
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


			       //$query=mysqli_query($con, "UPDATE ticket set profile_pic=\"$name\" where id=\"$id\"");
			       $mysqli=mysqli_query($con, "insert into files_ticket (id_ticket, files_ticket_name) value (\"$id\",\"$name\")");
			       if($mysqli){
			        echo "<div class='alert alert-success' role='alert'>
			            <button type='button' class='close' data-dismiss='alert'>&times;</button>
			            <strong>¡Bien hecho!</strong> El archvio se actualizo Correctamente
			        </div>";
			       }
			    }
			}
		//Aqui termina el codigo ingresado Por Carlos Bejarano
		
			if ($query_update){
				$messages[] = "El ticket ha sido actualizado satisfactoriamente.";
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

				$ruta = '../images/multimedia/'.$id.'/';

				$archivo = $ruta.$_FILES["archivo"]["name"];

				//Validamos con if si la ruta exixte sino que se cree la ruta para no tener ningun error.
				if(!file_exists($ruta)){
					mkdir($ruta);
				}	
				if(!file_exists($archivo)){
					$resultado=@move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);
					$query=mysqli_query($con, "UPDATE ticket set profile_pic=\"$name\" where id=$id");
					if ($resultado and $query){
						echo "Archivo guardado";
						echo "<br>Archivo guardado en la Tabla Ticket";
						echo "<br> Este es el ID del registro:  " .$id;						
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
        <a href= "../tickets.php" class="btn btn-primary" onClick= "tickets.php" >Atras</a>
    </div>
<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	//include "../config/config.php";//Contiene funcion que conecta a la base de datos

	
	if (empty($_POST['title'])) {
           $errors[] = "Titulo vacío";				    
        } else if (empty($_POST['description'])){
			$errors[] = "Description vacío";
		} else if (!empty($_POST['title']) && !empty($_POST['description'])) 
{

include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$title = $_POST["title"];
		$description = $_POST["description"];
		$category_id = $_POST["category_id"];
		$project_id = $_POST["project_id"];
		$priority_id = $_POST["priority_id"];
		$user_id = $_SESSION["user_id"];
		$status_id = $_POST["status_id"];
		$kind_id = $_POST["kind_id"];
		$asigned_id=$_POST["asigned_id"];
		//$profile_pic = $_POST["profile_pic"];
		$created_at="NOW()";	

					
		// $user_id=$_SESSION['user_id'];

		$sql="insert into ticket (title,description,category_id,project_id,priority_id,user_id,asigned_id,status_id,kind_id,created_at) value (\"$title\",\"$description\",\"$category_id\",\"$project_id\",$priority_id,$user_id,$asigned_id,$status_id,$kind_id,$created_at) ";
		//$sql2=mysqli_query($con, "UPDATE ticket set profile_pic=\"$name\"");
		
		//$resultado = mysqli_query($con, $sql);
		//Codigo ingresado Por Carlos Bejarano
		if (isset($_FILES["archivo"]))
			{
			    $file = $_FILES["archivo"];
			    $name = $file["name"];
			    $type = $file["type"];
			    $tmp_n = $file["tmp_name"];
			    $size = $file["size"];
			    $folder = "../images/multimedia/";
			    $archivo =$folder.$_FILES["archivo"]["name"];
			    
			    if ($type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif')
			    {
			      echo "Error, el archivo no es una imagen"; 
			    }
			    else if ($size > 1024*1024)
			    {
			      echo "Error, el tamaño máximo permitido es un 1MB";
			    }
			    else
			    {

			        $src = $folder.$name;
			       //@move_uploaded_file($tmp_n, $src, $archivo);
			       @move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);

			       $query=mysqli_query($con, "UPDATE ticket set profile_pic=\"$name\" where id=$id");
			       if($query){
			        echo "<div class='alert alert-success' role='alert'>
			            <button type='button' class='close' data-dismiss='alert'>&times;</button>
			            <strong>¡Bien hecho!</strong> La imagen se agrego correctamente
			        </div>";
			       }
			    }
			} 
		//Aqui termina el codigo ingresado Por Carlos Bejarano

		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Tu ticket ha sido ingresado satisfactoriamente.";
				
			} else 	{
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
			
?>


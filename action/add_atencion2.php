<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	//include "../config/config.php";//Contiene funcion que conecta a la base de datos
global  $id_insert;	

	
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
		$mysqli = "";
		//$archivo = $_FILES["archivo"];
					
		// $user_id=$_SESSION['user_id'];

		$sql="insert into ticket (title,description,category_id,project_id,priority_id,user_id,asigned_id,status_id,kind_id,created_at) value (\"$title\",\"$description\",\"$category_id\",\"$project_id\",$priority_id,$user_id,$asigned_id,$status_id,$kind_id,$created_at)";
		
		//Codigo ingresado Por Carlos Bejarano
		//$resultado = @mysqli_insert_id($mysqli->$sql);
		//$resultado = mysqli_query($con,$sql);
		$id_insert= mysqli_query($con, "SELECT * from ticket where id=last_insert_id(id)");
		//$id_insert = @mysqli_insert_id($resultado);
		//$id_insert = $mysqli-> last_insert_id();
		//$last_id = ("Select id from ticket where id=last_insert_id(id)");
		//$id_insert = mysqli_query($last_id);
		/*$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    	if (isset($_GET['id'])){   
    		
		//$last_id=intval($_GET['id']);
        //$id_insert=mysqli_query($con, "SELECT * from ticket where id='".$last_id."'");
        $id_insert= mysqli_query($con, "SELECT * from ticket where id=last_insert_id()");

		}*/
		//@mysqli_insert_id();

		if($_FILES["archivo"]["error"]>0){

			echo "Error al cargar archivo";
		}else{
			$permitidos = array("image/jpg","image/jpeg" ,"image/png","application/pdf","image/gif");
			$limit_kb = 200;
			if (in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"]<=$limit_kb*1024) 
			{
				# code...
				$id_insert=intval($id_insert);
				//$ruta = "../images/multimedia/".$id_insert."/";
				//$ruta = '../images/multimedia/'.$id_insert.'/';
				//$ruta = '../images/multimedia/'.@mysqli_insert_id.'/';
				//$ruta = '../images/multimedia/'.$id.'/';
				$ruta = '../images/multimedia/'.$id_insert.'/';

				$archivo = $ruta.$_FILES["archivo"]["name"];

				//Validamos con if si la ruta exixte sino que se cree la ruta para no tener ningun error.
				if(!file_exists($ruta)){
					mkdir($ruta);
				}	
				if(!file_exists($archivo)){
					$resultado=@move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);
					if ($resultado){
						echo "Archivo guardado";
						echo "<br> Este es el ID del registro  " . $id_insert;						
					}else{
						echo "Error, No se guardo el archivo";
					}
				}
			}else{
				echo "Archivo no permitido o excede el tamaño maximo 2 MB";
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


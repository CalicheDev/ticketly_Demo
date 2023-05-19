<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['Nit'])) {
           $errors[] = "Nit de la empresa vacío";
        }else if (empty($_POST['name_Empresa'])){
			$errors[] = "Nombre de la empresa  vacío";
        }else if (empty($_POST['name_Representante'])){
			$errors[] = "Nombre del Representante Legal vacío";
		}else if (empty($_POST['telefono'])){
			$errors[] = "Telefono vacío";
		}else if (empty($_POST['email'])){
			$errors[] = "Correo Vacio vacío";		
		} else if ($_POST['status_cliente']==""){
			$errors[] = "Selecciona el estado";
		} /*else if (empty($_POST['password'])){
			$errors[] = "Contraseña vacío";
		} */
		  else if (
		  	!empty($_POST['Nit']) &&
			!empty($_POST['name_Empresa']) &&
			!empty($_POST['name_Representante']) &&
			!empty($_POST['telefono']) &&
			$_POST['status_cliente']!="" 			
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos
		
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nit=mysqli_real_escape_string($con,(strip_tags($_POST["Nit"],ENT_QUOTES)));
		$empresa=mysqli_real_escape_string($con,(strip_tags($_POST["name_Empresa"],ENT_QUOTES)));
		$represent=mysqli_real_escape_string($con,(strip_tags($_POST["name_Representante"],ENT_QUOTES)));
		$telefono=intval($_POST['telefono']);
		$email=$_POST["email"];
		//$Fecha_Ini_Contrato=$_POST["Fecha_Ini_Contrato"];
		//$Fecha_Fin_Contrato=$_POST["Fecha_Fin_Contrato"];		
		$Observaciones=$_POST["Observaciones"];
		//$Fecha_Ini_Servicio=$_POST["Fecha_Ini_Servicio"];
		//$Fecha_Fin_Servicio=$_POST["Fecha_Fin_Servicio"];
		$user_id = $_SESSION["user_id"];
		$asesor=mysqli_real_escape_string($con,(strip_tags($_POST["asigned_id"],ENT_QUOTES)));
		$status=intval($_POST['status_cliente']); 
		
		//$is_admin=0;
		//if(isset($_POST["is_admin"])){$is_admin=1;}
 
			$sql="INSERT INTO clientes (Nit, name_Empresa, name_Representante, telefono, email, Observaciones, user_id, asigned_id, is_active) VALUES ('$nit','$empresa', '$represent', '$telefono', '$email', '$Observaciones', '$user_id', '$asesor', $status)";
			$query_new_insert = mysqli_query($con,$sql);
				if ($query_new_insert){
					$messages[] = "El cliente ha sido ingresado satisfactoriamente.";
				} else{
					$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
				}
			
		}else{
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
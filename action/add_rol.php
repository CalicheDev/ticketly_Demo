<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre_rol'])) {
           $errors[] = "Nombre rol vacío";
        } else if (empty($_POST['descripcion_rol'])){
			$errors[] = "Descripción  vacía";
		} else if ($_POST['status_rol']==""){
			$errors[] = "Selecciona el estado";
		} else if (
			!empty($_POST['nombre_rol']) &&
			!empty($_POST['descripcion_rol']) &&
			$_POST['status_rol']!=""			
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		$name=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_rol"],ENT_QUOTES)));		
		$description=$_POST["descripcion_rol"];		
		$status=intval($_POST['status_rol']);
		//$role=mysqli_real_escape_string($con,(strip_tags($_POST["rol_id"],ENT_QUOTES)));		

		$is_admin=0;
		if(isset($_POST["is_admin"])){$is_admin=1;}

			$sql="INSERT INTO rol ( nombre_rol, descripcion_rol, status_rol) VALUES ('$name','$description',$status)";
			$query_new_insert = mysqli_query($con,$sql);
				if ($query_new_insert){
					$messages[] = "El rol ha sido ingresado satisfactoriamente.";
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
<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id_rol'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_nombre_rol'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['mod_descripcion_rol'])){
			$errors[] = "Descripción vacío";
		} else if (
			!empty($_POST['mod_nombre_rol']) &&
			!empty($_POST['mod_descripcion_rol'])
		){

		require_once "../config/config.php";//Contiene funcion que conecta a la base de datos

		$id=$_POST['mod_id_rol'];
		$name = $_POST["mod_nombre_rol"];
		$description = $_POST["mod_descripcion_rol"];

		$sql="update rol set nombre_rol=\"$name\",descripcion_rol=\"$description\" where id_rol=$id";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "EL rol ha sido actualizado satisfactoriamente.";
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

?>
<?php	

	//upd asesor by Carlos Bejarano
	session_start();

	if (empty($_POST['mod_username'])) {
           $errors[] = "Cargo del usuario vacío";
        }else if (empty($_POST['mod_name'])){
			$errors[] = "Nombre vacío";
		}else if ($_POST['mod_telefono']==""){
			$errors[] = "Telefono vacío";
		}else if (empty($_POST['mod_email'])){
			$errors[] = "Correo Vacio vacío";
		} else if ($_POST['mod_status']==""){
			$errors[] = "Selecciona el estado";
		}else if (
			!empty($_POST['mod_username']) &&
			!empty($_POST['mod_name']) &&
			$_POST['mod_telefono']!="" &&
			!empty($_POST['mod_email']) &&
			$_POST['mod_status']!=""
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$username=mysqli_real_escape_string($con,(strip_tags($_POST["mod_username"],ENT_QUOTES)));
		$name=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name"],ENT_QUOTES)));
		$telefono=intval($_POST['mod_telefono']);
		//$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["mod_telefono"],ENT_QUOTES)));
		$email=$_POST["mod_email"];
		//$password=mysqli_real_escape_string($con,(strip_tags(sha1(md5($_POST["password"])),ENT_QUOTES)));
		$status=intval($_POST['mod_status']);
		$id=$_POST['mod_id'];

		$sql="UPDATE asesor SET username=\"$username\", name=\"$name\", telefono=\"$telefono\", email=\"$email\",is_active=$status  WHERE id=$id";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Datos actualizados satisfactoriamente.";

				// update password by abisoft
				/*if($_POST["password"]!=""){
					$update_passwd=mysqli_query($con,"update user set password=\"$password\" where id=$id");
					if ($update_passwd) {
						$messages[] = " Y la Contraseña ah sido actualizada.";
					}
				}*/

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
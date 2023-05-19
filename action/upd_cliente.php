<?php	

	//upd cliente by Carlos Bejarano
	session_start();

		if (empty($_POST['mod_Nit'])) {
           $errors[] = "El nit no puede ir vacio";
        }else if (empty($_POST['mod_name_Empresa'])){
			$errors[] = "Nombre vacío";
		}else if ($_POST['mod_name_Representante']==""){
			$errors[] = "Representante vacío";
		}else if (empty($_POST['mod_telefono'])){
			$errors[] = "Telefono vacío";
		} else if ($_POST['mod_status_cliente']==""){
			$errors[] = "Selecciona el estado";
		}else if (
			!empty($_POST['mod_Nit']) &&
			!empty($_POST['mod_name_Empresa']) &&
			$_POST['mod_name_Representante']!="" &&
			!empty($_POST['mod_telefono']) &&
			$_POST['mod_status_cliente']!=""
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos				
		
		$nit=intval($_POST['mod_Nit']);
		$empresa=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name_Empresa"],ENT_QUOTES)));
		$represent=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name_Representante"],ENT_QUOTES)));
		$telefono=intval($_POST['mod_telefono']);
		$email = $_POST["mod_email"];			
		$Observaciones = $_POST["mod_Observaciones"];			
		$user_id = $_SESSION["user_id"];
		$asesor=$_POST["mod_asigned_id"];		
		$status=intval($_POST['mod_status_cliente']);
		$id=$_POST["mod_id_cliente"];

		
		$sql="UPDATE clientes SET Nit=\"$nit\",name_Empresa=\"$empresa\",name_Representante=\"$represent\",telefono=\"$telefono\",email=\"$email\",Observaciones=\"$Observaciones\",user_id=\"$user_id\",asigned_id=\"$asesor\",is_active=\"$status\"  WHERE id_cliente=$id";		
		
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Datos actualizados satisfactoriamente.";
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
		/*//$nit=$_POST["mod_Nit"];
		//$empresa = $_POST["mod_name_Empresa"];
		$nit=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Nit"],ENT_QUOTES)));
		$empresa=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name_Empresa"],ENT_QUOTES)));
		$represent=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name_Representante"],ENT_QUOTES)));
		$telefono=intval($_POST['mod_telefono']);
		$email=$_POST["mod_email"];
		$Fecha_Ini_Contrato=$_POST["mod_Fecha_Ini_Contrato"];
		$Fecha_Fin_Contrato=$_POST["mod_Fecha_Fin_Contrato"];		
		$Observaciones=$_POST["mod_Observaciones"];
		$Fecha_Ini_Servicio=$_POST["mod_Fecha_Ini_Servicio"];
		$Fecha_Fin_Servicio=$_POST["mod_Fecha_Fin_Servicio"];
		$user_id = $_SESSION["user_id"];
		//$status=$_POST["mod_status_cliente"];
		$asesor=mysqli_real_escape_string($con,(strip_tags($_POST["mod_asigned_id"],ENT_QUOTES)));
		$status=$_POST["mod_status_cliente"];
		//$Fecha_Ini_Contrato = $_POST["mod_Fecha_Ini_Contrato"];	
		//$Fecha_Ini_Contrato=date('Y-m-d H:i:s', $_POST["mod_Fecha_Ini_Contrato"]);
		//$Fecha_Fin_Contrato = $_POST["mod_Fecha_Fin_Contrato"];	
		//$Fecha_Fin_Contrato=date('Y-m-d H:i:s', $_POST["mod_Fecha_Fin_Contrato"]);
		//$Fecha_Ini_Servicio = $_POST["mod_Fecha_Ini_Servicio"];
		//$Fecha_Ini_Servicio=date('Y-m-d H:i:s', $_POST["mod_Fecha_Ini_Servicio"]);
		//$Fecha_Fin_Servicio = $_POST["mod_Fecha_Fin_Servicio"];	
		//$Fecha_Fin_Servicio=date('Y-m-d H:i:s', $_POST["mod_Fecha_Fin_Servicio"]);	*/	

		//$sql="UPDATE asesor SET username=\"$nit\", name=\"$name\", telefono=\"$telefono\", email=\"$email\",is_active=$status  WHERE id=$id";
		/*$sql="UPDATE clientes SET Nit=\"$nit\",name_Empresa=\"$empresa\",name_Representante=\"$represent\",telefono=\"$telefono\",email=\"$email\",Fecha_Ini_Contrato=\"$Fecha_Ini_Contrato\",Fecha_Fin_Contrato=\"$Fecha_Fin_Contrato\",Observaciones=\"$Observaciones\",
		  Fecha_Ini_Servicio=\"$Fecha_Ini_Servicio\",Fecha_Fin_Servicio=\"$Fecha_Fin_Servicio\",user_id=\"$user_id\",asigned_id=\"$asesor\",is_active=\"$status\"  WHERE id_cliente=$id"; */

		  //$sql = "UPDATE clientes SET is_active=1 WHERE id_cliente=$id";
		 
		//$sql="UPDATE clientes SET (Nit, name_Empresa, name_Representante, telefono, email, Fecha_Ini_Contrato, Fecha_Fin_Contrato, Observaciones, Fecha_Ini_Servicio, Fecha_Fin_Servicio, asigned_id, is_active) VALUES ('$nit','$empresa', '$represent', '$telefono', '$email', '$Fecha_Ini_Contrato', '$Fecha_Fin_Contrato', '$Observaciones', '$Fecha_Ini_Servicio', '$Fecha_Fin_Servicio', '$asesor', $status) WHERE id_cliente=$id";
		//$sql2= "UPDATE clientes SET telefono=\"$telefono\",user_id=\"$user_id\",is_active=\"$status\" WHERE id_cliente=$id";

?>


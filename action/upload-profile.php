<?php
    session_start();
    include "../config/config.php";
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: index.php");
    }
?>
<?php 
    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        //$username = $row['username'];
        //$name = $row['name'];
        //$email = $row['email'];
        //$profile_pic = $row['profile_pic'];
        //$created_at = $row['created_at'];
  
    }


//include "../config/config.php";

if (isset($_FILES["file"]))
{
    //$id = $_POST['user_id'];
    $file = $_FILES["file"];
    $name = $file["name"];
    $type = $file["type"];
    $tmp_n = $file["tmp_name"];
    $size = $file["size"];
    $folder = "../images/profiles/";
    
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
       @move_uploaded_file($tmp_n, $src);


       $query=mysqli_query($con, "UPDATE user set profile_pic=\"$name\" where id=\"$id\"");
       if($query){
        echo "<div class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>¡Bien hecho!</strong> Perfil Actualizado Correctamente
        </div>";
       }
    }
}

?>
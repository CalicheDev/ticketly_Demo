<?php
session_start();

  $nombre= $_POST['nombre'];
  $imagen= addcslashes(file_get_contents($_FILES['file']['tmp_name']));

  $query=mysqli_query($con, "INSERT INTO ticket set profile_pic=\"$imagen\"");

  if($query){
    echo "La imagen fue insertada";
  }else{
    echo "No guardo imagen";
  }

?>


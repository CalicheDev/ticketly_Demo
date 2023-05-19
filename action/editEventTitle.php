<?php
// Conexion a la base de datos
include "../config/config.php";//Contiene funcion que conecta a la base de datos
if (isset($_POST['delete']) && isset($_POST['id'])){
    
    
    $id = $_POST['id'];
    
    $sql = "DELETE FROM events WHERE id = $id";
    $query = $con->prepare( $sql );
    if ($query == false) {
     print_r($con->errorInfo());
     die ('Error en la funciòn prepare');
    }
    $res = $query->execute();
    if ($res == false) {
     print_r($query->errorInfo());
     die ('Error en la funciòn execute');
    }
    
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $color = $_POST['color'];
    
    $sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";

    
    $query = $con->prepare( $sql );
    if ($query == false) {
     print_r($con->errorInfo());
     die ('Error en la funciòn prepare');
    }
    $sth = $query->execute();
    if ($sth == false) {
     print_r($query->errorInfo());
     die ('Error en la funciòn execute');
    }

}
//header('Location: index.php');
header('Location: '.$_SERVER['HTTP_REFERER']);

    
?>
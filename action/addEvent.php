<?php

// Conexion a la base de datos
include "../config/config.php";//Contiene funcion que conecta a la base de datos

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
    
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $color = $_POST['color'];

    $sql = "INSERT INTO events (title, start, end, color) values ('$title', '$start', '$end', '$color')";
    
    echo $sql;
    
    $query = $con->prepare( $sql );
    if ($query == false) {
     print_r($con->errorInfo());
     die ('Erreur prepare');
    }
    $sth = $query->execute();
    if ($sth == false) {
     print_r($query->errorInfo());
     die ('Erreur execute');
    }

}
header('Location: '.$_SERVER['HTTP_REFERER']);

    
?>
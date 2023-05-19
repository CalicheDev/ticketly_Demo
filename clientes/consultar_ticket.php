<?php
include "../config/config.php"; 

if(isset($_POST['numero_ticket']) && !empty($_POST['numero_ticket'])){
    $numeroTicket = mysqli_real_escape_string($con, $_POST['numero_ticket']);
    
    /* $sql = "SELECT status_id FROM ticket WHERE id = $numeroTicket"; */
    $sql = "SELECT t.status_id, s.status_name as status FROM ticket t INNER JOIN status s ON t.status_id = s.id WHERE t.id = $numeroTicket";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $estado = $row['status'];
        echo json_encode(array('estado' => $estado));
    } else {
        echo json_encode(array('error' => 'Error en la consulta: ' . mysqli_error($con)));
    }

    mysqli_close($con);
}
?>

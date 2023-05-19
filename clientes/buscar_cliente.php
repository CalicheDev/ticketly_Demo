<?php
include "../config/config.php"; 

if(isset($_POST['nit_cliente']) && !empty($_POST['nit_cliente'])){
    $clienteNit = mysqli_real_escape_string($con, $_POST['nit_cliente']);
    
    $sql = "SELECT id_cliente, Nit, name_Empresa as cliente FROM clientes WHERE Nit = '$clienteNit'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id_cliente'];
        $nit = $row['Nit'];
        $estado = $row['cliente'];
        echo json_encode(array('estado' => $estado, 'id'=>$id));
    } else {
        echo json_encode(array('error' => 'Error en la consulta: ' . mysqli_error($con)));
    }

    mysqli_close($con);
}
?>

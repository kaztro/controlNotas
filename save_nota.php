<?php

include("db.php");

if(isset($_POST['save_nota'])) {
    $id_estudiante = intval($_POST['id_estudiante']);
    $id_materia = intval($_POST['id_materia']);
    $promedio = $_POST['promedio'];

    $query = "INSERT INTO NOTA(id_estudiante, id_materia, promedio) VALUES ($id_estudiante, $id_materia, '$promedio')";

    $result = mysqli_query($connection, $query);    

    if(!$result) {
        die("Query Failed");
    } 
    
    $_SESSION['message'] = 'Promedio almacenado con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: notas.php");

}

?>
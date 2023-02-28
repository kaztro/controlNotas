<?php

include("db.php");

if(isset($_POST['save_nota'])) {
    $id_estudiante = intval($_POST['id_estudiante']);
    $id_materia = intval($_POST['id_materia']);
    $nota = $_POST['nota'];

    $query = "INSERT INTO NOTA(id_estudiante, id_materia, nota) VALUES ($id_estudiante, $id_materia, '$nota')";

    $result = mysqli_query($connection, $query);    

    if(!$result) {
        die("Query Failed");
    } 
    
    $_SESSION['message'] = 'Nota almacenado con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: notas.php");

}

?>
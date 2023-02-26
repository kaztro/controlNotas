<?php

include("db.php");

if(isset($_POST['save_materia'])) {
    $codigo = $_POST['codigo'];
    $materia = $_POST['materia'];

    $query = "INSERT INTO MATERIA(codigo, materia) VALUES ('$codigo', '$materia')";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query Failed");
    } 
    
    $_SESSION['message'] = 'Materia almacenada con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: materias.php");

}

?>
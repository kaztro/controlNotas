<?php

include("db.php");

if(isset($_POST['save_grado'])) {
    $grado = $_POST['grado'];

    $query = "INSERT INTO GRADO(grado) VALUES ('$grado')";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query Failed");
    } 
    
    $_SESSION['message'] = 'Grado almacenado con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: grados.php");

}

?>
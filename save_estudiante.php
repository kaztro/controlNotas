<?php

include("db.php");

if(isset($_POST['save_estudiante'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_grado = intval($_POST['id_grado']);
    
    $query = "INSERT INTO ESTUDIANTE(nombre, apellido, codigo, id_grado) VALUES ('$nombre', '$apellido', '$codigo',  $id_grado)";

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query Failed");
    } 
    
    $_SESSION['message'] = 'Usuario almacenado con éxito';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}

?>
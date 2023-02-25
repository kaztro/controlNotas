<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM ESTUDIANTE WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Estudiante Eliminado Con Éxito';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }

?>
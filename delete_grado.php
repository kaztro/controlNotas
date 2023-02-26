<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM GRADO WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Grado Eliminado Con Éxito';
        $_SESSION['message_type'] = 'danger';
        header("Location: grados.php");
    }

?>
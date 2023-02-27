<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM NOTA WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Registro De Nota Eliminado Con Éxito';
        $_SESSION['message_type'] = 'danger';
        header("Location: notas.php");
    }

?>
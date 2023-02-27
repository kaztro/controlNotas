<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM GRADO WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $grado = $row['grado'];
        }
    }

    if(isset($_POST['update_grado'])) {
        $id = $_GET['id'];
        $grado = $_POST['grado'];

        $query = "UPDATE GRADO SET grado = '$grado' WHERE id = '$id'";
        
        mysqli_query($connection, $query);

        $_SESSION['message'] = 'Grado Actualizado Con Éxito';
        $_SESSION['message_type'] = 'info';
        header("Location: grados.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_grado.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Grado</span>
                        <input type="text" name="grado" class="form-control" value="<?php echo $grado; ?>">
                    </div>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-success btn-block" name="update_grado">Actualizar</button>
                        <a href="grados.php" class="btn btn-secondary btn-block">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
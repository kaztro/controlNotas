<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM MATERIA WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $codigo = $row['codigo'];
            $materia = $row['materia'];
        }
    }

    if(isset($_POST['update_materia'])) {
        $id = $_GET['id'];
        $codigo = $_POST['codigo'];
        $materia = $_POST['materia'];

        $query = "UPDATE MATERIA SET codigo = '$codigo', materia = '$materia' WHERE id = '$id'";
        
        mysqli_query($connection, $query);

        $_SESSION['message'] = 'Materia Actualizada Con Éxito';
        $_SESSION['message_type'] = 'info';
        header("Location: materias.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_materia.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="codigo" class="form-control"
                        placeholder="Código" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="materia" class="form-control"
                        placeholder="Materia">
                    </div>
                    <button class="btn btn-success btn-block" name="update_materia">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
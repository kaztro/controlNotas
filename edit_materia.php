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
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Código</span>
                        <input type="text" name="codigo" class="form-control" value="<?php echo $codigo; ?>" autofocus>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Materia</span>
                        <input type="text" name="materia" class="form-control" value="<?php echo $materia; ?>">
                    </div>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-success btn-block" name="update_materia">Actualizar</button>
                        <a href="materias.php" class="btn btn-secondary btn-block">Volver</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
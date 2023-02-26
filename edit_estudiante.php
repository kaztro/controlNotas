<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM ESTUDIANTE WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $codigo = $row['codigo'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $id_grado = $row['id_grado'];
        }
    }

    if(isset($_POST['update_estudiante'])) {
        $id = $_GET['id'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_grado = $_POST['id_grado'];

        $query = "UPDATE ESTUDIANTE SET codigo = '$codigo', nombre = '$nombre', apellido = '$apellido', id_grado = $id_grado WHERE id = '$id'";
        
        mysqli_query($connection, $query);

        $_SESSION['message'] = 'Estudiante Actualizado Con Éxito';
        $_SESSION['message_type'] = 'info';
        header("Location: index.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_estudiante.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="codigo" class="form-control" value="<?php echo $codigo; ?>"
                        placeholder="Actualizar cogigo" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>"
                        placeholder="Actualizar nombre" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="apellido" class="form-control" value="<?php echo $apellido; ?>"
                        placeholder="Actualizar apellido" autofocus>
                    </div>
                    <div class="form-floating">
                        <select class="select form-select" name="id_grado" aria-label="Floating label select example" id="floatingSelect">
                            <?php
                                $queryAllLevels = "SELECT * FROM GRADO";
                                $all_levels = mysqli_query($connection, $queryAllLevels);  

                                while($row = mysqli_fetch_array($all_levels)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['grado'] ?></option>
                                <?php } ?> 
                            
                        </select>
                        <label for="floatingSelect">Grado del estudiante</label>
                    </div>
                    <button class="btn btn-success btn-block" name="update_estudiante">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
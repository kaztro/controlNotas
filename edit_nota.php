<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM NOTA WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id_estudiante = $row['id_estudiante'];
            $id_materia = $row['id_materia'];
            $promedio = $row['promedio'];
        }
    }

    if(isset($_POST['update_nota'])) {
        $id = $_GET['id'];
        $id_estudiante = $_POST['id_estudiante'];
        $id_materia = $_POST['id_materia'];
        $promedio = $_POST['promedio'];

        $query = "UPDATE NOTA SET id_estudiante = $id_estudiante, id_materia = $id_materia, promedio = '$promedio' WHERE id = '$id'";
        
        mysqli_query($connection, $query);

        $_SESSION['message'] = 'Nota Actualizada Con Éxito';
        $_SESSION['message_type'] = 'info';
        header("Location: notas.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_nota.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-floating">
                        <select class="select form-select" name="id_estudiante" aria-label="Floating label select example" id="floatingSelectStudent">
                            <?php
                                $queryAllStudents = "SELECT * FROM ESTUDIANTE";
                                $all_students = mysqli_query($connection, $queryAllStudents);  

                                $selectedStudentName = "SELECT nombre, apellido FROM ESTUDIANTE WHERE id = '$id_estudiante'";
                                $selected = mysqli_query($connection, $selectedStudentName);

                                while($row = mysqli_fetch_array($selected)) {
                                    $estudianteSeleccionado = $row['nombre'] . " " . $row['apellido']; ?>

                                    <option value="<?php echo $id_estudiante ?>"><?php echo $estudianteSeleccionado ?></option>
                                <?php } 

                                while($row = mysqli_fetch_array($all_students)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php 
                                        if($row['nombre'] . " " . $row['apellido'] == $estudianteSeleccionado) {
                                            continue;
                                        } else {
                                            echo $row['nombre'] . " " . $row['apellido'];
                                        }
                                    ?></option>
                                <?php } ?> 
                            
                        </select>
                        <label for="floatingSelectStudent">Selecciona un estudiante</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="select form-select" name="id_materia" aria-label="Floating label select example" id="floatingSelectCourse">
                            <?php
                                $queryAllCourses = "SELECT * FROM MATERIA";
                                $all_levels = mysqli_query($connection, $queryAllCourses);  
                                
                                $selectedCourses = "SELECT materia FROM MATERIA WHERE id = '$id_materia'";
                                $selected = mysqli_query($connection, $selectedCourses);

                                while($row = mysqli_fetch_array($selected)) {
                                    $materiaSeleccionado = $row['materia']; ?>

                                    <option value="<?php echo $id_materia ?>"><?php echo $materiaSeleccionado ?></option>
                                <?php }

                                while($row = mysqli_fetch_array($all_levels)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php 
                                        if($row['materia'] == $materiaSeleccionado) {
                                            continue;
                                        } else {
                                            echo $row['materia'];
                                        }
                                    ?></option>
                                <?php } ?>
                        </select>
                        <label for="floatingSelectCourse">Selecciona una materia</label>
                    </div>
                    <br>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Promedio</span>
                        <input type="text" name="promedio" class="form-control" value="<?php echo $promedio; ?>"
                        placeholder="Promedio" autofocus>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-success btn-block" name="update_nota">Actualizar</button>
                        <a href="notas.php" class="btn btn-secondary btn-block">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
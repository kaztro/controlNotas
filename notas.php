<?php include("db.php") ?>
<?php include("includes/header.php")?>

<div class="container p-4">
    
<div class="row">

        <div class="col-md-4">
            
            <?php if(isset($_SESSION['message'])) {  ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?>

            <div class="card card-body">
                <form action="save_nota.php" method="POST">
                    <div class="form-floating">
                        <select class="select form-select" name="id_estudiante" aria-label="Floating label select example" id="floatingSelectStudent" autofocus>
                            <?php
                                $queryAllStudents = "SELECT * FROM ESTUDIANTE";
                                $all_students = mysqli_query($connection, $queryAllStudents);  

                                while($row = mysqli_fetch_array($all_students)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['codigo'] . " | " . $row['nombre'] . " " . $row['apellido'] ?></option>
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

                                while($row = mysqli_fetch_array($all_levels)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['codigo'] . " | " . $row['materia'] ?></option>
                                <?php } ?>
                        </select>
                        <label for="floatingSelectCourse">Selecciona una materia</label>
                    </div>
                    <br>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nota</span>
                        <input type="text" name="nota" class="form-control"
                        placeholder="10">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_nota" value="Guardar">
                </form>
            </div>
        
        </div>
        
        <div class="col-md-8 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Nota</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $queryResult = "SELECT n.id as id, e.nombre, e.apellido, m.materia, n.nota, e.id as e_id FROM ESTUDIANTE AS e INNER JOIN NOTA AS n ON e.id = n.id_estudiante INNER JOIN MATERIA AS m ON m.id = n.id_materia";
                        $grades = mysqli_query($connection, $queryResult);

                        while($row = mysqli_fetch_array($grades)) { ?>
                            <tr>
                                <td><?php echo $row['nombre'] . " " . $row['apellido'] ?></td>
                                <td><?php echo $row['materia'] ?></td>
                                <td><?php echo $row['nota'] ?></td>
                                <td>
                                    <a href="edit_nota.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a> 
                                    <a href="delete_nota.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="resultados.php?id=<?php echo $row['e_id'] ?>" class="btn btn-secondary">
                                        <i class="fas fa-info"></i>
                                    </a> 
                                </td>
                            </tr>
                    <?php } ?>
                        
                </tbody>
            </table>
        </div>
    
    </div>

</div>

<?php include("includes/footer.php") ?>
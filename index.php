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
                <form action="save_estudiante.php" method="POST">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Código</span>
                        <input type="text" name="codigo" class="form-control"
                        placeholder="00229017" autofocus>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                        <input type="text" name="nombre" class="form-control"
                        placeholder="German">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Apellido</span>
                        <input type="text" name="apellido" class="form-control"
                        placeholder="Castro">
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
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="save_estudiante" value="Guardar">
                </form>
            </div>
        
        </div>
        
        <div class="col-md-8 table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM ESTUDIANTE";
                        $all_students = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($all_students)) { ?>
                            <tr>
                                <td><?php echo $row['codigo'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['apellido'] ?></td>
                                <td>
                                    <a href="edit_estudiante.php?id=<?php echo $row['id']?>"
                                    class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete_estudiante.php?id=<?php echo $row['id']?>"
                                    class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
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
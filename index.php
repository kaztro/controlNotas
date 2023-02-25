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
                    <div class="mb-3">
                        <input type="text" name="codigo" class="form-control"
                        placeholder="Codigo del estudiante" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="nombre" class="form-control"
                        placeholder="Nombre del estudiante">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="apellido" class="form-control"
                        placeholder="Apellido del estudiante">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_estudiante" value="Guardar">
                </form>
            </div>
        
        </div>
        
        <div class="col-md-8">
            <table class="table table-bordered">
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
                                    class="btn btn-secondary">
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
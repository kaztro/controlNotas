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
                <form action="save_materia.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="codigo" class="form-control"
                        placeholder="Código" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="materia" class="form-control"
                        placeholder="Materia">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_materia" value="Guardar">
                </form>
            </div>
        
        </div>
        
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Materia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM MATERIA";
                        $all_level = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($all_level)) { ?>
                            <tr>
                                <td><?php echo $row['codigo'] ?></td>
                                <td><?php echo $row['materia'] ?></td>
                                <td>
                                    <a href="edit_materia.php?id=<?php echo $row['id']?>"
                                    class="btn btn-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete_materia.php?id=<?php echo $row['id']?>"
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
<?php include("db.php") ?>

<?php include("includes/header.php")?>

<br>
<div class="container-p4">
    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card" id="printMe">
    <div class="card-header">
        Tabla de Resultados
    </div>
    <div class="card-body">
    <?php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $infoQuery = "SELECT e.nombre AS nombre, e.apellido AS apellido, e.codigo AS codigo, g.grado AS grado FROM GRADO AS g INNER JOIN ESTUDIANTE AS e  ON e.id_grado = g.id INNER JOIN NOTA AS n ON e.id = n.id_estudiante INNER JOIN MATERIA AS m ON m.id = n.id_materia WHERE e.id = $id";            
        $studentInfo = mysqli_query($connection, $infoQuery);
        ?>

    <?php
        $row = mysqli_fetch_array($studentInfo) ?>
        <div class="d-inline p-2 fw-bolder fs-6">Estudiante: </div>
        <div class="d-inline p-2 fs-6 font-monospace text-uppercase"><?php echo $row['codigo'] . " | " . $row['nombre'] . " " . $row['apellido'] ?></div>
        <br>
        <div class="d-inline p-2 fw-bolder fs-6">Grado:</div>
        <div class="d-inline p-2 fs-6 font-monospace text-uppercase"><?php echo $row['grado'] ?></div>

        <div class="col-md-8 table-responsive">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>Código de materia</th>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT m.codigo AS codigo, m.materia AS materia, n.nota AS nota FROM ESTUDIANTE AS e INNER JOIN NOTA AS n ON e.id = n.id_estudiante INNER JOIN MATERIA AS m ON m.id = n.id_materia WHERE e.id = $id";            
                    $result = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_array($result)) {?>
                        <tr>
                            <td><?php echo $row['codigo'] ?></td>
                            <td><?php echo $row['materia'] ?></td>
                            <td><?php echo $row['nota'] ?></td>
                        </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php
                    $avgQuery = "SELECT AVG(nota) as promedio FROM ESTUDIANTE AS e INNER JOIN NOTA AS n ON e.id = n.id_estudiante INNER JOIN MATERIA AS m ON m.id = n.id_materia WHERE e.id = $id";
                    $avgResult = mysqli_query($connection, $avgQuery);

                    while($row = mysqli_fetch_array($avgResult)) {?>
                        <tr>
                            <td></td>
                            <th>Promedio:</th>
                            <th><?php echo $row['promedio'] ?></th>
                        </tr>
            <?php   }?>    
        </tfoot>
        </table>
        </div>
    </div>
</div>
<br>
<a href="javascript:imprSelec('printMe')" class="btn btn-primary">
    <li class="fas fa-print"> Imprimir</li>
</a>
        </div>
    </div>
</div>

<script>
   function imprSelec(nombre) {
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}
</script>

<?php include("includes/footer.php") ?>
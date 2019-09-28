<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datos Carros</title>
</head>
<body>
Esto es una prueba
<?php
require_once ('../../model/datoscarros.php');
require_once ('../../funciones/funciones.php');
?>
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id. Backup</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Duracion</th>
                    <th>Tamao</th>
                    <th>Salary</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id. Backup</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Duracion</th>
                    <th>Tamao</th>
                    <th>Salary</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $datos=new Datoscarros();
                $datos->obtenerdatos();

                foreach ($datos->resultado as $registro){
               // $tamanyo=number_format($registro['size_fs']);
                echo "<tr>";
                    echo "<td>" . $registro['id_cart'] . "</td>";
    /*                echo "<td>" . $registro['fx_inicio'] . "</td>";
                    echo "<td>" . $registro['fx_fin'] . "</td>";
                    echo "<td>" . $registro['duracion'] . "</td>";
                    echo "<td>" . $tamanyo. "</td>";
                    echo "<td>" . "</td>";*/
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © Vicsoft 2019</span>
        </div>
    </div>
</footer>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
aqui acaba el body
</body>
</html>

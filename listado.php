<?php include "includes/connection.php" ?>
<?php
session_start();
$sql = "Select * FROM images";
$result = $link->query($sql);

$result->bindColumn('id', $id);
$result->bindColumn('author_id', $author_id);
$result->bindColumn('name', $name);
$result->bindColumn('file', $file);
$result->bindColumn('enabled', $enabled);
$result->bindColumn('created', $created);
$count = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include "includes/navBar.php" ?>
    <?php include "includes/tables.php" ?>
</head>

<body>
    <div class="menu">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php">Galeria de Fotos</a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="listado.php"><span class="glyphicon"></span> Listado</a></li>
                    <li><a href="listadoAutores.php"><span class="glyphicon"></span> Listado de Autores</a></li>
                    <li><a href="subida.php"><span class="glyphicon"></span> Subir Imagen</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br><br>
    <br><br>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Listado de <b>Fotos</b></h2>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Autor</th>
                        <th>Nombre del Fichero</th>
                        <th>Fichero</th>
                        <th>Activo</th>
                        <th>Creado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                    if (count($count) > 0) {
                        while ($result->fetch(PDO::FETCH_BOUND)) :
                    ?>
                            <tr>
                                <td><?= $author_id ?></td>
                                <td><?= $name ?></td>
                                <td><?= $file ?></td>
                                <td style="text-align: center;"><?php
                                                                if ($enabled == 0 && $id) {
                                                                    echo "<img src='https://emojitool.com/img/apple/ios-15.4/white-circle-1454.png' width='30px' height='30px'>";
                                                                } else {
                                                                    echo "<img src='https://emojitool.com/img/apple/ios-15.4/large-blue-circle-543.png' width='30px' height='30px'>";
                                                                }
                                                                ?></td>
                                <td><?= $created ?></td>
                                <td style="text-align: center;">
                                    <form method="POST">
                                        <a class="delete" title="Delete" data-toggle="tooltip" href="listado.php"><i class="material-icons"><button type="submit" name="delete" value='<?= $id ?>'></button></i></a>
                                    </form>
                                </td>
                            </tr>
                    <?php endwhile;
                    } else {
                        echo "<tr><td colspan='7' style='text-align: center;'>No hay se han añadido fotos</td></tr>";
                    } ?>
            </table>
        </div>
    </div>

</body>

</html>
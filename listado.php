<?php include "includes/connection.php" ?>
<?php
if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    header("Location: modificacion.php");
} else if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql2 = "DELETE FROM images WHERE id=$id";

    $link->exec($sql2);
    
    header("Location: listado.php");
}

$sql = "SELECT A.name, I.id, file, I.enabled, I.created FROM authors A JOIN images I ON A.id = I.author_id;";
$result = $link->query($sql);

$result->bindColumn('id', $id);
$result->bindColumn('name', $authorName);
$result->bindColumn('file', $file);
$result->bindColumn('enabled', $enabled);
$result->bindColumn('created', $created);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
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

                    while ($result->fetch(PDO::FETCH_BOUND)) :
                    ?>
                        <tr>
                            <td><?= $authorName ?></td>
                            <td><?= $file ?></td>
                            <td style="text-align: center;">
                                <?php
                                if ($enabled == 0 && $id) {
                                    echo "<img src='https://emojitool.com/img/apple/ios-15.4/white-circle-1454.png' width='30px' height='30px'>";
                                } else {
                                    echo "<img src='https://emojitool.com/img/apple/ios-15.4/large-blue-circle-543.png' width='30px' height='30px'>";
                                }
                                ?></td>
                            <td><?= $created ?></td>
                            <form method="Post">
                                <td style="text-align: center;">
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"><button type="submit" name="edit" value='<?= $id ?>'></button></i></a>
                                </td>
                                <td style="text-align: center;">
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"><button type="submit" name="delete" value='<?= $id ?>'></button></i></a>
                                </td>
                            </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
            </table>
        </div>
    </div>

</body>

</html>
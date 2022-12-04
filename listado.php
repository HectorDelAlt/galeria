<?php include "includes/connection.php" ?>
<?php

//consulta de eliminar
$success = false;
if(isset($_GET['delete'])){
    $delete = "DELETE FROM images WHERE id=?";
    $stmt = $link->prepare($delete);
    if($stmt->execute([$_GET['delete']])){
        $success = true;
    }
}

//consulta para mostrar listado
$sql = "SELECT * FROM images";
$result = $link->query($sql);

$result->bindColumn('id', $id);
$result->bindColumn('author_id', $author_id);
$result->bindColumn('name', $name);
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
                    if ($result->rowCount() > 0) {
                        while ($result->fetch()):
                            $sql2 = "SELECT name FROM authors WHERE id =" . $author_id;
                            $result2 = $link->query($sql2);
                            $result2->bindColumn('name', $author_name);
                            $result2->fetch();
                    ?>
                    
                            <tr>
                                <td><?= $author_name ?></td>
                                <td><?= $name ?></td>
                                <td><?= $file ?></td>
                                <td style="text-align: center;"><?php
                                                                if ($enabled == 0 && $id) {
                                                                    echo "<img src='https://emojitool.com/img/apple/ios-15.4/white-circle-1454.png' width='30px' height='30px'>";
                                                                } else {
                                                                    echo "<img src='https://emojitool.com/img/apple/ios-15.4/large-blue-circle-543.png' width='30px' height='30px'>";
                                                                }
                                                                ?></td>
                                <td><?= date('d/m/Y H:s:i', strtotime($created)) ?></td>
                                <td style="text-align: center;">
                                    <a class="edit" title="Edit" data-toggle="tooltip" href="modificacion.php?id=<?=$id?>"><i class="material-icons"><button type="submit" name="edit" value='<?= $id ?>'></button></i></a>
                                </td>
                                <td style="text-align: center;">
                                    <a class="delete" title="Delete" data-toggle="tooltip" href="listado.php?delete=<?=$id?>"><i class="material-icons"><button type="submit" name="delete" value='<?= $id ?>'></button></i></a>
                                </td>
                            </tr>
                    <?php endwhile;
                    } else {
                        echo "<tr><td colspan='7' style='text-align: center;'>No hay fotos en la galería</td></tr>";
                    } 
                    //mensaje de la consulta delete;
                    if($success && isset($_GET['delete'])){
                    ?>
                        <div class="alert-success">
                            <p>Imagen eliminada con éxito</p>
                        </div>
                    <?php
                    }else if(isset($_GET['delete'])){
                    ?>
                        <div class="alert-error">
                                <p>Error al eliminar</p>
                        </div>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>

</body>

</html>
<?php include "includes/disconnect.php" ?>
<?php include "includes/connection.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágen</title>
    <?php include "includes/navBar.php" ?>
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
    <h1>Subir Imágen</h1>
    <?php
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if($ext == "png" || $ext == "jpeg" || $ext == "gif"){
                if(move_uploaded_file($_FILES["file"]["tmp_name"],"./images/" . $_POST["name"].".$ext")){
                }else{
                    echo "No se ha enviado correctamente";
                }
            }else{
                echo "Está enviando un archivo de formato '$ext'. Debe enviar JPEG, GIF o PNG";
            }
            echo "<p><img src='./images/" . $_POST["name"] . "." .  $ext . "'></p>";
        }
    ?>
</body>

</html>
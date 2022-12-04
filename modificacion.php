<?php include "includes/connection.php";

//consulta para obtener los datos de la imagen seleccionada
if(isset($_GET['id'])){
    $sql = "SELECT * FROM images WHERE id=" . $_GET['id'];
    $result = $link->query($sql);
    $result->bindColumn('author_id', $author_id);
    $result->bindColumn('name', $name);
    $result->bindColumn('file', $file);
    $result->bindColumn('text', $text);
    $result->bindColumn('enabled', $enabled);

    $result->fetch();
}

//comprobación del post para modificar
if(isset($_POST["author_id"]) || isset($_POST["name"]) || isset($_POST["fichero"]) || isset($_POST["text"]) || isset($_POST["enabled"])){
    $enabled = isset($_POST["enabled"]) ? 1 : 0;
    //modificación con archivo
    if(is_uploaded_file($_FILES["fichero"]["tmp_name"])){
        $ext = pathinfo($_FILES['fichero']['name'], PATHINFO_EXTENSION);
        if($ext == "png" || $ext == "jpeg" || $ext == "jpg"){
            if(move_uploaded_file($_FILES["fichero"]["tmp_name"],"images/" . $_FILES['fichero']['name'])){
                $size=$_FILES['fichero']['size'];
                $fileName = $_FILES['fichero']['name'];

                $update = "UPDATE images SET author_id=?, name=?, file=?, size=?, text=?, enabled=? WHERE id=" . $_GET['id'];
                $stmt = $link->prepare($update);
                $stmt->execute([$_POST["author_id"], $_POST["name"], $fileName, $size, $_POST["text"], $enabled]);
                //redirección al listado;
                header("Location: listado.php");
            }else{
                echo "<p>No se ha enviado correctamente</p>";
            }
        }else{
            echo "<p>Está enviando un archivo de formato '$ext'. Debe enviar JPEG, JPG o PNG</p>";
        }
    //modificación sin archivo
    }else{
        $update = "UPDATE images SET author_id=?, name=?, text=?, enabled=? WHERE id=" . $_GET['id'];

        $stmt = $link->prepare($update);
        $stmt->execute([$_POST["author_id"], $_POST["name"], $_POST["text"], $enabled]);
    }
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Imagen</title>
    <?php include "includes/navBar.php" ?>
    <style>
        .form_new {
            padding-top: 50px;
            background-color: #ffffff;
            border: 1px solid #1D89CF;
        }
    </style>
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
        <div class="row">

            <div class="col-lg-12 text-lett">
                <h2 class="mt-5">Modificar Foto</h2>
            </div>

        </div>
        <div class="row form_new">
            <div class="col-lg-2 text-left"></div>
            <div class="col-lg-10 text-left">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="author_id" class="col-lg-2 col-form-label">Autor</label>
                        <div class="col-lg-4 text-lett">
                            <select class="form-control" name=author_id id=author_id>
                            <?php
                                //consulta de autores
                                $sql2 = "SELECT name, id FROM authors";
                                $result2 = $link->query($sql2);
                                $result2 -> bindColumn('name', $author_name);
                                $result2 -> bindColumn('id', $id);
                                while($result2->fetch()):
                                    $selected = "";
                                    if($id == $author_id){
                                        $selected = "selected";
                                    }
                            ?>
                                <option <?=$selected?> value="<?=$id?>"><?=$author_name?></option>
                            <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Nombre</label>
                        <div class="col-lg-4 text-lett">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?=$name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fichero" class="col-lg-2 col-form-label">Fichero</label>
                        <div class="col-lg-4 text-lett">
                            <input type="file" class="form-control" id="fichero" name="fichero" placeholder="">
                            <p><?=$file?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-lg-2 col-form-label">Texto</label>
                        <div class="col-lg-4 text-lett">
                            <textarea rows="5" cols="60" id="text" name="text"><?=$text?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="enabled" class="col-lg-2 col-form-label">Activado</label>
                        <div class="col-lg-3 text-lett">
                            <?php
                            $checked = "";
                            if($enabled == 1){
                                $checked = "checked";
                            }
                            ?>
                            <input type="checkbox" id="enabled" name="enabled" <?=$checked?>>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <br><br>
            </div>
            <div class="col-lg-2 text-left"></div>
        </div>

    </div>

</body>

</html>
<?php include "includes/disconnect.php" ?>
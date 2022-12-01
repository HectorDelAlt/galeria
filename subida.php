<?php include "includes/connection.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágen</title>
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
                <h2 class="mt-5">Añadir Nueva Foto</h2>
            </div>

        </div>
        <div class="row form_new">
            <div class="col-lg-2 text-left"></div>
            <div class="col-lg-10 text-left">
                <form role="form" action="actions/new_foto.act.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="author_id" class="col-lg-2 col-form-label">Autor</label>
                        <div class="col-lg-4 text-lett">
                            <select class="form-control" name=author_id id=author_id>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Nombre</label>
                        <div class="col-lg-4 text-lett">
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fichero" class="col-lg-2 col-form-label">Fichero</label>
                        <div class="col-lg-4 text-lett">
                            <input type="file" class="form-control" id="fichero" name="fichero" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-lg-2 col-form-label">Texto</label>
                        <div class="col-lg-4 text-lett">
                            <textarea rows="5" cols="60" id="text" name="text"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="enabled" class="col-lg-2 col-form-label">Activado</label>
                        <div class="col-lg-3 text-lett">
                            <input type="checkbox" id="enabled" name="enabled">
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
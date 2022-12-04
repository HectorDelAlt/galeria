<?php include "includes/connection.php" ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeria</title>
  <?php include "includes/navBar.php"?>
</head>

<body>
  <div class="menu">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="index.php">Galeria</a>
      </div>
      <div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>
        </ul>
      </div>
    </div>
  </div>
  <br><br><br>
  <div class="img-container">
    <?php
    $sql = "SELECT * FROM images";
    $result = $link->query($sql);

    $result->bindColumn('name', $name);
    $result->bindColumn('file', $file);
    $result->bindColumn('enabled', $enabled);

    while($result->fetch()):
    ?>
    <div class="div-img">
      <?php
      if($enabled == 1):
      ?>
      <picture>
          <img src="images/<?=$file?>" alt="<?=$name?>">
          <figcaption><?=$name?></figcaption>
      </picture>
      <?php
      endif;
      ?>
    </div>
    <?php
    endwhile;
    ?>
  </div>
</body>

</html>
<?php include "includes/disconnect.php" ?>
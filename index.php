<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    .menu {
      background-color: #00547E;
      border-bottom: 4px solid #04A3ED;
      width: 100%;
      height: auto;
      padding: 0 10px;
      position: fixed;
      margin: 0px;
      z-index: 1;
      opacity: 0.9;
    }

    .menu .navbar-nav>.active>a {
      background-color: #04A3ED;
      color: white;
      font-weight: bold;
    }

    .menu .navbar-nav>li>a {
      font-size: 13px;
      color: white;
      padding: 10px 35px;

    }

    .menu .navbar-nav>li>a:hover {
      background-color: #04A3ED;
    }

    .navbar-header>a {
      font-family: 'Ubuntu Condensed', sans-serif;
      padding: 0px;
      margin: 0px;
      text-decoration: none;
      color: white;
      font-size: 25px;
      padding: 5px 30px;
    }

    .navbar-header>a:hover {
      text-decoration: none;
      color: #04A3ED;
    }
  </style>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
</body>

</html>
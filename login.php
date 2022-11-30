<?php include "includes/top.php"; ?>
<?php
    $sql = "Select * FROM authors";
    $result = $link->query($sql);

    $result->bindColumn('id', $id);
    $result->bindColumn('name', $name);
    $result->bindColumn('password', $passw);
?>
<body>  

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="images/usuario.png" id="icon" alt="User Icon"/>
            </div>
            <!-- Login Form -->
            <form method="POST">
                <input type="text" id="login" class="fadeIn second" name="user" placeholder="Email">
                <input type="password" id="login" class="fadeIn third" name="password" placeholder="Contraseña">
                <input type="submit" class="fadeIn fourth" value="Iniciar Sesión" name="send">
                <a href="register.php" class="btn fadeIn fourth">Crear un Nuevo Autor</a>
            </form>
        </div>
    </div>
</body>
</html>
<?php include "includes/connection.php"; ?>
<?php
try {
    if (isset($_POST["send"])) {
        $name = $_POST["user"];
        $email = $_POST["email"];
        $passw = $_POST["password"];


        $sql = "INSERT INTO authors (id, name, email, password, enabled, created) VALUES (NULL, '$name', '$email', '$passw', 0, CURRENT_TIMESTAMP)";
        $link->exec($sql);

        header("Location: login.php");
    }
} catch (Exception $ex) {
    die("Error al crear el Usuario. " . $ex->getMessage());
}


?>
<?php include "includes/top.php" ?>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Icon -->
            <div class="fadeIn first">
                <a href="index.php"><img src="images/usuario.png" id="icon" alt="User Icon" /></a>
            </div>
            <!-- Login Form -->
            <form method="POST">
                <input type="text" id="login" class="fadeIn second" name="user" placeholder="* Nombre Completo" required>
                <input type="email" id="login" class="fadeIn third" name="email" placeholder="* Correo Electronico" required>
                <input type="password" id="login" class="fadeIn fourth" name="password" placeholder="* Contraseña" required>
                <input type="submit" class="fadeIn fifth" value="Crear Usuario" name="send">
                <a href="login.php" class="btn fadeIn fifth">Ya estoy Registrado</a>
            </form>
        </div>
    </div>
</body>

</html>
<?php include "includes/disconnect.php" ?>
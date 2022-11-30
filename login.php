<?php include "includes/connection.php"; ?>
<?php
if (isset($_POST["send"])) {
    $email = $_POST["email"];
    $passw = $_POST["password"];

    $sql = "Select * FROM authors WHERE email='$email' AND password='$passw'";
    $result = $link->query($sql);
    $user = $result->fetch();
    if ($user) {
        header("Location: listado.php");
    } else {
        echo '<script language="javascript">alert("Usuario/Contraseña Incorrectos");</script>';
    }
}
?>
<?php include "includes/top.php"; ?>

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
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="* Email" required>
                <input type="password" id="login" class="fadeIn third" name="password" placeholder="* Contraseña" required>
                <input type="submit" class="fadeIn fourth" value="Iniciar Sesión" name="send">
                <a href="registro.php" class="btn fadeIn fourth">Crear un Nuevo Autor</a>
            </form>
        </div>
    </div>
</body>

</html>
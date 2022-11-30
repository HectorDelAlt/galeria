<?php include "includes/top.php" ?>
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
                <input type="submit" class="fadeIn fourth" value="Crear Usuario" name="send">
                <a href="login.php" class="btn fadeIn fourth">Ya estoy Registrado</a>
            </form>
        </div>
    </div>
</body>
</html>

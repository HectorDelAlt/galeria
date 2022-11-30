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

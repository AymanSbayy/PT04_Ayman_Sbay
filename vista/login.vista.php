<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../Estils/login.css">
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="user-box">
            <label>Usuari</label>
                <input type="text" name="username" required="">
                
            </div>
            <div class="user-box">
            <label>Contraseña</label>
                <input type="password" name="password" required="">
                
            </div>
            <input type="submit" name="submit" value="Enviar">
            <p>No estàs registrat? <a href="register.vista.php">Registra't aquí</a>.</p>
            <p><a href="../index.php">Tornar</a>.</p>
        </form>
    </div>
</body>
</html>

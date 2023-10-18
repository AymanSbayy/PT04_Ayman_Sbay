<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="../Estils/register.css">
</head>
<body>
    <div class="register-form">
        <form action="../model/register.php" method="post">
            <label for="username">DNI:</label>
            <input type="text" name="dni" required>
            <label for="username">Nom d'usuari:</label>
            <input type="text" name="username" required>
            <label for="email">Correu electrònic:</label>
            <input type="email" name="email" required>
            <label for="password">Contrasenya:</label>
            <input type="password" name="password" required>
            <label for="confirm_password">Confirmar contrasenya:</label>
            <input type="password" name="confirm_password" required>
            <input type="submit" value="Registrarse">
            <span style="color: red;"><?php if ($errors != "")echo $errors; ?></span>
            <p>Si ja tens un compte, <a href="../model/login.php">Inicia sessió</a>.</p>
            <p><a href="../index.php">Tornar</a>.</p>
        </form>
    </div>
</body>
</html>

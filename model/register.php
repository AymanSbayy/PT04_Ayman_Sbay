<?php 

$errors = "";


if (isset($_POST['dni']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $dni = $_POST['dni'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    require_once "../controlador/validacions.php";
    require_once "../controlador/validacionsdb.php";
    require_once "../database/pdo.php";

    if (validar_dni2($dni)) {
        $errors .= "El DNI introduït no és vàlid. <br>";
    }

    if (idExists($dni)) {
        $errors .= "El DNI introduït ja existeix. <br>";
    }

    if (validar_nombre($username)) {
        $errors .= "El nom d'usuari introduït no és vàlid. <br>";
    }

    if (emailExists($email)) {
        $errors .= "El correu electrònic introduït ja existeix. <br>";
    }

    if (!validar_email($email)) {
        $errors .= "El correu electrònic introduït no és vàlid. <br>";
    }

    if (validar_contraseña2($password)) {
        $errors .= "La contrasenya introduïda no és vàlida, ha de contenir almenys 8 caràcters, una majúscula, una minúscula i un número. <br>";
    }

    if ($password != $confirm_password) {
        $errors .= "Les contrasenyes no coincideixen. <br>";
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $conn = connexion();
        $sql = "INSERT INTO usuaris (DNI, Nom, Correu, Contraseña) VALUES ('$dni', '$username', '$email', '$password')";
        $conn->exec($sql);

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "S'ha iniciat sessió correctament.";

        header('location: ../index.php');
    }
}


include '../vista/register.vista.php';

?>
<?php 
session_start();
$errors = "";

if(!isset($_SESSION['dni'])){
    if (isset($_POST['dni']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $dni = $_POST['dni'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $errors = validateInput($dni, $username, $email, $password, $confirm_password);

        if (empty($errors)) {
            registerUser($dni, $username, $email, $password);
        }
    }

    include '../vista/register.vista.php';
}
else {
    header('location: ../index.php');
}

function validateInput($dni, $username, $email, $password, $confirm_password) {
    $errors = "";
    require_once "../controlador/validacions.php";
    require_once "../controlador/validacionsdb.php";

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

    return $errors;
}

function registerUser($dni, $username, $email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $conn = connexion();
    $sql = "INSERT INTO usuaris (DNI, Nom, Correu, Contraseña) VALUES ('$dni', '$username', '$email', '$password')";
    $conn->exec($sql);

    
    $_SESSION['dni'] = $username;
    //Alert usuari registrat correctament

    echo "<script type='text/javascript'>alert('Usuari registrat correctament');</script>";

    header('refresh:0.01; url=../index.php');
}

?>
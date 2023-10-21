<?php 

session_start();
$errors = "";

if(!isset($_SESSION['dni'])){
    if (isset($_POST['dni']) && isset($_POST['password'])) {
        $dni = $_POST['dni'];
        $password = $_POST['password'];

        login($dni, $password);
    }

    include '../vista/login.vista.php';

} else {
    header('location: ../index.php');
}


function login($dni, $password) {
    require_once "../database/pdo.php";
    $errors = "";

    if (empty($dni)) {
        $errors .= "El DNI és obligatori. <br>";
    }

    if (empty($password)) {
        $errors .= "La contrasenya és obligatòria. <br>";
    }

    if (empty($errors)) {
        $conn = connexion();
        $sql = "SELECT Contraseña FROM usuaris WHERE DNI = '$dni'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //$hash = $result['Contraseña'];
        if (password_verify($password, $result['Contraseña'])) {
            $_SESSION['dni'] = $dni;
            header('location: ../index.php');
        } else {
            $errors .= "El DNI o la contrasenya introduïts no són correctes. <br>";
        }
    }
    return $errors;
}

?>
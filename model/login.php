<?php 

$errors = "";

if (isset($_POST['dni']) && isset($_POST['password'])) {
    $dni = $_POST['dni'];
    $password = $_POST['password'];


    require_once "../database/pdo.php";

    if (empty($dni)) {
        $errors .= "El DNI és obligatori. <br>";
    }

    if (empty($password)) {
        $errors .= "La contrasenya és obligatòria. <br>";
    }

    if (empty($errors)) {
        $conn = connexion();
        $sql = "SELECT * FROM usuaris WHERE DNI='$dni'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['Contraseña'])) {
                session_start();
                $_SESSION['dni'] = $dni;
                $_SESSION['success'] = "S'ha iniciat sessió correctament.";

                header('location: ../index.php');
            } else {
                $errors .= "La contrasenya introduïda no és correcta. <br>";
            }
        } else {
            $errors .= "El DNI introduït no existeix. <br>";
        }
    }
}
include '../vista/login.vista.php';

?>
<?php 
session_start();
$errors = "";
if(!isset($_SESSION['dni'])){
    echo "<script>alert('No has iniciat sessió')</script>";
    header('refresh:0.01; url=../index.php');
} else {
    if (isset($_POST['titulo']) && isset($_POST['articulo'])) {
        $titulo = $_POST['titulo'];
        $articulo = $_POST['articulo'];
        $dni = $_SESSION['dni'];
        if (empty($titulo)) {
            $errors .= "No has introduit el títol <br>";
        }
        if (empty($articulo)) {
            $errors .= "No has introduit l'article";
        }
        if (empty($errors)) {
            inserirArt($dni, $titulo, $articulo);
        }
        
    }
}

include "../vista/insert.vista.php";

function inserirArt($dni, $titulo, $articulo){
    include_once '../database/pdo.php';

    $conn = connexion();
    $sql = "INSERT INTO articles (id, art, Títol, user_dni) VALUES (:id, :articulo, :titulo, :user_dni)";
    $stmt = $conn->prepare($sql);
    $id = getNextArticlePosition();
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':articulo', $articulo);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':user_dni', $dni);
    $stmt->execute();
    echo "<script>alert('Article inserit')</script>";
}

function getNextArticlePosition() {
    include_once '../database/pdo.php';

    $conn = connexion();
    $sql = "SELECT COUNT(*) FROM articles";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count;
}

?>
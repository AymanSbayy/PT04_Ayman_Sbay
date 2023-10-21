<?php 

function idExists($id) {
    include_once '../database/pdo.php';
    $conn = connexion();
    $sql = "SELECT * FROM usuaris WHERE DNI = '$id'";
    $result = $conn->query($sql);
    $numArticles = $result->fetchColumn();
    if ($numArticles != "") {
        return true;
    } else {
        return false;
    }
}

function emailExists($email) {
    include_once '../database/pdo.php';
    $conn = connexion();
    $sql = "SELECT * FROM usuaris WHERE Correu = '$email'";
    $result = $conn->query($sql);
    $numArticles = $result->fetchColumn();
    if ($numArticles != "") {
        return true;
    } else {
        return false;
    }
}




?>

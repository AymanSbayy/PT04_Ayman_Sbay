<?php 

function idExists($id) {
    //validar si el dni existeix
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
    //validar si el email ya existeix
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

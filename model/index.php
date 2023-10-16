<?php
//Ayman Sbay Zekkari  - Pràctica 3
session_start();
$final = "";

if (!isset($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$numArt = Articles();

$numArticles = totalArticles();
$pagines = ceil($numArticles / $numArt);

$inici = ($pagina - 1) * $numArt;

$art = getArticles($inici, $numArt);




include '../vista/index.vista.php';

/**
 * getArticles
 * Funcio que busca articles en la base de dades depenent de la pagina en la que estem i dels articles que volem mostrar
 * @param int $inici Indica des de quin article començar a recuperar
 * @param int $numArt Nombre d'articles per pagina que volem mostrar
 * @return string Retornem la llista d'articles que mostrarem a la vista
 */
function getArticles($inici, $numArt)
{
    include_once '../database/pdo.php';
    $conn = connexion();

    $sql = "SELECT * FROM articles LIMIT $inici, $numArt";
    $result = $conn->query($sql);

    $art = '';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $art .= '<li>' . $row['Títol'] . ' - ' . $row['art'] . '</li>';
    }

    return $art;
}

/**
 * totalArticles
 * Funcio que retorna el nombre total d'articles que hi ha a la base de dades
 * @void 
 */
function totalArticles()
{
    include_once '../database/pdo.php';
    try {
        $conn = connexion();
        $sql = "SELECT COUNT(*) FROM articles";
        $result = $conn->query($sql);
        $numArticles = $result->fetchColumn();
        return $numArticles;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


/**
 * Articles
 * Funcio que retorna el nombre d'articles que volem mostrar per pagina
 * @void 
 */
function Articles()
{
    if (isset($_GET['numart'])) {
        $_SESSION['numArt'] = $_GET['numart']; // Store the selected number of articles in the session
    } else {
        // If not set, use the default value of 5 or the stored value if available
        $_SESSION['numArt'] = isset($_SESSION['numArt']) ? $_SESSION['numArt'] : 5;
    }
    return $_SESSION['numArt'];
}
?>
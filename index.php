<?php
session_start();

if(!isset($_SESSION['dni']))
{
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

    include 'vista/index.vista.php';
} else {
    $final = "";

    if (!isset($_GET['pagina'])) {
        $pagina = 1;
    } else {
        $pagina = $_GET['pagina'];
    }

    $numArt = Articles();

    $numArticles = totalArticles2();
    $pagines = ceil($numArticles / $numArt);

    $inici = ($pagina - 1) * $numArt;

    $art = getArticles2($_SESSION['dni'], $inici, $numArt);
    
    include 'vista/index.usuari.php';
}



    /**
     * getArticles
     * Funcio que busca articles en la base de dades depenent de la pagina en la que estem i dels articles que volem mostrar
     * @param int $inici Indica des de quin article començar a recuperar
     * @param int $numArt Nombre d'articles per pagina que volem mostrar
     * @return string Retornem la llista d'articles que mostrarem a la vista
     */
    function getArticles($inici, $numArt)
    {
        include_once 'database/pdo.php';
        $conn = connexion();

        $sql = "SELECT * FROM articles LIMIT $inici, $numArt";
        $result = $conn->query($sql);

        $art = '';

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $art .= '<li>' . $row['ID'] . ' - ' . $row['Títol'] . ' - ' . $row['art'] . '</li>';
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
        include_once 'database/pdo.php';
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
    
    function totalArticles2()
    {
        include_once 'database/pdo.php';
        try {
            $conn = connexion();
            $dni = $_SESSION['dni'];
            $sql = "SELECT COUNT(*) FROM articles WHERE user_dni = '$dni'";
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
            $_SESSION['numArt'] = $_GET['numart']; 
        } else {
            $_SESSION['numArt'] = isset($_SESSION['numArt']) ? $_SESSION['numArt'] : 5;
        }
        return $_SESSION['numArt'];
    }


    function getArticles2($dni, $inici, $numArt)
    {
        include_once 'database/pdo.php';
        $conn = connexion();
    
        $sql = "SELECT * FROM articles WHERE user_dni = :dni LIMIT :inici, :numArt";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':inici', $inici, PDO::PARAM_INT);
        $stmt->bindParam(':numArt', $numArt, PDO::PARAM_INT);
        $stmt->execute();
    
        $art = '';
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $art .= '<li>' . $row['ID'] . ' - ' . $row['Títol'] . ' - ' . $row['art'] . '</li>';
        }
    
        return $art;
    }
?>
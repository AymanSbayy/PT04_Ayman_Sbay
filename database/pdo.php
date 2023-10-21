<?php
//Ayman Sbay Zekkari  - Pràctica 4
/**
 * connexion
 * //Funcio que conecta amb la base de dades
 * @return
 */
function connexion()
{
    require 'db.constants.php';
    return new PDO("mysql:host=$HOST;dbname=$DB", "$USER", $PASS);
}
?>
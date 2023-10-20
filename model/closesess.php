<?php 


session_start();
session_destroy();

echo "<script>alert('Sessió tancada correctament');</script>";

header('location: ../index.php');

?>
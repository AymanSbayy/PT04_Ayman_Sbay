<?php 


session_start();
session_destroy();

echo "<script>alert('Sessió tancada correctament');</script>";


header('refresh:0.01; url=../index.php');


?>
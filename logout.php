<?php
session_start();
session_destroy(); // Apaga o login falso
header("Location: index.php");
exit;
?>
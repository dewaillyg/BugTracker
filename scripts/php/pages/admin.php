<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../../../sae203.php');
}

echo 'admin';

?>
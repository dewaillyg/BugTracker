<?php

include './connexionBDD.php';

session_start();

if ($_SESSION['role'] !== 1) {
    header('Location: ../../../sae203.php');
}

$sql = "UPDATE sae203_tickets SET dateMAJ = " . $_GET['date'] . " WHERE id = " . $_GET['ids'];
$updateDev = $db->prepare($sql);
$updateDev->execute();

?>
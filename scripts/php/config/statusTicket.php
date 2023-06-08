<?php

include './connexionBDD.php';

session_start();

$maj = new DateTime("NOW");

if ($_SESSION['role'] !== 1) {
    header('Location: ../../../sae203.php');
}

$sql = "UPDATE sae203_tickets SET status = " . $_GET['status'] . ", dateMAJ = '{$maj->format('Y-m-d H:i:s')}' WHERE id = " . $_GET['ids'];
$updateDev = $db->prepare($sql);
$updateDev->execute();

header('Location:../pages/dev.php');



?>
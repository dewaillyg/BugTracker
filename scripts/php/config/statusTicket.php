<?php

include './connexionBDD.php';

session_start();

$sql = "UPDATE sae203_tickets SET status = " . $_GET['status'] . " WHERE id = " . $_GET['ids'];
$updateDev = $db->prepare($sql);
$updateDev->execute();

header('Location:../pages/dev.php');

?>
<?php

session_start();

$_SESSION['title'] = $_GET['title'];
$_SESSION['tag'] = $_GET['tag'];
$_SESSION['description'] = $_GET['description'];
$_SESSION['date'] = date('Y/m/d H:i:s', time());

if (!isset($_SESSION['id']) || !isset($_SESSION['title'])) {
    header('Location: ../../../sae203.php');
}

include './connexionBDD.php';

$sql = "INSERT INTO `sae203_tickets` (`title`, `tag`, `date`, `description`, `user`) VALUES (:a, :b, :c, :d, :e)";
$res = $db->prepare($sql);
$exec = $res->execute(
    array(
        ":a"=>$_SESSION['title'],
        ":b"=>$_SESSION['tag'],
        ":c"=>$_SESSION['date'],
        ":d"=>$_SESSION['description'],
        ":e"=>$_SESSION['id'],
        )
);

if ($exec) {
    $from = "guillaume.dewailly@univ-rouen.fr";
    $to = "guillaume.dewailly@univ-rouen.fr";
    $subject = "Nouveau Ticket";
    $message = "Vous venez de recevoir un nouveau ticket de " . $_SESSION['id'];
    $headers = "De : " . $from;
    mail($to,$subject,$message,$headers);
    
    header('Location: ./route.php');
} else {
    header('Location: ../../../sae203.php');
}




?>
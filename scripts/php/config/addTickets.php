<?php

session_start();

$_SESSION['title'] = filter_var($_GET['title'], FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['tag'] = $_GET['tag'];
$_SESSION['description'] = filter_var($_GET['description'], FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['date'] = date('Y/m/d H:i:s', time());

if (!isset($_SESSION['id']) || !isset($_SESSION['title'])) {
    header('Location: ../../../sae203.php');
}

include './connexionBDD.php';

$sql = "INSERT INTO `sae203_tickets` (`title`, `tag`, `date`, `description`, `user`, `id_dev`, `severity`, `status`, `dateMAJ`) VALUES (:a, :b, :c, :d, :e, :f, :g, :h, :i)";
$res = $db->prepare($sql);
$exec = $res->execute(
    array(
        ":a"=>$_SESSION['title'],
        ":b"=>$_SESSION['tag'],
        ":c"=>$_SESSION['date'],
        ":d"=>$_SESSION['description'],
        ":e"=>$_SESSION['id'],
        ":f"=>0,
        ":g"=>0,
        ":h"=>0,
        ":i"=>'0000-00-00 00:00:00'
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
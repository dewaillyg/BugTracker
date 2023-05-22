<?php

include './config/connexionBDD.php';

session_start();

$membersData = $db->query('SELECT * FROM bugtracker_members');
$membersData->execute();
$members = $membersData->fetchAll();

$_SESSION['id'] = $_POST['login'];
$_SESSION['pass'] = sha1($_POST['password']);

foreach ($members AS $member) {
    if ($_SESSION['id'] == $member['login'] && $_SESSION['pass'] == $member['password']) {
        $_SESSION['role'] = $member['role'];

        switch ($_SESSION['role']) {
            case 0 : header('Location: ./pages/admin.php'); break;
            case 1 : header('Location: ./pages/dev.php'); break;
            case 2 : header('Location: ./pages/tester.php'); break;
        }
    }
}


?>
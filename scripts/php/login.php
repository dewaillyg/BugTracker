<?php

include './config/connexionBDD.php';

session_start();

$membersData = $db->query('SELECT * FROM sae203_members');
$membersData->execute();
$members = $membersData->fetchAll();

$_SESSION['id'] = $_POST['login'];
$_SESSION['pass'] = sha1($_POST['password']);

foreach ($members AS $member) {
    if ($_SESSION['id'] == $member['login'] && $_SESSION['pass'] == $member['password']) {
        $_SESSION['role'] = $member['role'];
        
        switch ($_SESSION['role']) {
            case 0 : header('Location: ./pages/admin.php?sort=title&dir=asc'); break;
            case 1 : header('Location: ./pages/dev.php'); break;
            case 2 : header('Location: ./pages/tester.php'); break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BugTracker | Connexion</title>
        <link rel="stylesheet" type="text/css" href="../../styles/login.css" />
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <h1>Identifiants Incorrect</h1>
    <div class="link">
        <div class="i">
            <i class="fas fa-house-user"></i>
        </div>
        <a href="../../sae203.php">Retourner à l'accueil</a>
    </div>
</body>
</html>
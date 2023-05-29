<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../../../sae203.php');
}

include './connexionBDD.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../styles/status.css"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>BugTracker | Status</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <i class="fas fa-house-user"></i>
                <a href="../../../sae203.php">Acceuil</a>
            </div>
            <div>
                <i class="fas fa-angle-double-left"></i>
                <a href="./route.php">Retour</a>
            </div>
        </nav>
    </header>
    <?php 

        $user = $_SESSION['id'];
        $membersData = $db->query("SELECT * FROM bugtracker_tickets WHERE user = '$user' ORDER BY date DESC");
        $membersData->execute();
        $members = $membersData->fetchAll();

    ?>

    <div class="table">
        <div class="row header">
            <div class="cell">Date</div>
            <div class="cell">Titre</div>
            <div class="cell">Tag</div>
            <div class="cell">Description</div>
            <div class="cell">Status</div>
        </div>
        <?php
            foreach ($members as $member) {
                echo (
                    '<div class="row">
                        <div class="cell">'.$member['date'].'</div>
                        <div class="cell">'.$member['title'].'</div>
                        <div class="cell">'.$member['tag'].'</div>
                        <div class="cell">'.$member['description'].'</div>'
                );
                switch($member['status']) {
                    case 0 :
                        echo('<div class="cell attente">En attente</div></div>');
                        break;
                    case 1 :
                        echo('<div class="cell confirme">Confirmé</div></div>');
                        break;
                    case 2 : 
                        echo('<div class="cell traitement">En traitement</div></div>');
                        break;
                    default : 
                        echo('<div class="cell termine">Terminé</div></div>');
                        break;
                }
                
            }
        ?>
    </div>

</body>
</html>
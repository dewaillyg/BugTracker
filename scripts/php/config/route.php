<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../../../sae203.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugTracker | Index</title>
    <link rel="stylesheet" type="text/css" href="../../../styles/route.css"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <main>
        <div class="container">
            <h1>
                <?php
                    if($_SESSION["role"] == 2) echo 'Votre ticket a bien été pris en compte.';
                ?>
            </h1>
            <div>
                <div class="i">
                    <i class="fas fa-house-user"></i>
                </div>
                <div>
                    <a href="./logout.php">Accueil</a>
                </div>
            </div>
            <div>
                <div class="i">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div>
                    <a href="../pages/tester.php">Nouveau ticket</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
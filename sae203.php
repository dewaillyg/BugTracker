<?php

include './scripts/php/config/connexionBDD.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugTracker</title>
    <link rel="shortcut icon" href="./assets/icons/icon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="./styles/style.css"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <img class="wave" src="./assets/images/wave.png"/>
    <main class="container">
        <div class="img">
            <img src="./assets/images/background.svg" alt="background"/>
        </div>
        <div class="login-content">
            <form action="./scripts/php/login.php" method="POST" autocomplete="off">
                <img src="./assets/icons/icon.png" alt="bugtracker"/>
                <h2>BugTracker</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Identifiant</h5>
                        <input type="text" class="input" name="login" id="login" required="required"/>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Mot de passe</h5>
                        <input type="password" class="input" name="password" id="password" required="required"/>
                    </div>
                </div>
                <input type="submit" class="btn" value="Connexion" />
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./scripts/javascript/main.js"></script>
</body>
</html>
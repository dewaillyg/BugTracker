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
    <title>Espace Testeur | BugTracker</title>
    <link rel="shortcut icon" href="../../../assets/icons/icon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../../styles/tester.css"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Bienvenu <?php echo strtoupper($_SESSION['id']); ?></h3>
          <p class="text">
          Vous êtes actuellement sur l'interface dédiée aux tickets d'incidents.    Afin de nous faire parvenir votre ticket, veuillez compléter le formulaire.
          <br/>Vous trouverez l'évolution de vos demandes en cliquant sur la rubrique "Évolution de mes demandes".
        </p>
          <div class="img_container">
            <div class="img"></div>
          </div>

          <div class="social-media">
            <p>Nous contacter</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="../config/addTickets.php" method="GET" autocomplete="off">
            <h3 class="title">Formulaire</h3>
                        <div class="input-container">
                            <input type="text" name="title" class="input" />
                            <label for="">Titre</label>
                            <span>Titre</span>
                        </div>
                        <fieldset>
                            <legend>Tag</legend>
                            <div class="radio">
                            <div class="item">
                                <label for="network">Réseaux</label>
                                <input type="radio" name="tag" class="input" id="network"/>
                            </div>
                            <div class="item">
                                <label for="dev">Développement</label>
                                <input type="radio" name="tag" class="input" id="dev"/>
                            </div>
                            <div class="item">
                                <label for="graph">Graphique</label>
                                <input type="radio" name="tag" class="input" id="graph"/>
                            </div>
                        </div>
                        </fieldset>
                        <div class="input-container textarea">
                            <textarea name="description" class="input"></textarea>
                            <label for="description">Description</label>
                            <span>Description</span>
                        </div>
            <input type="submit" value="Envoyer" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="../../javascript/tester.js"></script>
</body>
</html>
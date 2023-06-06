<?php

session_start();

include '../config/connexionBDD.php';

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
    <link rel="stylesheet" type="text/css" href="../../../styles/admin.css" />
    <title>BugTracker | Dashboard</title>
    <link rel="shortcut icon" href="../../../assets/images/avatar.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <header>
        <div class="home">
            <a href="../config/logout.php"><i class="fas fa-home"></i></a>
        </div>
        <div class="left">
            <div class="logo"></div>
        </div>
        <div class="middle">
            <h1>Dashboard</h1>
        </div>
        <div class="right">
            <div class="avatar"></div>
            <p>Administrateur</p>
        </div>
    </header>
    <section>
        <div>
            <h2>Titre</h2>
            <a class="linkOrder" href="#"><input type="radio" name="order" class="btn <?php if($_GET['sort'] === 'title') echo 'active' ?>" /></a>
        </div>
        <div>
            <h2>Dev</h2>
            <a class="linkOrder" href="#"><input type="radio" name="order" class="btn <?php if($_GET['sort'] === 'id_dev') echo 'active' ?>" /></a>
        </div>
        <div>
            <h2>Tag</h2>
            <a class="linkOrder" href="#"><input type="radio" name="order" class="btn <?php if($_GET['sort'] === 'tag') echo 'active' ?>" /></a>
        </div>
        <div>
            <h2>Date</h2>
            <a class="linkOrder" href="#"><input type="radio" name="order" class="btn <?php if($_GET['sort'] === 'date') echo 'active' ?>" /></a>
        </div>
        <div>
            <h2>Priorité</h2>
            <a class="linkOrder" href="#"><input type="radio" name="order" class="btn <?php if($_GET['sort'] === 'severity') echo 'active' ?>" /></a>
        </div>
    </section>
    <div class="infos">
        <div class="infosLeft">
            <div class="red"><p>Développement</p></div>
            <div class="yellow"><p>Graphique</p></div>
            <div class="blue"><p>Reseau</p></div>
        </div>
        <div class="infosRight">
            <div class="a">
                <i class="fas fa-thermometer-half"></i>
                <p>Sévérité<span>(cliqué pour modifier)</span></p>
            </div>
            <div class="b">
                <i class="fas fa-code"></i>
                <p>Développeur<span>(cliqué pour modifier)</span></p>
            </div>
        </div>
    </div>
    <main class="card_container">
        <?php
        $query = "SELECT * FROM sae203_tickets";

        $sortable = ['title', 'tag', 'date', 'severity', 'id_dev'];

        // ORGANISATION
        if (!empty($_GET['sort']) && in_array($_GET['sort'], $sortable)) {
            $direction = $_GET['dir'] ?? 'asc';
            if (!in_array($direction, ['asc', 'desc'])) {
                $direction = 'asc';
            }
            $query .= " ORDER BY " . $_GET['sort'] . " $direction";
        }

            $ticketsData = $db->prepare($query);
            $ticketsData->execute();
            $tickets = $ticketsData->fetchAll();
            
            /* ----------------------------------------------------
            ----------------------------------------------------
            ---------------- DEBUT BOUCLE ---------------------
            ----------------------------------------------------
            ----------------------------------------------------
            */

            foreach ($tickets AS $ticket) {
        ?>

        <div class="card">
            <div class="cardHeader">
                <?php if ($ticket['tag'] == 'graphique') { ?>
                    <p class="graphique"><?php echo $ticket['title']; ?></p>
                <?php } else if ($ticket['tag'] == 'reseau') { ?>
                    <p class="reseau"><?php echo $ticket['title']; ?></p>
                <?php } else { ?>
                    <p class="developpement"><?php echo $ticket['title']; } ?></p>
            </div>
            <div class="cardBody">
                <?php echo mb_strimwidth($ticket['description'], 0, 90, "..."); ?>
            </div>
            <div class="cardFooter">
                <div class="left">
                    <div class="day">
                        <div class="i">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <p><?php echo date("M j", strtotime($ticket['date'])); ?></p>
                    </div>
                    <div class="sev">
                        <div class="i">
                        <?php 
                        switch ($ticket['severity']) {
                            case 1 : ?> <i style="color:green;" class="fas fa-thermometer-empty"></i><?php break;
                            case 2 : ?> <i style="color:yellow;" class="fas fa-thermometer-quarter"></i><?php break;
                            case 3 : ?> <i style="color:orange;" class="fas fa-thermometer-half"></i><?php break;
                            case 4 : ?> <i style="color:red;" class="fas fa-thermometer-three-quarters"></i><?php break;
                            default : ?> <i style="color:black;" class="fas fa-thermometer-full"></i><?php break;
                        }
                        ?>
                        </div>
                        <a href="../config/updateSeverity.php?ticket=<?php echo $ticket['id']; ?>&sev=<?php echo 0; ?>"><?php echo $ticket['severity']; ?></a>
                    </div>
                    <div class="dev">
                        <div class="i">
                            <i class="fas fa-code"></i>
                        </div>
                        <a href="../config/updateDev.php?ticket=<?php echo $ticket['id']; ?>&dev=<?php echo 3; ?>">
                        <?php 
                        switch ($ticket['id_dev']) {
                            case 1 : ?> <div class="avatar1"></div><?php break;
                            case 2 : ?> <div class="avatar2"></div><?php break;
                            default : ?> <div class="avatar0"></div><?php break;
                        }
                        ?>
                        </a>
                    </div>
                </div>
                <div class="right">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <p><?php echo $ticket['user']; ?></p>
                </div>
            </div>
        </div>

        <?php
                
            }

            /* ----------------------------------------------------
            ----------------------------------------------------
            ---------------- FIN BOUCLE ---------------------
            ----------------------------------------------------
            ----------------------------------------------------
            */

        ?>
    </main>
    <script src="../../javascript/admin.js"></script>
</body>
</html>
<?php

include '../config/connexionBDD.php';

session_start();

if (!isset($_SESSION['id'])) header('Location: ../../../sae203.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Développeur <?php echo $_SESSION['id']; ?></title>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../styles/dev.css" />
    <link rel="shortcut icon" href="<?php
        if ($_SESSION['id'] == 'laetitia') echo "../../../assets/images/avatar2.svg";
        else echo "../../../assets/images/avatar1.svg";
    ?>" type="image/svg">
</head>
<body>
    <header>
        <div class="home">
            <div class="i">
                <a href="../config/logout.php"><i class="fas fa-home"></i></a>
            </div>
        </div>
        <div class="name">
            <h2>Développeur <?php echo $_SESSION['id'] ?></h2>

                <img src="<?php 

                    if ($_SESSION['id'] === 'laetitia') {
                        echo ('../../../assets/images/avatar2.svg');
                    } else {

                        echo ('../../../assets/images/avatar1.svg'); 
                    }
                
                ?>" alt="avatar" title="avatar"/>

            
        </div>
        <div class="logo">
            <div></div>
        </div>
    </header>
    <main>
        <div class="table">

            <div class="table_header">
                <div class="cell">ID</div>
                <div class="cell">Date</div>
                <div class="cell">Titre</div>
                <div class="cell">Description</div>
                <div class="cell">Sévérité</div>
                <div class="cell">Status</div>
            </div>

            
            <?php
            if ($_SESSION['id'] === 'laetitia' && $_SESSION['role'] == 1 ) 
            $devDatas = $db->query("SELECT * FROM sae203_tickets WHERE id_dev = 2 ORDER BY status DESC");
            else 
            $devDatas = $db->query("SELECT * FROM sae203_tickets WHERE id_dev = 1 ORDER BY status DESC");
            $devDatas->execute();
            $devs = $devDatas->fetchAll();
            
            foreach ($devs AS $dev) {
                

            ?>

            <div class="row">
                <div class="cell"><?php echo $dev['id']; ?></div>
                <div class="cell"><?php echo date("M j", strtotime($dev['date'])); ?></div>
                <div class="cell"><?php echo $dev['title']; ?></div>
                <div class="cell"><?php echo $dev['description']; ?></div>
                <div class="cell"><?php echo $dev['severity']; ?></div>
                <div class="cell"><?php 

                switch($dev['status']) {
                    case 0 : echo 'En attente'; break;
                    case 1 : echo 'Confirmé'; break;
                    case 2 : echo 'En traitement'; break;
                    case 3 : echo 'Terminé'; break;
                    default : echo ''; break;
                    
                } 
                
                ?></div>
            </div>

            <?php
            }
            ?>

    </div>
</main>
        <footer>
                <form action="../config/statusTicket.php" method="get">
                    <div class="top">
                        <h2>Définir le ticket : </h2>
                        <div>
                            <select name="ids" id="ids">
                                <?php
                                    foreach ($devs as $ticket) {
                                        echo "<option value='".$ticket['id']."'>".$ticket['id']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="middle">
                        <h2>Au status : </h2>
                        <div>
                            <select name="status" id="status">
                                <option value="">-- choisir statut --</option>
                                <option value="0">En attente</option>
                                <option value="1">Confirmé</option>
                                <option value="2">En cours de traitement</option>
                                <option value="3">Terminé</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Soumettre"/>
                </form>
        </footer>
</body>
</html>
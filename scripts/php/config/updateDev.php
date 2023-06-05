<?php

session_start();

include './connexionBDD.php';

$id = $_GET['ticket'];
$devData = $db->query("SELECT id_dev FROM sae203_tickets WHERE id = $id");
$devData->execute();
$dev = $devData->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugTracker | Administrateur</title>
    <link rel="stylesheet" type="text/css" href="../../../styles/updateDev.css" />
</head>
<body>
    <div class="card">
        <h1>Ticket n°<?php echo $id ?></h1>
        <div class="middle">
            <p>Développeur actuel : <span><?php foreach ($dev as $d) {
                if ($d['id_dev'] == 1) echo 'John'; 
                if ($d['id_dev'] == 2) echo 'Laetitia'; 
                if ($d['id_dev'] == 0) echo 'Non-assigné'; 
            }?></span></p>
            <p>Nouveau Développeur : </p>
        </div>
        <div class="bottom">
            <div class="top">
                <a href="./updateDev.php?dev=0&ticket=<?php echo $id;?>">Non-assigné</a>
            </div>
            <div class="mid">
                <a href="./updateDev.php?dev=1&ticket=<?php echo $id;?>">John</a>
            </div>
            <div class="bot">
                <a href="./updateDev.php?dev=2&ticket=<?php echo $id;?>">Laetitia</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php


switch ($_GET['dev']) {
    case 0 :    
        $sql = "UPDATE sae203_tickets SET id_dev = 0 WHERE id = $id";
        $updateDev = $db->prepare($sql);
        $updateDev->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
    case 1 :    
        $sql = "UPDATE sae203_tickets SET id_dev = 1 WHERE id = $id";
        $updateDev = $db->prepare($sql);
        $updateDev->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
    case 2 :    
        $sql = "UPDATE sae203_tickets SET id_dev = 2 WHERE id = $id";
        $updateDev = $db->prepare($sql);
        $updateDev->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
}



?>
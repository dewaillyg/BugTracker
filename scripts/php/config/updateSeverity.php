<?php

session_start();

include './connexionBDD.php';

if (!isset($_GET['sev'])) $_GET['sev'] = 0;

$id = $_GET['ticket'];
$severityData = $db->query("SELECT severity FROM sae203_tickets WHERE id = $id");
$severityData->execute();
$severity = $severityData->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugTracker | Administrateur</title>
    <link rel="stylesheet" type="text/css" href="../../../styles/severity.css" />
</head>
<body>
    <div class="card">
        <h1>Ticket n°<?php echo $id ?></h1>
        <div class="middle">
            <p>Sévérité actuelle : <span><?php foreach ($severity as $sev) echo $sev['severity']; ?></span></p>
            <p>Nouvelle sévérité : </p>
        </div>
        <div class="bottom">
            <a href="./updateSeverity.php?sev=1&ticket=<?php echo $id;?>">1</a>
            <a href="./updateSeverity.php?sev=2&ticket=<?php echo $id;?>">2</a>
            <a href="./updateSeverity.php?sev=3&ticket=<?php echo $id;?>">3</a>
            <a href="./updateSeverity.php?sev=4&ticket=<?php echo $id;?>">4</a>
            <a href="./updateSeverity.php?sev=5&ticket=<?php echo $id;?>">5</a>
        </div>
    </div>
</body>
</html>

<?php


switch ($_GET['sev']) {
    case 1 :    
        $sql = "UPDATE sae203_tickets SET severity = 1 WHERE id = $id";
        $updateSeverity = $db->prepare($sql);
        $updateSeverity->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
    case 2 :    
        $sql = "UPDATE sae203_tickets SET severity = 2 WHERE id = $id";
        $updateSeverity = $db->prepare($sql);
        $updateSeverity->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
    case 3 :    
         $sql = "UPDATE sae203_tickets SET severity = 3 WHERE id = $id";
         $updateSeverity = $db->prepare($sql);
        $updateSeverity->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
    case 4 :    
        $sql = "UPDATE sae203_tickets SET severity = 4 WHERE id = $id";
        $updateSeverity = $db->prepare($sql);
        $updateSeverity->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
    case 5 :    
        $sql = "UPDATE sae203_tickets SET severity = 5 WHERE id = $id";
        $updateSeverity = $db->prepare($sql);
        $updateSeverity->execute();
        header('Location: ../pages/admin.php?sort=title&dir=asc');
        break;
}



?>
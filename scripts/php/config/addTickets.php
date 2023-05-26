<?php

session_start();
include './connexionBDD.php';

echo date('m/d/Y H:i:s', time());



// $membersData = $db->query('SELECT * FROM bugtracker_members');
// $membersData->execute();
// $members = $membersData->fetchAll();

echo '<br/>'.'ticket validé';

?>
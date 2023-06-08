<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

try {

    $db = new PDO( 'mysql:host=localhost;dbname=db-dewaigui', 'usr-dewaigui', 'W0IzSiwp0l', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch ( Exception $e ) {

    die('Erreur : ' . $e->getMessage());

}

?>
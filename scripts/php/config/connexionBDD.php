<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

try {

    $db = new PDO( 'mysql:host=localhost;dbname=bugtracker', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch ( Exception $e ) {

    die('Erreur : ' . $e->getMessage());

}

?>
<?php

$id = $_POST['name'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

echo '<h1>Avant filtrage</h1>';
echo $id.'</br>'.$mail.'</br>'.$mdp;

echo '<h1>Après filtrage</h1>';
echo filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS).'<br/>';
echo filter_var($mail, FILTER_VALIDATE_EMAIL).'<br/>';
echo $mdp;

?>
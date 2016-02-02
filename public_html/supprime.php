<?php
$db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
$suppr = "DELETE FROM utilisateurs WHERE utilisateurs.login = '$_POST[login]'";
$request = $db->prepare($suppr);
$request->execute();
header('location:/projet_S1/public_html/compte.php');
?>

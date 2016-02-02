<?php
$db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
$ajout = "INSERT INTO utilisateurs (id, nom, prenom, login, password) VALUES (NULL, '$_POST[nom]', '$_POST[prenom]', '$_POST[login]', '$_POST[password]')";
$request = $db->prepare($ajout);
$request->execute();
header('location:/projet_S1/public_html/compte.php');
?>
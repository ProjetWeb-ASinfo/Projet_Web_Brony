<?php
include_once('session.php');

$db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
$login = "select * from utilisateurs where login = \"$_POST[identifiant]\" and password = \"$_POST[mdp]\"";
$request = $db->prepare($login);
$request->execute();
$session = $_SESSION['users'];

if ($utilisateur = $request->fetch(PDO::FETCH_ASSOC)) {
    foreach ($utilisateur as $i => $champ) { $_SESSION['users'][$i] = $utilisateur[$i]; }
}
header('location:/projet_S1/public_html');
?>
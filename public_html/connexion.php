<?php
include_once('session.php');

$db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
$login = "select * from utilisateurs where login = \"$_POST[identifiant]\" and password = \"\"";
$request = $db->prepare($login);
$request->execute();
$session = $_SESSION['users'];

if ($utilisateur = $request->fetch(PDO::FETCH_ASSOC)) {
    foreach ($utilisateur as $i => $champ)
    {
        $session[$i] = $utilisateur[$i];
        echo "$session[$i] ";
    }
}
//header('location:/projet_S1/public_html');
/*    $i++;
    if ($user['identifiant'] == $_POST['identifiant'] || $user['mdp'] == $_POST['mdp'])
    {
        $_SESSION['index'] = $i;
        
    }
}
header('location:/projet_S1/public_html');*/
?>
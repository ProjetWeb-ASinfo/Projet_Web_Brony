<?php
include_once('base.php');
$i = 0;
foreach($_SESSION['users'] as $user)
{
    $i++;
    if ($user['identifiant'] == $_POST['identifiant'] || $user['mdp'] == $_POST['mdp'])
    {
        $_SESSION['index'] = $i;
        header('location:/projet_S1/public_html');
    }
}
?>
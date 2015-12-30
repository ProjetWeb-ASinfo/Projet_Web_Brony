<?php
session_start();

if (!isset($_SESSION['index'])) {
    $_SESSION['index'] = 0;
    $_SESSION['users'][0] = array('nom' => 'Descoings',
                                'prenom' => 'Emeric',
                                'identifiant' => 'Quantum',
                                'mdp' => 'motdepasse');
}
?>

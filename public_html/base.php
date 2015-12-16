<?php
session_start();

if (!isset($_SESSION[])) {
$_SESSION[0] = array('nom' => 'Descoings',
                    'prenom' => 'Emeric',
                    'identifiant' => 'Quantum',
                    'mdp' => 'motdepasse',
                    'connexion' => False);
}
?>

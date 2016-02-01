<?php
include_once 'session.php';
$_SESSION['users'] = array('id' => '-1',
                               'nom' => '',
                               'prenom' => '',
                               'login' => '',
                               'password' => '');
header('location:/projet_S1/public_html');
?>
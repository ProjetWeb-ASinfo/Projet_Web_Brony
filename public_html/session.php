<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array('id' => '-1',
                               'nom' => '',
                               'prenom' => '',
                               'login' => '',
                               'password' => '');
}
?>
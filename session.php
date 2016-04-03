<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array('id' => '',
                               'nom' => '',
                               'prenom' => '',
                               'login' => '',
                               'password' => '');
}
?>
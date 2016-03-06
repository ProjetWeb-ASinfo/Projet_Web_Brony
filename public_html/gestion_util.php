<?php
    $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');

    if (isset($_POST['nom'])) {
        $ajout = "INSERT INTO utilisateurs (id, nom, prenom, login, password) VALUES (NULL, '$_POST[nom]', '$_POST[prenom]', '$_POST[login]', '$_POST[password]')";
        $request = $db->prepare($ajout);
        $request->execute();
        
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['login'] = $_POST['login'];
    } else {
        $test = "SELECT id FROM utilisateurs WHERE login = '$_POST[login]'";
        $request1 = $db->prepare($test);
        $request1->execute();
        
        if ($res = $request1->fetch(PDO::FETCH_ASSOC)) {
            $suppr = "DELETE FROM utilisateurs WHERE login = '$_POST[login]'";
            $request2 = $db->prepare($suppr);
            $request2->execute();
        }
    }
    header('location:/projet_S1/public_html/compte.php');
?>
<?php
include_once 'session.php';
$login = $_SESSION['users']['login'];
$db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['message'])) {
        $test = "SELECT id FROM utilisateurs WHERE login='$_POST[destinataire]'";
        $request1 = $db->prepare($test);
        $request1->execute();
        if ($resultat = $request1->fetch(PDO::FETCH_ASSOC)) {
            $envoi = "INSERT INTO messages (id, expediteur, destinataire, objet, message, status) "
                ."VALUES (NULL, '$login', '$_POST[destinataire]', '$_POST[objet]', '$_POST[message]', 0)";
            $request2 = $db->prepare($envoi);
            $request2->execute();
        } else {
            echo "<div class='alert alert-danger' style='margin-top: 4%; text-align: center'>"
            . "<strong>Erreur!</strong> L'utilisateur $_POST[destinataire] n'existe pas. Votre message n'a pas pu être envoyé</div>";
        }
    }
    $messages = "SELECT id, expediteur, objet FROM messages WHERE destinataire='$login' AND status=0";
    $request3 = $db->prepare($messages);
    $request3->execute();

    while ($result = $request3->fetch(PDO::FETCH_ASSOC))
        echo "<tr><td>$result[expediteur]</td><td><a href='#' id='$result[id]' name='link_msg' data-toggle='modal' data-target='#msg_modal'>$result[objet]</a></td>";
?>

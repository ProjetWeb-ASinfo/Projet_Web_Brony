<div class="panel panel-default">
    <?php
        include_once 'session.php';
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
            $login = $_SESSION['users']['login'];
            
            if (isset($_POST['message'])){
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
            
            else {
                $message = "SELECT objet, message, destinataire FROM messages WHERE id=$_POST[id]";
                $request1 = $db->prepare($message);
                $request1->execute();

                if (($result = $request1->fetch(PDO::FETCH_ASSOC)) && $result['destinataire']==$_SESSION['users']['login']) {
                    echo "<div class='panel-heading'>$result[objet]</div>";
                    echo "<div class='panel-body'>$result[message]</div>";

                    $status = "UPDATE messages SET status=1 WHERE id=$_POST[id]";
                    $request2 = $db->prepare($status);
                    $request2->execute();
                }
            }
        }
    ?>
</div>

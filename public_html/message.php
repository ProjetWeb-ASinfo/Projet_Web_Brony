<div class="panel panel-default">
    <?php
        include_once 'session.php';
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
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
    ?>
</div>

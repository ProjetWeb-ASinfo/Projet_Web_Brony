<?php include_once('session.php'); if ($_SESSION['users']['login']=='') header('location:/projet_S1/public_html'); ?>
<html>
<head><title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <style>
        body { background: none transparent; }
        .panel-default, .panel-body, .panel-heading {
            color: #1a001a;
            background: none transparent;
            border: none;
        }
    </style>
</head>

<body>
    <div class="panel panel-default">
        <?php
            include_once 'session.php';
            $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
            $message = "SELECT objet, message FROM messages WHERE id=$_GET[id]";
            $request1 = $db->prepare($message);
            $request1->execute();

            if ($result = $request1->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='panel-heading'>$result[objet]</div>";
                echo "<div class='panel-body'>$result[message]</div>";
            }
            
            $status = "UPDATE messages SET status=1 WHERE id=$_GET[id]";
            $request2 = $db->prepare($status);
            $request2->execute();
        ?>
    </div>
</body>
</html>

<?php include_once('session.php'); if ($_SESSION['users']['login']=='') header('location:/projet_S1/public_html'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Compte</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/custom.css">    
        <style type="text/css">
            .nav-pills {
                margin-top: 50%;
            }
            .nav-pills > li.active > a,
            .nav-pills > li.active > a:focus,
            .nav-pills > li.active > a:hover {
                background-color: rgb(170, 51, 255);
                color: #fff;
            }
            .nav-pills > li > a { color: #ffccff; }
            .nav-pills > li > a:hover {
                background-color: rgba(170, 51, 255, 0.5);
                color: #fff;
            }

            .tab-content {
                display: block;
                background-color: rgba(143, 92, 245, 0.9);
                color: #feeafe;
                margin-top: 5%;
                border-style: solid;
                border-width: 5pt;
                border-color: #ffccff;
            }

            thead {
                background-color: rgba(230, 51, 230, 0.4);
                font-size: 15pt;
                color: rgb(255, 180, 255);
            }
            tbody {
                background-color: rgba(235, 92, 235, 0.4);
                color: rgb(252, 232, 252);
            }

            .form-control {
                 color: #800080;
                 background-color: #ffe6ff;
            }
        </style>
    </head>
    
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container">
            <div id="menu_compte" class="panel panel-default col-lg-2 col-lg-offset-1">
                <ul class="panel-body nav nav-pills nav-stacked">
                    <li class="active"><a data-toggle="pill" href="#profil">Profil</a></li>
                    <li><a data-toggle="pill" href="#achats">Mes achats</a></li>
                    <li><a data-toggle="pill" href="#ventes">Mes vente</a></li>
                    <li><a data-toggle="pill" href="#ajouter">Ajouter un poneys</a></li>
                    <li><a data-toggle="pill" href="#messages">Mes messages</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-lg-offset-4 col-sm-offset-4 tab-content">
                <div id="profil" class="tab-pane fade in active">
                    <h1>Profil</h1>
                    <p>
                        <img src="user.png" alt="Image de profil" /><br><br>
                        <h2>Nom: </h2>
                        <?php
                            $user = $_SESSION['users'];
                            echo "$user[nom]";
                        ?>
                    <p>
                        <h2>Prénom: </h2>
                        <?php echo "$user[prenom]"; ?>
                    <p>
                        <h2>Nom d'utilisateur: </h2>
                        <?php echo "$user[login]"; ?>
                </div>
                <div id="achats" class="tab-pane fade">
                    <h1>Mes derniers achats</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Type</td>
                                <td>Nom</td>
                                <td>Ancien propriétaire</td>
                                <td>Prix d'achat</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $login = $_SESSION['users']['login'];
                                $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
                                $achats = "SELECT type, nom, ancien_proprietaire, prix FROM achats WHERE proprietaire='$login'";
                                $request1 = $db->prepare($achats);
                                $request1->execute();

                                while ($ligne = $request1->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>';
                                    foreach ($ligne as $i => $cellule) {
                                        echo "<td>$cellule</td>";
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div id="ventes" class="tab-pane fade">
                    <h1>Mes poney en ventes</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Type</td>
                                <td>Nom</td>
                                <td>Vendu à</td>
                                <td>Prix de vente</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $vente = "SELECT type, nom, nouveau_proprietaire, prix FROM ventes WHERE proprietaire='$login'";
                                $request2 = $db->prepare($vente);
                                $request2->execute();

                                while ($ligne = $request2->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>';
                                    foreach ($ligne as $i => $cellule) {
                                        echo "<td>$cellule</td>";
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div id="ajouter" class="tab-pane fade">
                    <h1>Ajouter un poney en vente</h1>
                    
                </div>
                
                <div id="messages" class="tab-pane fade">
                    <h1>Messages</h1>
                    <table class="table">
                        <thead style="font-size: 13pt">
                            <tr><td>Expéditeur</td><td>Objet</td></tr>
                        </thead>
                        <tbody>
                            <?php                                
                                if ($_SERVER['REQUEST_METHOD']=='POST') {
                                    $test = "SELECT id FROM utilisateurs WHERE login=$_POST[destinataire]";
                                    $request1 = $db->prepare($test);
                                    $request1->execute();
                                    if ($resultat = $request1->fetch(PDO::FETCH_ASSOC)) {
                                        $envoi = "INSERT INTO messages (id, expediteur, destinataire, objet, message, status) "
                                            ."VALUES (NULL, '$login', '$_POST[destinataire]', '$_POST[objet]', '$_POST[message]', 0)";
                                        $request2 = $db->prepare($envoi);
                                        $request2->execute();
                                    } else {
                                        echo "<div class='alert alert-danger' style='margin-top: 4%; text-align: center'>"
                                        . "<strong>Erreur!</strong> L'utilisateur $_POST[destinataire] n'existe pas. Votre message n'a pas put être envoyé</div>";
                                    }
                                }
                                $messages = "SELECT id, expediteur, objet FROM messages WHERE destinataire='$login' AND status=0";
                                $request3 = $db->prepare($messages);
                                $request3->execute();
                                
                                while ($result = $request3->fetch(PDO::FETCH_ASSOC))
                                    echo "<tr><td>$result[expediteur]</td><td><a href='message.php?id=$result[id]' target='msg_frame' data-toggle='modal' data-target='#msg_modal'>$result[objet]</a></td>";
                            ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="msg_modal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="background-color: rgb(255, 230, 255);">
                                <iframe src="" name="msg_frame" allowtransparency="true" style="width: 100%; border: none;"></iframe>
                                <script>
                                    msg_frame = document.getElementsByName('msg_frame');
                                        msg_frame.onload = function(){
                                        msg_frame.style.height = msg_frame.contentDocument.body.scrollHeight +'px';
                                    };
                                </script>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h2>Écrire un message</h2>
                    <form id="envoyer" action="administrateur.php" method="post">
                        <div class="panel panel-default form-group">
                            <div class="panel-heading" style="background-color: #661aff;">
                                <input type="text" id="obj" name="objet" value="Objet du message" class="form-control" />
                                <input type="text" id="dest" name="destinataire" value="Login du destinataire" class="form-control" />
                            </div>
                            <div class="panel-body" style="background-color: #661aff;">
                                <label for="texte">Message</label>
                                <textarea id="texte" name="message" class="form-control" rows="10">Bonjour,</textarea>
                            </div>
                            <h2><button type="submit" class="btn btn-block btn-default">Envoyer</button></h2>
                        </div>
                    </form>
                    <script>
                        objet = document.getElementById('obj');
                        destinataire = document.getElementById('dest');
                        
                        objet.onfocus = function() {
                            if (objet.value=='Objet du message')
                                objet.value = '';
                        };
                        objet.onblur = function() {
                            if (objet.value=='')
                                objet.value = 'Objet du message';
                        };
                        
                        destinataire.onfocus = function() {
                            if (destinataire.value=='Login du destinataire')
                                destinataire.value = '';
                        };
                        destinataire.onblur = function() {
                            if (destinataire.value=='')
                                destinataire.value = 'Login du destinataire';
                        };
                        
                        $('#envoyer').submit(function() {
                            if (destinataire.value=='' || objet.value=='') {
                                alert('Vous devez entrer un login et un objet!');
                                return false;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
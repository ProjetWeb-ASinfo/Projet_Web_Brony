<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <style type="text/css">
            
            .body, .modal-open {
                background-image: url("css/background.png");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                font-family: fantasy;
            }
            
            #menu_compte {
                background-color: rgba(153, 102, 255, 0.8);
                display: block;
                position: fixed;
                height: 100%;
                margin-top: 4%;
            }
            
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
            
            .T2 {
                font-size: 15pt;
                font-family: Arial;
            }
            
            h1 {
                text-align: center;
            }
            
            #resultat {
                border: 1px solid rgb(255, 180, 255);
                border-radius: 15px;
                width: 100%;
                height: 0px;
            }
            
            table a {
                text-decoration: none;
                color: white;
            }
            table a:hover { color: #feeafe; }
            
            .form-control {
                 color: #800080;
                 background-color: #ffe6ff;
            }
        </style>
    </head>
    <body class="body">
        <?php include 'navbar.php'; ?>

        <div class="container">
            <div id="menu_compte" class="panel panel-default col-lg-2 col-lg-offset-1">
                <ul class="panel-body nav nav-pills nav-stacked">
                    <li class="active"><a data-toggle="pill" href="#profil">Profil</a></li>
                    <li><a data-toggle="pill" href="#chercher">Chercher un utilisateur</a></li>
                    <li><a data-toggle="pill" href="#ajouter">Ajouter un utilisateur</a></li>
                    <li><a data-toggle="pill" href="#supprimer">Supprimer un utilisateur</a></li>
                    <li><a data-toggle="pill" href="#messages">Mes messages</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-lg-offset-4 col-sm-offset-4 tab-content">
                <div id="profil" class="tab-pane fade in active">
                    <h1>Profil</h1>
                    <p>
                        <img src="user.png" alt="Image de profil" /><br><br>
                        <span class="T2">Nom: </span>
                        <?php
                            include_once 'session.php';
                            $user = $_SESSION['users'];
                            echo "$user[nom]";
                        ?>
                    </p>
                    <p>
                        <span class="T2">Prénom: </span>
                        <?php echo "$user[prenom]"; ?>
                    </p>
                    <p>
                        <span class="T2">Nom d'utilisateur: </span>
                        <?php echo "$user[login]"; ?>
                    </p>
                </div>
                <div id="chercher" class="tab-pane fade">
                    <h1>Chercher</h1>
                    <form action="recherche.php" method="get" target="frame" id="recherche">
                        <span class="T2">Nom: </span><input type="text" class="form-control" name="nom" />
                        <br>
                        <span class="T2">Prénom: </span><input type="text" class="form-control" name="prenom" />
                        <br>
                        <span class="T2">Nom d'utilisateur: </span><input type="text" class="form-control" name="login" />
                        <br>
                        <center><button type="submit" class="btn btn-default"><span class="T2">Rechercher</span></button></center>
                    </form>
                    <br>
                    <iframe src="" name="frame" id="resultat" allowtransparency="true" scrolling="no"></iframe>
                    <script>
                        $('#recherche').submit(function (){
                            document.getElementById('resultat').style="height: 100%";
                        });

                        res_frame = document.getElementById('resultat');
                        res_frame.onload=function (){
                            frame.style.height=frame.contentDocument.body.scrollHeight +"px";
                        };
                    </script>
                </div>
                <div id="ajouter" class="tab-pane fade">
                    <h1>Nouveau compte</h1>
                    <form action="gestion_util.php" method="post">
                        <span class="T2">Nom: </span><input type="text" class="form-control" name="nom" />
                        <br>
                        <span class="T2">Prénom: </span><input type="text" class="form-control" name="prenom" />
                        <br>
                        <span class="T2">Nom d'utilisateur: </span><input type="text" class="form-control" name="login" />
                        <br>
                        <span class="T2">Mot de passe: </span><input type="password" class="form-control" name="password" />
                        <br>
                        <span class="T2">Répétez le mot de passe: </span><input type="password" class="form-control" name="repeter" value="" />
                        <br>
                        <center><button type="submit" class="btn btn-default"><span class="T2">Valider</span></button></center>
                    </form>
                </div>
                <div id="supprimer" class="tab-pane fade">
                    <h1>Supprimer un compte</h1>
                    <form action="gestion_util.php" method="post">
                        <span class="T2">Login de l'utilisateur: </span><input type="text" class="form-control" name="login" />
                        <center><button type="submit" class="btn btn-default"><span class="T2">Valider</span></button></center>
                    </form>
                </div>
                <div id="messages" class="tab-pane fade">
                    <h1>Messages</h1>
                    <table class="table">
                        <thead style="font-size: 13pt">
                            <tr><td>Expéditeur</td><td>Objet</td></tr>
                        </thead>
                        <tbody>
                            <?php
                            $login = $_SESSION['users']['login'];
                                $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
                                $messages = "SELECT id, expediteur, objet FROM messages WHERE destinataire='$login' AND status=0";
                                $request = $db->prepare($messages);
                                $request->execute();
                                
                                while ($result = $request->fetch(PDO::FETCH_ASSOC))
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
                    
                    <span class="T2">Écrire un message</span>
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
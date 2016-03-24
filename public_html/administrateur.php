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
            
            tbody { background-color: rgba(235, 92, 235, 0.4); }
            
            tbody > tr > td > a, tbody > tr > td > a:focus {
                color: #fce9fc;
                text-decoration: none;
            }
            tbody > tr > td > a:hover { color: #f9d2f9; }
            
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
                        <span class="h2">Nom: </span>
                        <?php
                            $user = $_SESSION['users'];
                            echo "$user[nom]";
                        ?>
                    </p>
                    <p>
                        <span class="h2">Prénom: </span>
                        <?php echo "$user[prenom]"; ?>
                    </p>
                    <p>
                        <span class="h2">Nom d'utilisateur: </span>
                        <?php echo "$user[login]"; ?>
                    </p>
                </div>
                
                <div id="chercher" class="tab-pane fade">
                    <h1>Chercher</h1>
                    <form action="recherche.php" method="get" target="frame" id="recherche">
                        <h2>Nom: </h2><input type="text" class="form-control" name="nom" />
                        <br>
                        <h2>Prénom: </h2><input type="text" class="form-control" name="prenom" />
                        <br>
                        <h2>Nom d'utilisateur: </h2><input type="text" class="form-control" name="login" />
                        <br>
                        <center><h2><button type="submit" class="btn btn-default">Rechercher</button></h2></center>
                    </form>
                    <br>
                    <iframe src="" name="frame" id="resultat" allowtransparency="true" scrolling="no"></iframe>
                    <script>
                        res_frame = document.getElementById('resultat');
                        res_frame.onload = function (){
                            res_frame.style.height=res_frame.contentDocument.body.scrollHeight -20 +"px";
                        };
                    </script>
                </div>
                
                <div id="ajouter" class="tab-pane fade">
                    <h1>Nouveau compte</h1>
                    <form action="gestion_util.php" method="post">
                        <h2>Nom: </h2><input type="text" class="form-control" name="nom" />
                        <br>
                        <h2>Prénom: </h2><input type="text" class="form-control" name="prenom" />
                        <br>
                        <h2>Nom d'utilisateur: </h2><input type="text" class="form-control" name="login" />
                        <br>
                        <h2>Mot de passe: </h2><input type="password" class="form-control" name="password" />
                        <br>
                        <h2>Répétez le mot de passe: </h2><input type="password" class="form-control" name="repeter" value="" />
                        <br>
                        <center><button type="submit" class="btn btn-default"><span class="h2">Valider</span></button></center>
                    </form>
                </div>
                
                <div id="supprimer" class="tab-pane fade">
                    <h1>Supprimer un compte</h1>
                    <form action="gestion_util.php" method="post">
                        <h2>Login de l'utilisateur: </h2><input type="text" class="form-control" name="login" />
                        <center><button type="submit" class="btn btn-default"><span class="h2">Valider</span></button></center>
                    </form>
                </div>
                
                <div id="messages" class="tab-pane fade">
                    <h1>Messages</h1>
                    <table class="table">
                        <thead style="font-size: 13pt">
                            <tr><td>Expéditeur</td><td>Objet</td></tr>
                        </thead>
                        <tbody>
                            <?php include 'liste_msg.php'; ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="msg_modal">
                        <div class="modal-dialog modal-lg">
                            <div id="modal_msg" class="modal-content">
                            </div>
                        </div>
                    </div>
                    <script>
                        $("a[name='link_msg']").click(function() {
                            $.post("message.php", {id: $(this).attr("id")}, function(result) {
                                $("#modal_msg").html(result);
                            });
                        });
                    </script>
                    
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
                            <button type="submit" class="btn btn-block btn-default"><span class="h2">Envoyer</span></button>
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
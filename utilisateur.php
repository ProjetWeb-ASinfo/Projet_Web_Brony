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
                 display: inline;
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
                    <li><a data-toggle="pill" href="#ventes">Mes ventes</a></li>
                    <li><a data-toggle="pill" href="#ajouter">Ajouter/supprimer</a></li>
                    <li><a data-toggle="pill" href="#messages">Mes messages</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-lg-offset-4 col-sm-offset-4 tab-content">
                <div id="profil" class="tab-pane fade in active">
                    <h1>Profil</h1>
                    <?php
                        $login = $_SESSION['users']['login'];
                        $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
                        if ($_SERVER['REQUEST_METHOD']=='POST') {
                            $update = "UPDATE utilisateurs SET nom='$_POST[nv_nom]', prenom='$_POST[nv_prenom]', login='$_POST[nv_login]' WHERE login='$login'";
                            $request1 = $db->prepare($update);
                            $request1->execute();
                            $login = "SELECT * FROM utilisateurs WHERE login = '$_POST[nv_login]'";
                            $request2 = $db->prepare($login);
                            $request2->execute();

                            if ($utilisateur = $request2->fetch(PDO::FETCH_ASSOC)) {
                                foreach ($utilisateur as $i => $champ) { $_SESSION['users'][$i] = $utilisateur[$i]; }
                            }
                        }
                    ?>
                    <form method="post" action="utilisateur.php" id="form_prof">
                        <img src="user.png" alt="Image de profil" /><br><br>
                        <label for="nom" class="h2">Nom: </label>
                        <input type="text" id="nom" name="nv_nom" class="form-control" value=<?php $user = $_SESSION['users']; echo "'$user[nom]'"; ?> />
                        <label for="prenom" class="h2">Prénom: </label>
                        <input type="text" id="prenom" name="nv_prenom" class="form-control" value=<?php echo "'$user[prenom]'"; ?> />
                        <label for="login" class="h2">Nom d'utilisateur: </label>
                        <input type="text" id="login" name="nv_login" class="form-control" value=<?php echo "'$user[login]'"; ?> />
                        <button type="submit" class="btn btn-success btn-block h2">Modifier</button>
                        <br>
                    </form>
                    <script>
                        $("#form_prof").submit(function () {
                            if (($("#nom").val()=="") || ($("#prenom").val()=="") || $("#login").val())=="") {
                                alert("Aucun champ ne doit être laissé vide!");
                                return false;
                            }
                        });
                    </script>
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
                    <h1>Mes poneys en ventes</h1>
                    <div class="modal fade" id="vente_modal">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: rgba(77, 0, 77, 0.8);">
                                <div class="modal-header" style="background-color: #800080;">
                                    <h1>Vendre ce poney</h1>
                                </div>
                                <div class="modal-body" style="background: none;">
                                    <form action="utilisateur.php" method="post" class="h2">
                                        <p>
                                        <div class="col-lg-5">Référence: </div>
                                        <input type="text" id="id" name="id" class="form-control" readonly style="width: 50%" />
                                        <p style="margin-top: 5%">
                                        <span class="col-lg-5">Login de l'acheteur: </span>
                                        <input type="text" class="form-control" id="nouveau" name="nouveau" style="width: 50%" />
                                        <p style="margin-top: 5%">
                                        <span class="col-lg-5">Au prix de: </span>
                                        <input type="number" class="form-control" id="prix" name="prix" min="0" style="width: 20%" /> €
                                        <p style="margin-top: 7%">
                                        <button type="submit" class="btn btn-success btn-block btn-lg"><span class="h2">Valider</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Type</td>
                                <td>Nom</td>
                                <td>Vendu à</td>
                                <td>Prix de vente</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($_SERVER['REQUEST_METHOD']=='POST') {
                                    
                                    if (isset($_POST['nv_nom'])) {
                                        $ajout = "INSERT INTO ventes (id, type, nom, prix, proprietaire, nouveau_proprietaire)"
                                                . "VALUES (NULL, '$_POST[nv_type]', '$_POST[nv_nom]', '$_POST[nv_prix]', '$login', '')";
                                        $request4 = $db->prepare($ajout);
                                        $request4->execute();
                                    }
                                    
                                    if (isset($_POST['supprimer'])) {
                                        $supprimer="DELETE FROM ventes WHERE id=$_POST[supprimer]";
                                        $request5 = $db->prepare($supprimer);
                                        $request5->execute();
                                    }
                                    
                                    if (isset($_POST['id'])) {
                                        $test1 = "SELECT id FROM utilisateurs WHERE login='$_POST[nouveau]'";
                                        $request1 = $db->prepare($test1);
                                        $request1->execute();

                                        $test2 = "SELECT * FROM ventes WHERE id='$_POST[id]'";
                                        $request2 = $db->prepare($test2);
                                        $request2->execute();
                                        $poney = $request2->fetch(PDO::FETCH_ASSOC);

                                        if (($res1=$request1->fetch(PDO::FETCH_ASSOC)) && $poney['proprietaire']==$login) {
                                            $vente = "UPDATE ventes SET nouveau_proprietaire='$_POST[nouveau]', prix='$_POST[prix]' WHERE id='$_POST[id]'";
                                            $request1 = $db->prepare($vente);
                                            $request1->execute();

                                            $achat = "INSERT INTO achats (id, type, nom, prix, proprietaire, ancien_proprietaire) "
                                                    . "VALUES (NULL, '$poney[type]', '$poney[nom]', $_POST[prix], '$_POST[nouveau]', '$login')";
                                            $request2 = $db->prepare($achat);
                                            $request2->execute();
                                        } else {
                                            echo "<div class='alert alert-danger' style='margin-top: 4%; text-align: center'>"
                                            . "<strong>Erreur!</strong> L'utilisateur $_POST[nouveau] n'existe pas ou le poney ne vous appartient pas.</div>";
                                        }
                                    }
                                }
                            
                                $vente = "SELECT id, type, nom, nouveau_proprietaire, prix FROM ventes WHERE proprietaire='$login'";
                                $request2 = $db->prepare($vente);
                                $request2->execute();

                                while ($ligne = $request2->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>'
                                       . "<td>$ligne[type]</td>"
                                       . "<td>$ligne[nom]</td>"
                                       . "<td>$ligne[nouveau_proprietaire]</td>"
                                       . "<td name=$ligne[id]>$ligne[prix]</td><td>";
                                    
                                    if ($ligne['nouveau_proprietaire']=='')
                                        echo "<button id='$ligne[id]' name='vendre' class='btn btn-block btn-default' data-toggle='modal' data-target='#vente_modal'>Vendre</button>";
                                    echo '</td></tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        $("button[name='vendre']").click(function() {
                            var id = $(this).attr("id");
                            $("#id").val(id);
                            $("#prix").val($("td[name='"+id+"']").text());
                        });
                    </script>
                </div>
                
                <div id="ajouter" class="tab-pane fade">
                    <h1>Ajouter un poney en vente</h1>
                    <form action="utilisateur.php" method="post">
                        <label class="h2">Nom: </label>
                        <input type="text" name="nv_nom" class="form-control" />
                        <label class="h2">Type: </label>
                        <select name="nv_type" class="form-control">
                            <option>Poney</option>
                            <option>Licorne</option>
                            <option>Pégase</option>
                            <option>Alicorne</option>
                        </select>
                        <label class="h2">Prix de vente: </label>
                        <input type="number" name="nv_prix" min="0" class="form-control" />
                        <br>
                        <button type="submit" class="btn btn-block btn-default h2">Valider</button>
                    </form>
                    
                    <h1>Supprimer un poney de la vente</h1>
                    <form action="utilisateur.php" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Type</td>
                                    <td>Nom</td>
                                    <td>Prix de vente</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                
                                    $aff = "SELECT id, type, nom, prix FROM ventes WHERE proprietaire='$login' AND nouveau_proprietaire=''";
                                    $request6 = $db->prepare($aff);
                                    $request6->execute();

                                    while ($ligne = $request6->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>"
                                           . "<td>$ligne[type]</td>"
                                           . "<td>$ligne[nom]</td>"
                                           . "<td>$ligne[prix]</td><td>"
                                           . "<button type='submit' name='supprimer' class='btn btn-block btn-danger' value='$ligne[id]'>Supprimer</button>"
                                           . "</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
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
                            $messages = "SELECT id, expediteur, objet FROM messages WHERE destinataire='$login' AND status=0";
                            $request3 = $db->prepare($messages);
                            $request3->execute();
                            while ($result = $request3->fetch(PDO::FETCH_ASSOC))
                            echo "<tr><td>$result[expediteur]</td><td><a href='#' id='$result[id]' name='link_msg' data-toggle='modal' data-target='#msg_modal'>$result[objet]</a></td>";
                        ?>
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
                    <form id="envoyer" action="message.php" method="post">
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
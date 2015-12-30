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
            
            .nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover {
                background-color: rgb(170, 51, 255);
                color: #fff;
            }
            
            .nav-pills>li>a { color: #ffccff; }
            .nav-pills>li>a:hover {
                background-color: rgba(170, 51, 255, 0.5);
                color: #fff;
            }
            
            .tab-content {
                display: block;
                background-color: #e48300;
                color: #ffff99;
                margin-top: 5%;
                border-style: solid;
                border-width: 5pt;
                border-color: #ffff99;
            }
            
            .T2 {
                font-size: 15pt;
                font-family: Arial;
            }
            
            h1 {
                text-align: center;
            }
            
        </style>
        
    </head>
    <body>
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
                        include_once 'base.php';
                        $user = $_SESSION['users'][$_SESSION['index']];
                        echo "$user[nom]";
                        ?>
                    </p>
                    <p>
                        <span class="T2">Prénom: </span>
                        <?php
                        echo "$user[prenom]";
                        ?>
                    </p>
                    <p>
                        <span class="T2">Identifiant </span>
                        <?php
                        echo "$user[identifiant]";
                        ?>
                    </p>
                </div>
                <div id="chercher" class="tab-pane fade">
                    <h1>Chercher</h1>
                    <p>
                    This is another interesting div!
                    I, too, sing America.
                    I am the darker brother.
                    They send me to eat in the kitchen
                    When company comes,
                    But I laugh,
                    And eat well,
                    And grow strong.
                    am the darker brother.
                    They send me to eat in the kitchen
                    When compan
                    Tomorrow,
                    I'll be at the table
                    When company comes.
                    Nobody'll dare
                    Say to me,
                    "Eat in the kitchen,"
                    Then.
                    Besides,
                    They'll see how beautiful I am
                    And be ashamed--
                    </p>
                </div>
                <div id="ajouter" class="tab-pane fade">
                    <h1>Ajouter</h1>
                    <p>
                    This is another interesting div!
                    I, too, sing America.
                    I am the darker brother.
                    They send me to eat in the kitchen
                    When company comes,
                    But I laugh,
                    And eat well,
                    And grow strong.


                    Then.
                    Besides,
                    They'll see how beautiful I am
                    And be ashamed--
                    </p>
                </div>
                <div id="supprimer" class="tab-pane fade">
                    <h1>Supprimer</h1>
                    <p>
                    This is another interesting div!
                    I, too, sing America.
                    I am the darker brother.
                    They send me to eat in the kitchen
                    When company comes,
                    But I laugh,
                    And eat well,
                    And grow strong.

                    Tomorrow,
                    I'll be at the table
                    When company comes.
                    Nobody'll dare
                    Say to me,
                    "Eat in the kitchen,"
                    Then.
                    Besides,
                    They'll see how beautiful I am
                    And be ashamed--
                    Tomorrow,
                    I'll be at the table
                    When company comes.
                    Nobody'll dare
                    Say to me,
                    "Eat in the kitchen,"
                    Then.
                    Besides,
                    They'll see how beautiful I am
                    And be ashamed--
                    </p>
                </div>
                <div id="messages" class="tab-pane fade">
                    <h1>Messages</h1>
                    <p>
                    This is another interesting div!
                    I, too, sing America.
                    I am the darker brother.
                    They send me to eat in the kitchen
                    When company comes,
                    But I laugh,
                    And eat well,
                    And grow strong.

                    Tomorrow,
                    I'll be at the table
                    When company comes.
                    Nobody'll dare
                    Say to me,
                    "Eat in the kitchen,"
                    Then.
                    Besides,
                    They'll see how beautiful I am
                    And be ashamed--
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
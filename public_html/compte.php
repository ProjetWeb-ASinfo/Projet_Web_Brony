<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        
        <style type="text/CSS">
            body
            {
                background-image: url("background.png");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
                font-family: fantasy;
            }
            .menu
            {
                background: linear-gradient(to bottom, rgba(240, 51, 240, 0.8), rgba(240, 51, 240, 0.3));
                border: none;
            }             
            #mainDisplay { background-color: rgba(255, 51, 255,.6); }
            .menu-button
            {
                color : rgb(255, 180, 255);
                background-color: rgb(235, 21, 235);
                border-color: rgb(200, 0, 200);
                font-size: 150%;
            }
            .menu-button:hover, menu-button:focus
            {
                color : rgb(235, 21, 235);
                background-color: rgb(255, 180, 255);
            }
            .dropdown
            {
                position: relative;
                display: inline-block;
            }
            .dropdown-content
            {
                display: none;
                position: absolute;
                background-color: rgba(235, 21, 235, 0.7);
                z-index: 1;
            }
            .dropdown-content a {
                text-decoration: none;
                color: rgb(255, 180, 255);
                display: block;
                padding: 10px 10px;
                min-width: 100%;
            }
            .dropdown-content a:hover { background-color: rgba(235, 21, 235, 0.8); }
            .dropdown:hover .dropdown-content { display: block; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-fixed-top menu">
            <div class="container-fluid">
                <div  class="col-sm-10 col-sm-offset-2">
                    <ul class="nav navbar-nav">
                        <li><button class="btn menu-button">Accueil</button></li>
                        <li class="dropdown">
                            <button class="btn menu-button">Achats</button>
                            <div class="dropdown-content">
                                <a href="#">Little Poneys</a>
                                <a href="#">Licornes</a>
                                <a href="#">Others…</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <button class="btn menu-button">Ventes</button>
                            <div class="dropdown-content">
                                <a href="#">Revendre</a>
                                <a href="#">Clauses revendeur</a>
                            </div>
                        </li>
                        <li><button class="btn menu-button">FAQ</button></li>
                        <li><button class="btn menu-button">Contact</button></li>
                        <li class="dropdown">
                            <button class="btn menu-button">Mon Compte</button>
                            <div class="dropdown-content">
                                <?php
                                    include_once('base.php');
                                    $i = $_SESSION['index'];
                                    if ($i<>0)
                                    {
                                        $user = $_SESSION['users'][$i];
                                        echo "<a href='#'><span class='glyphicon glyphicon-user'></span>    $user[identifiant]</a>";
                                        echo '<a href="deconnexion.php"><span class="glyphicon glyphicon-log-in"></span>    Déconnexion</a>';
                                    }
                                    else
                                    {
                                        echo '<form action="connexion.php" method="POST">';
                                        echo 'Identifiant<br><input type="text" name="identifiant" />';
                                        echo 'Mot de passe<br><input type="password" name="mdp" />';
                                        echo '<input type="submit" value="Connexion" />';
                                        echo '</form>';
                                    }
                                ?>
                            </div>                    
                        </li>
                        <li class="dropdown">
                            <button class="btn menu-button">À propos</button>
                            <div class="dropdown-content">
                                <a href="#">Le site</a>
                                <a href="#">La team</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
    </body>
</html>
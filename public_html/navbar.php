<?php
echo '<nav class="navbar navbar-fixed-top menu">
        <div class="container-fluid">
            <div  class="col-sm-10 col-sm-offset-2">
                <ul class="nav navbar-nav">
                    <li><a class="btn menu-button" href="/projet_S1/public_html">Accueil</a></li>
                    <li class="dropdown">
                        <a class="btn menu-button">Achats</a>
                        <div class="dropdown-content">
                            <a href="#">Little Poneys</a>
                            <a href="#">Licornes</a>
                            <a href="#">Others…</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="btn menu-button">Ventes</a>
                        <div class="dropdown-content">
                            <a href="#">Revendre</a>
                            <a href="#">Clauses revendeur</a>
                        </div>
                    </li>
                    <li><a class="btn menu-button">FAQ</a></li>
                    <li><a class="btn menu-button">Contact</a></li>
                    <li class="dropdown">
                        <a class="btn menu-button">Mon Compte</a>
                        <div class="dropdown-content">';

                            include_once('base.php');
                            $i = $_SESSION['index'];
                            if ($i<>-1)
                            {
                                $user = $_SESSION['users'][$i];
                                echo "<a href='compte.php'><span class='glyphicon glyphicon-user'></span>    $user[identifiant]</a>";
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

                  echo '</div>                    
                    </li>
                    <li class="dropdown">
                        <a class="btn menu-button">À propos</a>
                        <div class="dropdown-content">
                            <a href="#">Le site</a>
                            <a href="#">La team</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';
?>
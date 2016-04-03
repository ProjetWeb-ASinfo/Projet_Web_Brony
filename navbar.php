<nav class="navbar navbar-fixed-top menu">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a class="btn menu-button" href="/Projet_Web_Brony">Accueil</a></li>
            <li class="dropdown">
                <a class="btn menu-button">Achats</a>
                <div class="dropdown-content">
                    <a href="#">Poneys</a>
                    <a href="#">Licornes</a>
                    <a href="#">Pégases</a>
                    <a href="#">Alicornes</a>
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
                <div class="dropdown-content">
                    <?php

                        if ($_SESSION['users']['login']!='')
                        {
                            $user = $_SESSION['users'];
                            if ($user['login']=='Quantum')
                                echo "<a href='administrateur.php'>";
                            else                                       
                                echo "<a href='utilisateur.php'>";

                            echo "<span class='glyphicon glyphicon-user'></span>    $user[login]</a>";
                            echo '<a href="index.php?deco=true"><span class="glyphicon glyphicon-log-in"></span>    Déconnexion</a>';
                        }
                        else
                        {
                            echo '<form action="index.php" method="POST">
                                    Identifiant
                                    <br><input type="text" class="form-control" name="identifiant" />
                                    Mot de passe
                                    <br><input type="password" class="form-control" name="mdp" />
                                    <button type="submit" class="btn btn-default" style="min-width: 100%">Connexion</button>
                                  </form>
                                  <a href="ajout_util.php">créer un compte</a>';
                        }
                    ?>
                </div>
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
</nav>

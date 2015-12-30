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
        
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <style type="text/css">
            
            #menu_compte {
                background-color: rgba(153, 102, 255, 0.8);
                display: block;
                position: fixed;
                height: 100%;
            }
            
            #menu_compte ul {
                margin-top: 50%;
            }
            
        </style>
        
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container">
            <div id="menu_compte" class="col-lg-2 col-lg-offset-1">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#Profil">Profil</a></li>
                    <li><a href="#Rechercher">Rechercher un utilisateur</a></li>
                    <li><a href="#Ajouter">Ajouter un utilisateur</a></li>
                    <li><a href="#Supprimer">Supprimer un utilisateur</a></li>
                    <li><a href="#Messages">Mes messages</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
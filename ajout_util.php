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
            .T2 {
                font-size: 15pt;
                font-family: Arial;
                color: #ff33ff;
            }
            
            h1 {
                text-align: center;
                color: #ffccff;
            }
            
            .panel {
                margin-top: 5%;
                background-color: rgba(255, 51, 255, .5);
            }
            
            .panel-default .panel-heading {
                background-color: rgba(223, 0, 236, .8);
            }
            
            .panel-body {
                background-color: rgba(255, 204, 255, .7);
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        
        <div class="container">
            <div class="panel panel-default col-lg-6 col-lg-offset-3">
                <div class="panel-heading"><h1>Nouveau compte:</h1></div>
                <div class="panel-body">
                    <br>
                    <script>
                        function valider() {
                            var pwd1 = document.getElementByID('pwd1');
                            var pwd2 = document.getElementByID('pwd2');
                            if (pwd1.value!=pwd2.value) {
                                warning("Les mots de passe ne correspondent pas");
                                return false;
                            }
                            if (document.getElementsByName('nom').value == '') {
                                warning("Vous devez entrer un nom!");
                                return false;
                            }
                            if (document.getElementsByName('prenom').value=='') {
                                warning("Vous devez entrer un prénom!");
                                return false;
                            }
                            if (document.getElementsByName('login').value=='') {
                                warning("Vous devez entrer un login!");
                                return false;
                            }
                        }
                    </script>
                    <form action="#" method="post" id="form" onsubmit="valider()">
                        <span class="T2">Nom: </span><input type="text" class="form-control" name="nom" />
                        <br>
                        <span class="T2">Prénom: </span><input type="text" class="form-control" name="prenom" />
                        <br>
                        <span class="T2">Nom d'utilisateur: </span><input type="text" class="form-control" name="login" />
                        <br>
                        <span class="T2">Mot de passe: </span><input type="password" id="pwd1" class="form-control" name="password" />
                        <br>
                        <span class="T2">Répétez le mot de passe: </span><input type="password" id="pwd2" class="form-control" name="repeter" value="" />
                        <br>
                        <button type="submit" class="btn btn-default btn-block"><span class="T2">Valider</span></button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
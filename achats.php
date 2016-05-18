<?php include_once('session.php'); if ($_SESSION['users']['login']=='') header('location:/Projet_Web_Brony'); ?>
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
        <style>
            .criteres {
                margin-top: 7%;
                color: whitesmoke;
                background-color: rgba(255, 51, 255, 0.6);
                border-radius: 10px;
                border: rgb(255, 190, 255) solid 1px;
            }
            #prix_inf { width: auto; padding-right: 0px; margin-right: 3px; }
            #prix_sup { width: auto; padding-right: 0px }
            #nom { width: 50%; margin-right: 0px }
            #valider {
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: large;
            }
            .form-group {
                text-align: center;
                width: 100%;
            }
            .form-control { background-color: rgba(255, 51, 255, 0.8); }
            #opt {
                margin-top: 5px;
                margin-bottom: 5px;
                padding-top: 1%;
                border: rgb(255, 180, 255) solid 1px;
                border-radius: 5px;
            }
        </style>
    </head>
    
    <body>
        <?php include 'navbar.php'; ?>
        
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 criteres">
                
                <script>
                    $("#valider").click(function() {
                        var type;
                        if ($("#poney").val() == "on")
                            type = "poney";
                        if ($("#licorne").val() == "on")
                            type = "licorne";
                        if ($("#pegase").val() == "on")
                            type = "pegase";
                        if ($("#alicorne").val() == "on")
                            type = "alicorne";
        
                        $.post("recherche_achat.php",
                        {
                            type : type,
                            inf : $("#prix_inf").val(),
                            sup : $("#prix_sup").val(),
                            nom : $("#nom").val()
                        },
                        function(data, status) {
                            $("#resultat").html(data);
                        });
                    });
                </script>
                
                <form class="form-inline">
                    <div class="form-group" id="opt">
                        <p style="text-align: center;">
                            <label for="poney" class="radio-inline"><input type="radio" id="poney" name="opt" />Poney</label>
                            <label for="licorne" class="radio-inline"><input type="radio" id="licorne" name="opt" />Licorne</label>
                            <label for="pegase" class="radio-inline"><input type="radio" id="pegase" name="opt" />Pégase</label>
                            <label for="alicorne" class="radio-inline"><input type="radio" id="alicorne" name="opt" />Alicorne</label>
                        </p>
                    </div>
                    <div class="form-group" style="padding-top: 5px">
                        <label for="prix_inf">Prix inférieur à : <input type="number" class="form-control" id="prix_inf" name="inf" min="1" /></label>
                        <label for="prix_sup">Prix supérieur à : <input type="number" class="form-control" id="prix_sup" name="sup" min="0" /></label>
                    </div>
                    <div class="form-group" style="padding-top: 5px">
                        <label for="nom">Le nom contient : <input type="text" class="form-control" id="nom" /></label>
                    </div>
                    <button class="btn btn-block btn-success" id="valider">Valider</button>
                </form>
            </div>
            
            <div class="col-lg-8 col-lg-offset-2" style="margin-top: 10px" id="resultat">
                
            </div>
        </div>
        
    </body>
</html>
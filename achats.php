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
            #borne_inf { width: auto; padding-right: 0px }
            #borne_sup { width: auto; padding-right: 0px }
            #val_nom { width: 50%; margin-right: 0px }
            #valider {
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: large;
            }
            .form-group {
                text-align: center;
                width: 100%;
            }
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
                        <label for="prix_inf" class="checkbox-inline"><input type="checkbox" id="prix_inf" />Prix inférieur à : </label>
                        <input type="number" class="form-control" id="borne_inf" disabled/>
                        <label for="prix_sup" class="checkbox-inline"><input type="checkbox" id="prix_sup" />Prix supérieur à : </label>
                        <input type="number" class="form-control" id="borne_sup" disabled/>
                    </div>
                    <div class="form-group" style="padding-top: 5px">
                        <label for="nom" class="checkbox-inline"><input type="checkbox" id="nom" />Le nom contient : </label>
                        <input type="text" class="form-control" id="val_nom" disabled/>
                    </div>
                    <button class="btn btn-block btn-success" id="valider">Valider</button>
                </form>
            </div>
        </div>
        
    </body>
</html>
<?php include_once('session.php'); if ($_SESSION['users']['login']=='') header('location:/projet_S1/public_html'); ?>
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
            #borne_inf { width: 23%; padding-right: 0px }
            #borne_sup { width: 23%; padding-right: 0px }
            #valider {
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: large;
            }
        </style>
    </head>
    
    <body>
        <?php include 'navbar.php'; ?>
        
        <div class="container">
            <div class="col-lg-6 col-lg-offset-3 criteres">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="poney" class="radio-inline"><input type="radio" id="poney" />Poney</label>
                        <label for="licorne" class="radio-inline"><input type="radio" id="licorne" />Licorne</label>
                        <label for="pegase" class="radio-inline"><input type="radio" id="pegase" />Pégase</label>
                        <label for="alicorne" class="radio-inline"><input type="radio" id="alicorne" />Alicorne</label>
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
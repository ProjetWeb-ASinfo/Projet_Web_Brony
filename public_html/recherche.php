<html>
    <head><title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <style>
            body { background: none transparent; }
            table {
                border: none;
                margin-left: auto;
                margin-right: auto;
            }
            thead {
                background-color: rgba(230, 51, 230, 0.4);
                font-size: 15pt;
                color: rgb(255, 180, 255);
            }
            tbody {
                background-color: rgba(235, 92, 235, 0.4);
                color: rgb(252, 232, 252);
            }
        </style>
    </head>
    
    <body>
        <table class="table">
            <thead>
                <tr><td>Nom</td><td>Prenom</td><td>Login</td></tr>
            </thead>
            <tbody>
                <?php
                include_once 'session.php';

                    $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
                    $search = "SELECT nom, prenom, login FROM utilisateurs WHERE";
                    if ($_GET['nom']!='')
                        $search = $search." nom='$_GET[nom]' AND";
                    if ($_GET['prenom']!='')
                        $search = $search." prenom='$_GET[prenom]' AND";
                    if ($_GET['login']!='')
                        $search = $search." login='$_GET[login]'    ";
                    if ($_GET['nom']=='' && $_GET['prenom']=='' && $_GET['login']=='')
                        $search = substr($search, 0, -6);
                    else
                        $search = substr($search, 0, -4);

                    $request = $db->prepare($search);
                    $request->execute();

                    while ($utilisateurs = $request->fetch(PDO::FETCH_ASSOC))
                        echo "<tr><td>$utilisateurs[nom]</td><td>$utilisateurs[prenom]</td><td>$utilisateurs[login]</td></tr>";

                ?>
            </tbody>
        </table>
    </body>
</html>

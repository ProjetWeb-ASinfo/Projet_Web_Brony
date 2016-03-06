<html>
    <head><title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <style>
            body { background: none transparent; }
            table { border: none; }
        </style>
    </head>
    
    <body>
        <table>
            <?php
            include_once 'session.php';
            
                $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
                $search = "SELECT nom, prenom, login FROM utilisateurs WHERE ";
                if ($_GET['nom']!='')
                    $search = $search."nom=$_GET[nom] AND";
                elseif ($_GET['prenom']!='')
                    $search = $search."prenom=$_GET[prenom] AND";
                elseif ($_GET['login']!='')
                    $search = $search."login=$_GET[login]";
                else
                    $search = substr ($search, 0, 43);
                
                $request = $db->prepare($search);
                $request->execute();

                while ($utilisateurs = $request->fetch(PDO::FETCH_ASSOC))
                    echo "<tr><td>$utilisateurs[nom]</td><td>$utilisateurs[prenom]</td><td>$utilisateurs[login]</td></tr>";

            ?>
        </table>
    </body>
</html>

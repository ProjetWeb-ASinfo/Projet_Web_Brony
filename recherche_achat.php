<table>
    <?php
        if ($_SERVER['REQUEST_METHOD']!="POST") header('location:/Projet_Web_Brony');

        $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');

        $request = "SELECT id, type, nom, prix FROM achat WHERE ";
        if ($_POST['type']!="")
            $request = $request + "type == $_POST[type] OR ";
        if ($_POST['inf']!="")
            $request = $request + "prix <= $_POST[inf] OR ";
        if ($_POST['sup']!="")
            $request = $request + "prix >= $_POST[inf] OR ";
        if ($_POST['nom']!="")
            $request = $request + "nom LIKE *$_POST[nom]* OR ";
        $request = $request + "1=1";
        $recherche = $db->prepare($request);
        $recherche->execute();
        if ($result = $recherche->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>$result[nom]</td><td>$result[type]</td><td>$result[prix]</td></tr>";
        }
    ?>
</table>
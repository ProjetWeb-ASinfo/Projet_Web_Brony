<table class="table">
    <thead>
        <tr><td>Nom</td><td>Prenom</td><td>Login</td></tr>
    </thead>
    <tbody>
        <?php
        include_once 'session.php';

            $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
            $search = "SELECT nom, prenom, login FROM utilisateurs WHERE";
            if ($_POST['nom']!='')
                $search = $search." nom='$_POST[nom]' AND";
            if ($_POST['prenom']!='')
                $search = $search." prenom='$_POST[prenom]' AND";
            if ($_POST['login']!='')
                $search = $search." login='$_POST[login]'    ";
            if ($_POST['nom']=='' && $_POST['prenom']=='' && $_POST['login']=='')
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

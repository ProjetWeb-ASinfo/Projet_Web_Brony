<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
        <?php
        include_once('session.php');
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $db = new pdo('mysql:host=localhost;dbname=projet_s1', 'root', 'password');
                $login = "select * from utilisateurs where login = '$_POST[identifiant]' and password = '$_POST[mdp]'";
                $request = $db->prepare($login);
                $request->execute();

                if ($utilisateur = $request->fetch(PDO::FETCH_ASSOC)) {
                    foreach ($utilisateur as $i => $champ) { $_SESSION['users'][$i] = $utilisateur[$i]; }
                } else
                    echo '<div class="alert alert-danger" style="margin-top: 4%; text-align: center">
                            <strong>Erreur!</strong> Mauvais identifiant ou mot de passe.
                          </div>';
            } elseif (isset ($_GET['deco'])) {
                $_SESSION['users'] = array('id' => '-1',
                                   'nom' => '',
                                   'prenom' => '',
                                   'login' => '',
                                   'password' => '');
            }
        include 'navbar.php';
        ?>
        <div class="container">
            <section class="col-lg-8 col-sm-offset-2 mainDisplay" >
                <h3 class="text-center"> This actually might be a title </h3>
                <div class="text-justify">
                    This is an interesting div. A very interesting div! Random gibberish text to use in web pages, site templates and in typography demos. Get rid of Lorem Ipsum forever. A tool for web designers who want to save time.
                </div>
                <div class="col-xs-5 bottom-right">
                    This is another interesting div!
                    I, too, sing America.
                    I am the darker brother.
                    They send me to eat in the kitchen
                    When company comes,
                    But I laugh,
                    And eat well,
                    And grow strong.

                    Tomorrow,
                    I'll be at the table
                    When company comes.
                    Nobody'll dare
                    Say to me,
                    "Eat in the kitchen,"
                    Then.
                    Besides,
                    They'll see how beautiful I am
                    And be ashamed--

                    I, too, am America. 
                </div>
                <div class="col-xs-7 text-justify"> RandomText is a tool designers and developers can use to quickly grab dummy text in either Lorem Ipsum or Gibberish format.There are a number of features that make RandomText a little different from other Lorem Ipsum dummy text generators you may find around the web.... Grab HTML or just plain text - even save generated text as files:Don't waste time copying text and then more time marking it up in HTML manually, just hit View HTML Code and then Copy to Clipboard!Use the address bar to create a query:Don't waste more time fiddling with form options! RandomText allows you to get at your text quicker by using the URL to construct a query... Want to integrate random text generation into your own projects? No problem, just use our API to return generated content in JSON format... randomtext.me / api / lorem / ul-5 / 5-15 /
                </div>
                <h2> SO STRONG!</h2>
                <div></div>
                <div> Did you see the empty div before?</div>
            </section>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        
        <style type="text/CSS">
            body
            {
                background-image: url("background.png");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
                font-family: fantasy;
            }
            .menu
            {
                background: linear-gradient(to bottom, rgba(240, 51, 240, 0.8), rgba(240, 51, 240, 0.3));
                border: none;
            }             
            #mainDisplay { background-color: rgba(255, 51, 255,.6); }
            .menu-button
            {
                color : rgb(255, 180, 255);
                background-color: rgb(235, 21, 235);
                border-color: rgb(200, 0, 200);
                font-size: 150%;
            }
            .menu-button:hover, .menu-button:focus
            {
                color : rgb(235, 21, 235);
                background-color: rgb(255, 180, 255);
            }
            .dropdown
            {
                position: relative;
                display: inline-block;
            }
            .dropdown-content
            {
                display: none;
                position: absolute;
                background-color: rgba(235, 21, 235, 0.7);
                z-index: 1;
            }
            .dropdown-content a {
                text-decoration: none;
                color: rgb(255, 180, 255);
                display: block;
                padding: 10px 10px;
                min-width: 100%;
            }
            .dropdown-content a:hover { background-color: rgba(235, 21, 235, 0.8); }
            .dropdown:hover .dropdown-content { display: block; }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-fixed-top menu">
        <div class="container-fluid">
            <div  class="col-sm-10 col-sm-offset-2">
                <ul class="nav navbar-nav">
                    <li><a href="" class="btn menu-button">Accueil</a></li>
                    <li class="dropdown">
                        <a href="#" class="btn menu-button">Achats</a>
                        <div class="dropdown-content">
                            <a href="#">Little Poneys</a>
                            <a href="#">Licornes</a>
                            <a href="#">Others…</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="btn menu-button">Ventes</a>
                        <div class="dropdown-content">
                            <a href="#">Revendre</a>
                            <a href="#">Clauses revendeur</a>
                        </div>
                    </li>
                    <li><a href="#" class="btn menu-button">FAQ</a></li>
                    <li><a href="#" class="btn menu-button">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="btn menu-button">Mon Compte</a>
                        <div class="dropdown-content">
                            <?php
                                include_once('base.php');
                                $i = $_SESSION['index'];
                                if ($i<>0)
                                {
                                    $user = $_SESSION['users'][$i];
                                    echo "<a href='#'>$user[identifiant]</a>";
                                }
                                else
                                {
                                    echo '<form method="POST">';
                                    echo '<input type="text" name="identifiant" value="Identifiant" /><br>';
                                    echo '<input type="password" name="mdp" /><br>';
                                    echo '<input type="submit" value="Connexion" />';
                                    echo '</form>';
                                }
                            ?>
                        </div>                    
                    </li>
                    <li class="dropdown">
                        <a href="" class="btn menu-button">À propos</a>
                        <div class="dropdown-content">
                            <a href="#">Le site</a>
                            <a href="#">La team</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <section id="mainDisplay" class="col-xs-6 col-lg-offset-3" >
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
    </body>
</html>

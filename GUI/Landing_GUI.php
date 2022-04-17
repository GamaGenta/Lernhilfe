<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lernhilfe Landing Page</title>
    <link rel="stylesheet" hre="style_Landing_GUI.css">
</head>
<body id="Hintergrund">
<nav>
    <form method="post">
            <input type="submit" value="<" id="logout" name="logout">
    </form>
    <img id="logo" src="Zahnraeder_grau.svg" width="145px" height="126px">
</nav>

<header>
    <h1 class="landingPage"> Lernhilfe </h1>
    <div class="landingPage">
        <p> Steigere jetzt </p>
        <p> deine Produktivität! </p>
    </div>
    <!-- Lesetest der Rolle und der ID des Users:  <h1>Hallo <?php // echo $_SESSION["user"]->getRolle(), " ", $_SESSION["user"]->getUid() ?></h1>  -->
</header>

<!-- hier lassen sich die Funktionalitäten wählen -->
<main id="landingPage">
    <div class="fnktWählen">
        <a href="?Kartei">
            <div class="funktionalität" id="Kartei">
                <div class="fnktText">Karteikarten</div>
            </div>
        </a>
        <a href="?Quiz">
            <div class="funktionalität" id="Quiz">
                <div class="fnktText">Quiz</div>
            </div>
        </a>
        </div>
    <div class="fnktWählen">
        <a href="?Übersicht">
            <div class="funktionalität" id="Übersicht">
                <div class="fnktText">Übersicht</div>
            </div>
        </a>
     <!-- Das hier später wieder auskommentieren -- stört bei dem formattieren.
        <?php
        if ($_SESSION["user"]->getRolle() == "Student") {
            //ToDo Bereich wird zuätzlich geladen gladen
            ?>
            -->
            <a href="?ToDo">
                <div class="funktionalität" id="ToDo">
                    <div class="fnktText">ToDo's</div>
                </div>
            </a>
        </div>
    <div class="ErgoDiv">
        <div>
            <a href="?ErgoTipps" id="ergo">
                <div id="ErgoTipps">
                    <div id="fontergo">Ergonomie Tipps</div>
                </div>
            </a>
        </div>
    </div>
            <?php
        }
        ?>
    </div>
</main>

<footer>
    <div id="footerText">
      <p>Ein SW-Projekt des Fachbereichs IEM/MND</p>
    </div>
</footer>


</body>

</html>
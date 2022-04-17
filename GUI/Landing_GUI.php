<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lernhilfe Landing Page</title>
    <style>
        /* grund style vom Login und der Landingpage */

        div {
            margin: 0;
        }

        input#logout {
            font-size: 2.5em;
            border: none;
            background-color: #F4F1DE;
            color: #707070;
        }

        body {
            background: #F4F1DE 0% 0% no-repeat;
            margin: 0;
        }

        #Hintergrund {
            background-image: url('Zahnraeder.svg');
            margin-top: 0;
            background-position: left 20em;
        }

        li#ErgoTipps {
            width: 20em;
        }

        .fnktText {

        }

        nav {
            height: 8em;
        }



        footer {
            width: 375px;
            background: #707070 0% 0% no-repeat padding-box;
            opacity: 1;
        }

        #footerText {
            text-align: center;
            font: normal normal normal 19px/26px Segoe UI;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;

            alignment: center;
            padding: 11px 4.5px;
        }


        /* CSS der Landingpage */
        main#landingPage {
            height: 100%;
        }
        nav {
            display: flex;
            margin: 1em 2em;
            gap: 80%;
        }

        .landingPage {
            margin: 0 0 0 0;
        }

        h1.landingPage {
            margin-top: 8rem;
            margin-left: 8rem;
            text-align: left;
            font: normal normal normal 31px/40px Roboto;
            font-size: 4rem;
            letter-spacing: 0px;
            color: #707070;
        }



        div.landingPage {
            /* UI Properties */
            margin-left: 8rem;
            text-align: left;
            font: normal normal 600 31px/40px Roboto;
            font-size: 5rem;
            letter-spacing: 0px;
            color: #707070;
        }

        div.landingPage p:nth-child(0n+1){
            margin: 0.4em auto -0.3em;
        }

        .fnktWählen {
            padding-left: 0;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            margin: 3em auto;
        }

        a {
            text-decoration: none;
        }

        /* CSS der Landingpage des Studenten und Dozenten sind verschiden */

        /* CSS Student: */
        .funktionalität {
            width: 20rem;
            height: 20rem;
            border-radius: 70px;

            border: 2px solid #707070;

            text-align: center;
            font: normal normal normal 30px/40px Segoe UI;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;

        }
        .fnktText {
            font-size: 3.5rem;
            line-height: 20rem;
        }

        .ErgoDiv div {
            text-align: center;
            margin: 0 auto;
            border-radius: 70px;
        }

        #Kartei {
            background: #ECBD6F 0% 0% no-repeat padding-box;
        }
        #Quiz {
            background: #514CE9 0% 0% no-repeat padding-box;
        }
        #Übersicht {
            background: #EC9E5A 0% 0% no-repeat padding-box;
        }
        #ToDo {
            background: #3D405B 0% 0% no-repeat padding-box;
        }

        #ErgoTipps {
            width: 30rem;
            height: 3.5rem;
            line-height: 3.5rem;
            font: normal normal normal 22px/29px Roboto;
            color: #FFFFFF;
            border: 2px solid;
            background: #776087 0% 0% no-repeat padding-box;
        }

        #fontergo {
            font-size: 2rem;
        }

    </style>
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
        Ein SW-Projekt des Fachbereichs IEM/MND
    </div>
</footer>


</body>

</html>
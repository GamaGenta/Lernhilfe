<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        /* grund style vom Login und der Landingpage */
        label#zurück{
            width: 30px;
            height: 64px;
        }
        div {
            margin: 0;
        }
        body {
            width: 375px;
            height: 812px;
            background: #F4F1DE 0% 0% no-repeat padding-box;
            opacity: 1;
            margin: 0;
        }

        #Hintergrund {
            background-image: url('Zahnraeder.svg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 375px 326px;
            background-position: left 242px;
            margin: 0;
        }

        ul {
            list-style: none;
            padding: 0;

            display: flex;
            flex-wrap: wrap;

            width: 303px;
            alignment: center;
            margin: auto;
            gap: 20px
        }

        nav{
            height: 72px;
        }

        main{
            height: 404px;
        }


        footer {
            width: 375px;
            height: 48px;
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
            height: 476px;
        }
        nav {
            display: flex;
            gap: 177px;
        }
        .landingPage {
            margin: 0 0 0 35px;
        }

        h1.landingPage {
            width: 120px;
            text-align: left;
            font: normal normal normal 31px/40px Roboto;
            letter-spacing: 0px;
            color: #707070;
        }
        div.landingPage {
            width: 276px;
            /* UI Properties */
            text-align: left;
            font: normal normal 900 31px/40px Roboto;
            letter-spacing: 0px;
            color: #707070;
        }
        .fnktWählen {
            width: 320px;
            margin: 96px auto 0;
        }

        a {
            text-decoration: none;
        }
        label#zurück{
            height: 64px;
        }


        /* CSS der Landingpage des Studenten und Dozenten sind verschiden */

        /* CSS Student: */
        .funktionalität {
            width: 146px;
            height: 120px;

            border-radius: 30px;

            border: 2px solid #707070;

            text-align: center;
            font: normal normal normal 30px/40px Segoe UI;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;

        }
        .fnktText {
            margin: 40px 0 0 0;
        }
        #Kartei .fnktText {
            margin: 20px 0 0 0;
        }
        #ErgoTipps .fnktText {
            margin: auto;
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
            width: 195px;
            height: 30px;
            font: normal normal normal 22px/29px Roboto;
            color: #FFFFFF;

            border: 2px solid var(--schrift-1);
            background: #776087 0% 0% no-repeat padding-box;
        }
        a#ergo {
            margin: 0 62.5px;
        }

    </style>
</head>


<body id="Hintergrund">


<nav>
    <form method="post">
        <label id="zurück">
            <img src='Pfeil_zurueck.svg' height="64px" width="30px" alt=""> <!-- HTML Header ändern, damit SVG (aus XML Dateien) richtig angezeigt werden -->
            <input type="submit" value="<" id="logout" name="logout">
        </label>
    </form>
    <img id="logo" src="Zahnraeder_grau.svg" width="145px" height="126px">
</nav>

<header>
    <h1 class="landingPage"> Lernhilfe </h1>
    <div class="landingPage"> Steigere jetzt <br/> deine Produktivität! </div>
    <!-- Lesetest der Rolle und der ID des Users:  <h1>Hallo <?php // echo $_SESSION["user"]->getRolle(), " ", $_SESSION["user"]->getUid() ?></h1>  -->
</header>

<!-- hier lassen sich die Funktionalitäten wählen -->
<main id="landingPage">
    <ul class="fnktWählen">
        <a href="?Kartei">
            <li class="funktionalität" id="Kartei">
                <div class="fnktText"> Kartei-Karten  </div>
            </li>
        </a>
        <a href="?Quiz">
            <li class="funktionalität" id="Quiz">
                <div class="fnktText"> Quiz  </div>
            </li>
        </a>
        <a href="?Übersicht">
            <li class="funktionalität" id="Übersicht">
                <div class="fnktText"> Übersicht  </div>
            </li>
        </a>
        <?php
        if ($_SESSION["user"]->getRolle() == "Student") {
            //ToDo Bereich wird zuätzlich geladen gladen
            ?>
            <a href="?ToDo">
                <li class="funktionalität" id="ToDo">
                    <div class="fnktText"> ToDo's  </div>
                </li>
            </a>
            <a href="?ErgoTipps" id="ergo">
                <li class="funktionalität" id="ErgoTipps">
                    <div class="fnktText"> Ergonomie Tipps  </div>
                </li>
            </a>
            <?php
        }
        ?>
    </ul>
</main>

<footer>
    <div id="footerText">
        Ein SW-Projekt des Fachbereichs IEM/MND
    </div>
</footer>


</body>

</html>
<?php
require_once("../Login/Login.php");
?>
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
            height: 85px;
        }

        main{
            height: 319px;
        }

        main#landingPage {
            height: 435px;
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

        /* CSS des Logins */

        h1#login {
            width: 110px;
            alignment: center;
            padding: 187px 0 0 0;
            margin: 0 auto 35px;

            text-align: left;
            font: normal normal normal 40px/53px Roboto;
            letter-spacing: 0px;
            color: #707070;
            opacity: 1;
        }

        input.textInput {
            width: 303px;
            height: 46px;

            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #707070;
            border-radius: 20px;
            opacity: 1;

            text-align: center;
            font: normal normal normal 20px/26px Roboto;
            letter-spacing: 0px;
            color: #707070;
        }
        input#login {
            width: 109px;
            height: 46px;

            background: #707070 0% 0% no-repeat padding-box;
            border: 1px solid #707070;
            border-radius: 20px;
            opacity: 1;

            text-align: center;
            font: normal normal 900 20px/26px Roboto;
            letter-spacing: 0px;
            color: #FFFFFF;

        }

        /* CSS der Landingpage */
        h1#landingPage {
            width: 120px;
            height: 40px;
            text-align: left;
            font: normal normal normal 31px/40px Roboto;
            letter-spacing: 0px;
            color: #707070;
            margin: 0;
        }
        div#landingPage {
            height: 120px;
            /* UI Properties */
            text-align: left;
            font: normal normal 900 31px/40px Roboto;
            letter-spacing: 0px;
            color: #707070;
        }

        .fnktWählen {
            width: 320px;
        }

        a {
            text-decoration: none;
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
        #Kartei {
            background: #ECBD6F 0% 0% no-repeat padding-box;
        }
        #Quiz {
            background: #514CE9 0% 0% no-repeat padding-box;
        }
        #Übersicht {
            background: #EC9E5A 0% 0% no-repeat padding-box;
        }
        #ToDo{
            background: #3D405B 0% 0% no-repeat padding-box;
        }

    </style>
</head>
<body id="Hintergrund">
<?php
if (isset($_SESSION["user"])) {
    ?>
    <nav>

        <form method="post" action="">
            <label id="zurück">
                <img src='Pfeil_zurueck.svg' height="64px" width="30px" alt="">        <!-- HTML Header ändern, damit SVG (aus XML Dateien) richtig angezeigt werden -->
                <input type="submit" value="Logout" id="logout" name="logout">
            </label>

        </form>
    </nav>
    <header>
        <h1 id="landingPage"> Lernhilfe </h1>
        <div id="landingPage"> Lernhilfe Steigere jetzt deine Produktivität! </div>
       <!-- Lesetest der Rolle und der ID des Users:  <h1>Hallo <?php // echo $_SESSION["user"]->getRolle(), " ", $_SESSION["user"]->getUid() ?></h1>  -->
    </header>



    <!-- hier lassen sich die Funktionalitäten wählen -->
    <main id="landingPage">
    <ul class="fnktWählen">
        <a href="?Fnkt=Kartei">
            <li class="funktionalität" id="Kartei">
                <div class="fnktText"> Karei-Karten  </div>
            </li>
        </a>
        <a href="?Fnkt=Quiz">
            <li class="funktionalität" id="Quiz">
                <div class="fnktText"> Quiz  </div>
            </li>
        </a>
        <a href="?Fnkt=Übersicht">
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
            <?php
        }
        ?>
    </ul>
    </main>
    <?php
} else {
    ?>
    <nav>
    </nav>
    <header>
        <h1 id="login">Log In</h1>
    </header>
    <main>
        <form method="post" action="">
            <ul>
                <li> <input type="text" id="uid" name="uid" placeholder="Benutzername" class="textInput"> </li>
                <li> <input type="password" id="password" name="password" placeholder="Passwort" class="textInput"> </li>
                <li> <input type="submit" value="Login" id="login"> </li>
            </ul>
        </form>
    </main>
    <?php
}
?>

<footer>
    <div id="footerText">
        Ein SW-Projekt des Fachbereichs IEM/MND
    </div>
</footer>
</body>

</html>


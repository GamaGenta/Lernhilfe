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

        /* CSS des Logins */

        h1#login {
            width: 110px;
            alignment: center;
            padding: 200px 0 0 0;
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
    </style>
</head>
<body id="Hintergrund">

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

        <footer>
    <div id="footerText">
        Ein SW-Projekt des Fachbereichs IEM/MND
    </div>
</footer>
</body>

</html>
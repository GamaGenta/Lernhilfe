<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Übersicht - Lernhilfe</title>
    <!-- Absoluten Link für das Stylesheet je nach Umgebung (VM) setzen -->
    <link rel="stylesheet" href="/GUI-Test/Lernhilfe-Logik-und-GUI-getrennt/GUI/ToDo_GUI/style_todo_Uebersicht_Page.css">
</head>
<header>
    <a href="?"><i class="leftArrow"><</i></a>
    <h1>To Do's</h1>
    <form method="post" action="">
        <input type="submit" name="add" value="+" class="plusButton">
    </form>
    <!-- <a href="todo_Anlegen.php" > <i class="plusButton">+</i></a> -->
</header>
<body>
<form action='' method='POST'>

    <?php
    /*
    $sqlSelect = "SELECT idtodo, titel, inhalt FROM todoeintrag;";
    $result = mysqli_query($conn, $sqlSelect);
    $resultCheck = mysqli_num_rows($result);
    */
    //var_dump($todoListe);
    if (sizeof($todoListe) > 0) {
        $i = 0;
        foreach ($todoListe as $row) {
    //hier die idToDo aus der Datenbank holen
    ?>
            <hr>
            <div class='eintragToDo'>

            <input type="checkbox" name="tID" value="<?php echo $row->getTID(); //$row['idtodo']; ?>" class="checkboxOfToDo">
            <label for="checkboxOfToDo5">
            <?php
            echo $row->getTitel() . "<br>";
            ?>
            </label>

            <form action="" method="post">
                <button type="submit" value="<?php echo $i ?>" name="detail"> > </button>
            </form>
            <!-- <a href="" class="rightArrow">></a>' -->
            </div>
    <?php
            $i++;
        }
    }

    echo "<input type='submit' name='delete' value='Löschen' style='float: right'>";
    error_reporting(0);

    //ausgewählte ToDos aus Datenbank löschen und Seite aktualisieren
    //Code von https://www.php-resource.de/forum/php-developer-forum/74308-eintraege-mittels-checkbox-loeschen.html

    if (isset($_REQUEST['submit'])) {
        if (empty($_REQUEST['tID'])) {

            print "Es wurde kein ToDo ausgewählt";

        } else {

            foreach ($_REQUEST['tID'] as $tID) {

                todoLöschen($tID);
                //header("Location:./?ToDo");
                //return;

            }
        }
    }

    ?>
</form>
</body>
<footer>
</footer>
</html>

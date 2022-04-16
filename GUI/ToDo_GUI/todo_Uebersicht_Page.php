<?php
//include_once 'dbconn.php';
?>
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
    /**
    $sqlSelect = "SELECT idtodo, titel, inhalt FROM todoeintrag;";
    $result = mysqli_query($conn, $sqlSelect);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<hr>";
            echo "<div class='eintragToDo'>";
            //hier die idToDo aus der Datenbank holen
            ?>
            <input type="checkbox" name="ids[]" value="<?php echo $row['idtodo']; ?>" class="checkboxOfToDo">
            <?php
            echo '<label for="checkboxOfToDo5">';
            echo $row['titel'] . "<br>";
            echo "</label>";
            echo '<a href="" class="rightArrow">></a>';
            echo "</div>";

        }
    }

    echo "<input type='submit' name='submit' value='Löschen' style='float: right'>";
    error_reporting(0);

    //ausgewählte ToDos aus Datenbank löschen und Seite aktualisieren
    //Code von https://www.php-resource.de/forum/php-developer-forum/74308-eintraege-mittels-checkbox-loeschen.html

    if (isset($_REQUEST['submit'])) {
        if (empty($_REQUEST['ids'])) {

            print "Es wurde kein ToDo ausgewählt";

        } else {

            foreach ($_REQUEST['ids'] as $val) {
                $sqlDelete = "DELETE FROM todoeintrag WHERE idtodo IN ('$val');";
                mysqli_query($conn, $sqlDelete);
                header("Location: todo_Uebersicht_Page.php");
                $i = 1;

            }
        }
    }
     **/
    ?>
</form>
</body>
<footer>
</footer>
</html>

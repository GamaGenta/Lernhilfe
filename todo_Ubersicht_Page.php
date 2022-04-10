<?php
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Übersicht - Lernhilfe</title>
    <link rel="stylesheet" href="style_todo_Ubersicht_Page.css">
</head>
<header>
    <a href=""><i class="leftArrow"><</i></a>
    <h1>To Do's</h1>
    <a href=""><i class="plusButton">+</i></a>
</header>
<body>
<form action='' method='POST'>

<!--
<div class="eintragToDo">
    <input type="checkbox" id="checkboxOfToDo1" class="checkboxOfToDo">
    <label for="checkboxOfToDo1">Text von dem ToDo</label>
    <a href="" class="rightArrow">></a>
</div>
<hr>
<div class="eintragToDo">
    <input type="checkbox" id="checkboxOfToDo1" class="checkboxOfToDo">
    <label for="checkboxOfToDo1">Beispiel 2</label>
    <a href="" class="rightArrow">></a>
</div>
<hr>
<div class="eintragToDo">
    <input type="checkbox" id="checkboxOfToDo1" class="checkboxOfToDo">
    <label for="checkboxOfToDo1">Beispiel 3 undso weiter</label>
    <a href="" class="rightArrow">></a>
</div>
<hr>
-->
<?php
$sql = "SELECT idtodo, titel, inhalt FROM todoeintrag;";
$result = mysqli_query($conn, $sql);
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

//ausgewählte ToDos aus Datenbank löschen und Seite aktualisieren
//Code von https://www.php-resource.de/forum/php-developer-forum/74308-eintraege-mittels-checkbox-loeschen.html

if ($_REQUEST['submit']) {
    if (is_array($_REQUEST['ids'])) {
        if (empty($_REQUEST['ids']) == false) {
            foreach ($_REQUEST['ids'] as $val) {
                $sqlDelete = "DELETE FROM todoeintrag WHERE idtodo IN ('$val');";
                mysqli_query($conn, $sqlDelete);
                header("Location: todo_Ubersicht_Page.php");
            }
        }
    } else {
        print "Es wurde nichts ausgewählt";
    }
}
?>
</form>
<footer>
</footer>
</html>

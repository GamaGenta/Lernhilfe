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
echo "<br>";
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<hr>";
        echo "<div class='eintragToDo'>";
        //hier die idToDo aus der Datenbank holen
        echo '<input type="checkbox" id="checkboxOfToDo5" class="checkboxOfToDo">';
        echo '<label for="checkboxOfToDo5">';
        echo $row['titel'] . "<br>";
        echo "</label>";
        echo '<a href="" class="rightArrow">></a>';
        echo "</div>";
    }
}
?>
<button type="submit" style="float: right">löschen</button>
</body>
<footer>
</footer>
</html>
<?php
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Übersicht - Lernhilfe</title>
    <link rel="stylesheet" href="style_quiz_Uebersicht.css">
</head>
<header>
    <a href=""><i class="leftArrow"><</i></a>
    <h1>Quiz Themen</h1>
    <form method="post" id="searchbar">
        <input type="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
</header>
<body>
<?php

// Datenbank Anfrage austauschen
$sql = "SELECT idtodo, titel, inhalt FROM todoeintrag;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
echo "<br>";
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<hr>";
        echo "<div class='container_quiz_thema'>";
        //hier die idToDo aus der Datenbank holen
        echo "<span class='quiz_Thema_Fragenanzahl'>";
        echo mysqli_num_rows($result);
        echo "</span>";
        echo '<label for="quiz_Thema">';
        echo $row['titel'] . "<br>";
        echo "</label>";
        echo '<a href="" class="rightArrow">></a>';
        echo "</div>";
    }
}
?>
</form>
</body>
<footer>
</footer>
</html>
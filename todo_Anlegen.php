<?php
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Anlegen - Lernhilfe</title>
    <link rel="stylesheet" href="style_todo_Anlegen.css">
</head>
<header>
    <a href=""><i class="leftArrow"><</i></a>
    <h1>Neues ToDo</h1>
    <a href=""><i class="plusButton">+</i></a>
</header>
<body>
<hr>
<form method="post">
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel">
    <hr>
    <br>
    <label for="dauer">Dauer:</label>
    <input type="time" id="dauer" name="dauer">
    <hr>
    <br>
    <label for="deadline">Deadline:</label>
    <input type="date" id="deadline" name="deadline">
    <hr>
    <br>
    <label for="info">Info:</label>
    <br>
    <input type="text" id="info" name="info">
</form>
</body>
<footer>
</footer>
</html>
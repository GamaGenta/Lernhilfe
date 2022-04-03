<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Lernhilfe</title>
    <link rel="stylesheet" href="style_Login_Page.css">
</head>
<body>
<h1>Log In</h1>
<form method="post">
    <div class="container">
        <!--
        https://www.w3schools.com/howto/howto_css_login_form.asp
        Barrierefreiheit beachten (wenn Zeitlich möglich): Label hinschreiben
        -->
        <label for="userEmail"></label>
        <input type="text" placeholder="E-Mail" name="userEmail" required>
        <label for="userPassword"></label>
        <input type="password" placeholder="Password" name="userPassword" required>
        <label>
            <input type="checkbox" checked="checked" name="remember">Passwort merken</label>
        </label>
        <button type="submit">Log In</button>
    </div>
</form>
<div class="andereLinks">
    <a href="">Warum Lernhilfe?</a>
    </br>
    <a href="">Über uns</a>
</div>
<?php
$userEmail = $_POST['userEmail'];
$userPassword = $_POST['psw'];

// Database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
</body>
<footer>
    &copy; Lernhilfe Team
</footer>
</html>
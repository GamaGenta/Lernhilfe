<?php
echo "test";

$DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort


    $OPTION = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    //$result = null;
    try {
        // Verbindung zur Datenbank aufbauen
        //$db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_BENUTZER, $DB_PASSWORT, $OPTION);
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $sqlSelect = "SELECT Rolle FROM thmmitglied WHERE Username = '$uid' and Passwort = '$password';";
        $result = mysqli_query($conn, $sqlSelect);
        //$resultCheck = mysqli_num_rows($result);
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }

while($row = $result->fetch_row()) {
    print_r($row);
}


$rolle = null;

    // die Rolle des Users suchen, um sie der Session zu übergeben
    $rolle = getUserClassFrom($uid, $password);

    return $rolle;

  //  error_reporting(0);
    return $result->fetch_row()[0];

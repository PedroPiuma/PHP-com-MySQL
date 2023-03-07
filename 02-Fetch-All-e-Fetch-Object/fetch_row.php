<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "test";

// Conect MySQL
@$mysqli = new mysqli($server, $user, $pass, $database);
// Error
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

$sql = "SELECT * FROM USER";
if ($query = $mysqli->query($sql)) {
    while ($user = $query->fetch_row()) {
        echo "name: " . $user[1] . "<br>";
    }
    // fetch_row trás apenas uma linha
}

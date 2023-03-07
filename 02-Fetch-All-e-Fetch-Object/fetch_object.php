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
    // var_dump($query->fetch_object());
    while ($user = $query->fetch_object()) {
        echo "name: " . $user->name . "<br>";
    }
}
    // fetch_row trás apenas uma linha

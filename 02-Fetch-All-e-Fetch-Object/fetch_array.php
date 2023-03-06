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
    while ($user = $query->fetch_array()) {
        [$id, $name, $email] = $user;
        echo "ID: $id, Name: $name, Email: $email <br>";
        // var_dump($user);
    }
}

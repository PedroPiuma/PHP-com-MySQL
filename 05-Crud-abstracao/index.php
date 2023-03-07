<?php
require_once("User.php");
require_once("ServiceUser.php");

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

$user = new User();
$serviceUser = new ServiceUser($mysqli, $user);

var_dump($serviceUser->list());

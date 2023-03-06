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
    // $user = $query->fetch_all(MYSQLI_NUM); Default
    // $user = $query->fetch_all(MYSQLI_BOTH); Default + Assoc
    $user = $query->fetch_all(MYSQLI_ASSOC); // Array associativo
    var_dump($user);

    foreach ($user as $value) {
        echo  "<br><br>" . $value["id"] . "<br>";
        echo $value["name"] . "<br>";
        echo $value["email"];
    }
}

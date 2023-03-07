<?php
require_once("User.php");

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

$user = new User($mysqli);
// $user->setName('Gustavo')->setEmail('gustavo@gustavo.com');
// echo $user->insert();

// $user->setId("2")->setName("admin")->setEmail('admin@gmail.com');
// echo $user->update();

// echo $user->delete(1);

$user_arr = $user->find(2);
echo $user_arr["name"] . " - " . $user_arr["email"];


// $ret = $user->list('id desc');
// foreach ($ret as $value) {
//     echo "<br><br>" . $value['id'] . "<br>";
//     echo $value['name'] . "<br>";
//     echo $value['email'] . "<br><hr>";
// }

// $user->setName('Pedro')->setEmail('pedro@pedro.com');
// echo $user->insert();

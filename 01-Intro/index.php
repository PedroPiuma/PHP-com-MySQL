<?php
// PDO: Classe para fazer conexão com banco de dados orientada a objetos

$server = "localhost";
$user = "root";
$pass = "";
$database = "test";

// Conect MySQL
@$mysqli = new mysqli($server, $user, $pass, $database); // Operador @, remove mensagem de erro quando existir

/**
 * O primeiro bloco de código define as credenciais de acesso ao banco de dados:
 *  $server, $user, $pass e $database. Em seguida, a classe mysqli é instanciada
 *  para estabelecer uma conexão com o banco de dados. O operador @ é usado para
 *  suprimir quaisquer mensagens de erro que possam ser geradas pela tentativa de conexão.
 */

// Error
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
    /**
     * Se a conexão falhar, uma mensagem de erro será exibida,
     * caso contrário, a consulta SQL definida em $sql será 
     * executada usando o método query() do objeto $mysqli.
     */
}

$sql = "SELECT * FROM USER";
$query = $mysqli->query($sql);

while ($data = $query->fetch_assoc()) {
    echo "Id: " . $data['id'] . "<br>";
    echo "Name: " . $data['name'] . "<br>";
    echo "E-mail: " . $data['email'] . "<br><hr>";
}
/**
 *  Um loop while é usado para percorrer todos os resultados da consulta
 *  usando o método fetch_assoc() do objeto $query. O resultado de cada
 *  linha é armazenado em uma variável $data, e as colunas específicas
 *  são acessadas usando seus nomes, como $data['id'] e $data['name']. 
 *  Os valores dessas colunas são exibidos na página usando a função echo.
 */

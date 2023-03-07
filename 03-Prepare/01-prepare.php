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
// Primeiro, o código define as credenciais de acesso ao banco de dados
//  (servidor, usuário, senha e nome do banco de dados) e utiliza a
//   classe mysqli para se conectar ao banco de dados.

$stmt = $mysqli->stmt_init();
// Em seguida, um objeto mysqli_stmt é criado usando o método stmt_init() da 
// classe mysqli. Esse objeto representa uma declaração SQL que pode ser 
// preparada, executada e seus resultados vinculados a variáveis.

$stmt->prepare("SELECT name,email FROM USER WHERE id = ? and name = ?");
// Na próxima linha, o método prepare() é chamado no objeto $stmt, que 
// prepara a declaração SQL para execução. O símbolo ? é usado como um 
// marcador de posição para os parâmetros de entrada da consulta.

$stmt->bind_param('is', $_GET["id"], $_GET["name"]);
// O método bind_param() é então usado para vincular os valores dos
// parâmetros passados na URL através da superglobal $_GET. O primeiro
// parâmetro é uma string que especifica os tipos de dados dos valores
// passados, "is" significa que o primeiro valor é um inteiro e o
// segundo valor é uma string. Os valores são passados como argumentos adicionais.

$stmt->execute();
$stmt->bind_result($name, $email);
// O método execute() é chamado em $stmt para executar a consulta e o
// método bind_result() é usado para vincular as colunas da consulta
// às variáveis $name e $email.

$stmt->fetch();
// Por fim, o método fetch() é chamado para buscar o resultado da
// consulta e atribuir os valores às variáveis $name e $email,
// que são exibidos na página usando a função echo.

echo "name: " . $name . "<br>";
echo "e-mail: " . $email . "<br>";
// Em resumo, o código estabelece uma conexão com um banco de dados MySQL,
// prepara e executa uma consulta SQL usando parâmetros passados na URL,
// e exibe o resultado na página.
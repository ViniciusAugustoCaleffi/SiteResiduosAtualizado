<?php
$servername = "localhost"; // Ou o endereço do servidor
$username = "root"; // Seu usuário de banco de dados
$password = ""; // Sua senha de banco de dados
$dbname = "residuos"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se houve erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>

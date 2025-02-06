<?php
namespace PHP\Modelo\Pages;

require_once('../Config/Conexao.php'); // Certifique-se de que o caminho está correto
use PHP\Modelo\Config\Conexao; // Incluindo a classe Conexao

// Criando a instância da classe Conexao
$conexao = new Conexao();

// Obtendo a conexão
$conn = $conexao->getConnection(); // Agora a variável $conn tem a conexão válida

// Verificando se a conexão foi estabelecida corretamente
if (!$conn) {
    die("Erro na conexão com o banco de dados.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebendo os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $destino = $_POST['destino'];
    $data = $_POST['data'];
    $categoria = $_POST['categoria'];
    $peso = $_POST['peso'];

    // Evitar SQL Injection utilizando prepared statements
    $stmt = $conn->prepare("INSERT INTO pesagem_residuos (id, nome, destino, data, categoria, peso) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdss", $id, $nome, $destino, $data, $categoria, $peso); // "issdss" indica que id é inteiro, nome e destino são strings, data é string, categoria e peso são strings e decimal

    if ($stmt->execute()) {
        echo "Registro inserido com sucesso!";
        echo '<a href="pesagem.php">Voltar</a>';
    } else {
        echo "Erro ao inserir registro: " . $stmt->error;
    }

    $stmt->close(); // Fechando o statement
}

$conn->close(); // Fechando a conexão
?>

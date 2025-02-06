<?php
namespace PHP\Modelo\Pages;

require_once(__DIR__ . '/../Config/Conexao.php');
require_once(__DIR__ . '/../Config/Excluir.php');

use PHP\Modelo\Config\Conexao;
use PHP\Modelo\Config\Excluir;

// Instanciando as classes
$conexao = new Conexao();
$excluir = new Excluir();
$mensagem = ""; // Inicializando a variável de mensagem

// Verificando se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tCodigo'])) {
    $codigo = $_POST['tCodigo']; // Obtendo o ID informado
    
    // Garantir que o código seja um inteiro
    if (is_numeric($codigo)) {
        $codigo = (int)$codigo; // Convertendo para inteiro
        $mensagem = $excluir->excluirPesagem($conexao, $codigo); // Chamando a função de exclusão
    } else {
        $mensagem = "Por favor, informe um ID válido.";
    }
} else {
    $mensagem = "Preencha o ID para excluir a pesagem."; // Mensagem padrão
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Pesagem</title>
    <link rel="stylesheet" href="../styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Excluir Pesagem</h2>
        
        <!-- Formulário para excluir pesagem -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="tCodigo" class="form-label">Informe o ID da Pesagem</label>
                <input type="text" class="form-control" name="tCodigo" id="tCodigo" required />
            </div>
            <button class="button">
  <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
</button>
        </form>

        <!-- Exibindo a mensagem -->
        <div class="mt-3">
            <p><?php echo $mensagem; ?></p>
        </div>
    </div>
    <a href="../index.php"><button class="btn">Voltar para a Página Inicial</button></a>
</body>
</html>

<?php
namespace PHP\Modelo\Pages;

require_once('../Config/Conexao.php');
use PHP\Modelo\Config\Conexao;

// Criando a instância da classe Conexao
$conexao = new Conexao();

// Obtendo a conexão
$conn = $conexao->getConnection(); // A conexão agora é obtida corretamente

// Verificando se a conexão foi estabelecida corretamente
if (!$conn) {
    die("Erro na conexão com o banco de dados.");
}

// Query para buscar os dados da tabela 'pesagem_residuos'
$sql = "SELECT * FROM pesagem_residuos"; // Nome correto da tabela
$result = mysqli_query($conn, $sql); // Passando a conexão corretamente para a consulta
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Pesagens</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    
    <nav class="navbar">
            <img src="../imagens/LogoEcoeficienciaAntigo02-removebg-preview.png" height="100px">
    </nav>

    <div class="container">
        <div class="h1Relatorio">
            <h1>Relatório de Pesagens</h1>
        </div>
        
        <!-- Tabela de Relatório -->
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Categoria</th>
                    <th>Peso (kg)</th>
                    <th>Nome</th> <!-- Nova coluna para o nome -->
                    <th>Destino</th> <!-- Nova coluna para o destino -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['data']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['peso']; ?></td>
                        <td><?php echo $row['nome']; ?></td> <!-- Exibindo o nome -->
                        <td><?php echo $row['destino']; ?></td> <!-- Exibindo o destino -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Botão para voltar à página inicial -->
        <a href="../index.php"><button class="btn">Voltar para a Página Inicial</button></a>
    </div>

</body>
</html>

<?php
// Fechando a conexão
$conexao->close();
?>

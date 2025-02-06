<?php
namespace PHP\Modelo\Pages;

require_once('../Config/Conexao.php'); // Inclui a conexão
use PHP\Modelo\Config\Conexao;

$conexao = new Conexao();

// Inicializa as variáveis para o formulário
$id = $data = $categoria = $peso = "";
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se o ID foi selecionado, busca os dados dessa pesagem
    if (isset($_POST['tCodigo'])) {
        $id = $_POST['tCodigo'];
        
        // Consulta os dados da pesagem
        $sql = "SELECT * FROM pesagem_residuos WHERE id = ?";
        $stmt = $conexao->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id); // Liga o parâmetro
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row['data'];
            $categoria = $row['categoria'];
            $peso = $row['peso'];
        } else {
            $mensagem = "Pesagem não encontrada!";
        }
    }
    
    // Se os novos dados foram enviados, atualize a pesagem
    if (isset($_POST['data']) && isset($_POST['categoria']) && isset($_POST['peso'])) {
        $newData = $_POST['data'];
        $newCategoria = $_POST['categoria'];
        $newPeso = $_POST['peso'];

        // Atualiza os dados no banco
        $updateSql = "UPDATE pesagem_residuos SET data = ?, categoria = ?, peso = ? WHERE id = ?";
        $stmtUpdate = $conexao->getConnection()->prepare($updateSql);
        $stmtUpdate->bind_param("ssdi", $newData, $newCategoria, $newPeso, $id); // Liga os parâmetros
        if ($stmtUpdate->execute()) {
            $mensagem = "Pesagem atualizada com sucesso!";
        } else {
            $mensagem = "Erro ao atualizar pesagem: " . $conexao->getConnection()->error;
        }
    }
}

?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Pesagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Atualizar Pesagem</h1>
        
        <!-- Exibe a mensagem de erro ou sucesso -->
        <p><?php echo $mensagem; ?></p>

        <!-- Formulário de seleção do ID -->
        <form method="POST">
            <div class="mb-3">
                <label for="tCodigo" class="form-label">Informe o ID da Pesagem</label>
                <input type="text" class="form-control" name="tCodigo" id="tCodigo" value="<?php echo $id; ?>" required />
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php if ($id && $data): ?>
            <!-- Se os dados foram encontrados, exibe o formulário para editar -->
            <h2>Editar Pesagem</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" class="form-control" name="data" value="<?php echo $data; ?>" required />
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="categoria" value="<?php echo $categoria; ?>" required />
                </div>
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input type="number" step="0.01" class="form-control" name="peso" value="<?php echo $peso; ?>" required />
                </div>
                <input type="hidden" name="tCodigo" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-success">Atualizar</button>
            </form>
        <?php endif; ?>

        <br>
        <a href="../index.php"><button class="btn btn-secondary">Voltar</button></a>
    </div>
</body>
</html>

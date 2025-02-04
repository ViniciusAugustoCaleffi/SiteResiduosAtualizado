<?php
include '../config/conexao.php';

$sql = "SELECT * FROM pesagem_residuos";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Resíduos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Relatório de Pesagens</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Peso (kg)</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['data']; ?></td>
                <td><?php echo $row['categoria']; ?></td>
                <td><?php echo $row['peso']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><a href="../index.php"><button>Voltar para a Página Inicial</button></a>
</body>
</html>

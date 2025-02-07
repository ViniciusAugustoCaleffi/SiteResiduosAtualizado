<?php include '../config/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pesagem</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <nav class="navbar">
            <img src="../imagens/LogoEcoeficienciaAntigo02-removebg-preview.png" height="100px">
    </nav>

    <div class="container">
        <form class="form" action="processa_pesagem.php" method="POST">
            <!-- Campo ID -->
            <label for="id">ID:</label>
            <input type="text" name="id" required>

            <!-- Campo Nome -->
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <!-- Campo Data -->
            <label for="data">Data:</label>
            <input type="date" name="data" required>

            <!-- Campo Categoria -->
            <label for="categoria">Categoria:</label>
            <select name="categoria" required>
                <option value="não reciclável">Não Reciclável</option>
                <option value="reciclável">Reciclável</option>
                <option value="óleo">Óleo</option>
                <option value="tampinhas plásticas">Tampinhas Plásticas</option>
                <option value="lacres de alumínio">Lacres de Alumínio</option>
                <option value="tecidos">Tecidos</option>
                <option value="meias">Meias</option>
                <option value="material de escrita">Material de Escrita</option>
                <option value="esponjas">Esponjas</option>
                <option value="eletrônicos">Eletrônicos</option>
                <option value="pilhas e baterias">Pilhas e Baterias</option>
                <option value="infectante">Infectante</option>
                <option value="químicos">Químicos</option>
                <option value="lâmpada fluorescente">Lâmpada Fluorescente</option>
                <option value="tonners de impressora">Tonners de Impressora</option>
                <option value="esmaltes">Esmaltes</option>
                <option value="cosméticos">Cosméticos</option>
                <option value="cartela de medicamento">Cartela de Medicamento</option>
            </select>

            <!-- Campo Peso -->
            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" step="0.01" required>

            <!-- Campo Destino -->
            <label for="destino">Destino da pesagem:</label>
            <input type="text" name="destino" required>

            <!-- Botão de envio -->
            <button type="submit" class="btn">Salvar</button>
        </form>

        <a href="../index.php"><button class="btn">Voltar para a Página Inicial</button></a>
    </div>

</body>
</html>

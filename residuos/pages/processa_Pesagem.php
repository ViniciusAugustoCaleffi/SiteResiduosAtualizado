<?php
include '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];
    $categoria = $_POST['categoria'];
    $peso = $_POST['peso'];

    $sql = "INSERT INTO pesagem_residuos (data, categoria, peso) VALUES ('$data', '$categoria', '$peso')";
    if (mysqli_query($conn, $sql)) {
        echo "Registro inserido com sucesso!";
        echo '<a href="pesagem.php">Voltar</a>';
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conn);
    }
}
?>

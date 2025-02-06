<?php
namespace PHP\Modelo\Config;

class Excluir {

    public function excluirPesagem(Conexao $conexao, int $codigo) {
        // Obtendo a conexão
        $conn = $conexao->getConnection();

        // Prepare statement para excluir o registro
        $sql = "DELETE FROM pesagem_residuos WHERE id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameter
            $stmt->bind_param("i", $codigo); // "i" é para inteiro
            if ($stmt->execute()) {
                return "Pesagem excluída com sucesso!";
            } else {
                return "Erro ao excluir pesagem: " . $stmt->error;
            }
        } else {
            return "Erro no comando SQL: " . $conn->error;
        }
    }
}
?>

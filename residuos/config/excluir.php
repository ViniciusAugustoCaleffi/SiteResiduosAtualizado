<?php
    namespace PHP\Modelo\config;
    require_once('Conexao.php');
    use PHP\Modelo\DAO\Conexao;
 
 
    class Excluir{
        function excluirPesagem(Conexao $conexao, int $codigo){
            $conn = $conexao->conectar();
            $sql = "delete from peso where codigo = '$codigo'";
            $result = mysqli_query($conn,$sql);
            mysqli_close($conn);
 
            if($result){
                echo "Deletado com sucesso!";
            }else{
                echo "Não deletado!";
            }
        }
 
 
    }//fim da classe
?>
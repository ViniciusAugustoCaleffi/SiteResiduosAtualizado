
<?php
    namespace PHP\Modelo\config;
    require_once('Conexao.php');
    use PHP\Modelo\DAO\Conexao;
 
    class Atualizar
    {
        function atualizarPesagem(
            Conexao $conexao,
            string $campo,
            string $novoDado,
            int $codigo
        ){
            $conn = $conexao->conectar();
            $sql = "Update peso set $campo = '$novoDado' where codigo = '$codigo'";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            if($result){
                echo "<br>Atualizado com sucesso!";
            }else{
                echo "<br> Não Atualizado!";
            }
        }//fim do metodo
 
    }//fim da classe
?>
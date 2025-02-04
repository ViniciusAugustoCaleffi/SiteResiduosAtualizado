<?php
    namespace PHP\Modelo\Telas;
    require_once('..\Config\Conexao.php');
    require_once('..\Config\Excluir.php');
    use PHP\Modelo\DAO\Conexao;
    use PHP\Modelo\DAO\Excluir;
?>
 
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Excluir Pesagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form method="POST">
            <label>Informe o ID</label>
            <input type="text" name="tCodigo"/>
            <button type="submit">Excluir
            <?php
                $conexao = new Conexao();
                if(isset($_POST['tCodigo'])){
                    $codigo = $_POST['tCodigo'];
                    $excluir = new Excluir();
                }        
 
            ?>
            </button>
            <?php
            if(isset($_POST['tCodigo'])){
                echo $excluir->excluirPesagem($conexao, $codigo);
            }else{
                echo "Preencha o ID:";
            }
        ?>
 
    </form>
</body>
</html>
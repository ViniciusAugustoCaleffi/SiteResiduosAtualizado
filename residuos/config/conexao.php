<?php
namespace PHP\Modelo\Config;

class Conexao {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "residuos";
    private $conn;

    public function __construct() {
        // Criando a conexão com o banco de dados usando a classe mysqli diretamente
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificando se houve erro na conexão
        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        }
    }

    // Método para obter a conexão
    public function getConnection() {
        return $this->conn;
    }

    // Método para fechar a conexão
    public function close() {
        $this->conn->close();
    }
}
?>

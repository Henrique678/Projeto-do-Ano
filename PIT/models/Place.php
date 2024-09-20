<?php

class Place {
    private $conn;
    public $table_name = "places";

    public $idPlace;
    public $nome;
    public $categoria;
    public $descricao;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $cep;
    public $telefone;
    public $emailPlace;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace) VALUES (:nome, :categoria, :descricao, :endereco, :numero, :bairro, :cidade, :cep, :telefone, :emailPlace)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->tarefa = htmlspecialchars(strip_tags($this->tarefa));
        $this->prazo = htmlspecialchars(strip_tags($this->prazo));

        // Bind parameters
        $stmt->bindParam(':tarefa', $this->tarefa);
        $stmt->bindParam(':prazo', $this->prazo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne() {
        $query = "SELECT nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace FROM " . $this->table_name . " WHERE idPlace = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idPlace);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->categoria = $row['categoria'];
        $this->descricao = $row['descricao'];
        $this->endereco = $row['endereco'];
        $this->numero = $row['numero'];
        $this->bairro = $row['bairro'];
        $this->cidade = $row['cidade'];
        $this->cep = $row['cep'];
        $this->telefone = $row['telefone'];
        $this->emailPlace = $row['emailPlace'];
    }

    // Delete - Excluir um usuário pelo ID
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
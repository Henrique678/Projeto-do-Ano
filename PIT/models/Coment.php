<?php

class Coment {
    private $conn;
    public $table_name = "comentarios";

    public $idComent;
    public $comentario;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar uma nova comentario
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (comentario) VALUES (:comentario)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->comentario = htmlspecialchars(strip_tags($this->comentario));

        // Bind parameters
        $stmt->bindParam(':comentario', $this->comentario);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de uma comentario pelo idComent
    public function readOne() {
        $query = "SELECT comentario FROM " . $this->table_name . " WHERE idComent = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idComent);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->comentario = $row['comentario'];
    }

    // Update - Atualizar os dados de uma comentario
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET comentario = :comentario = WHERE idComent = :idComent";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idComent = htmlspecialchars(strip_tags($this->idComent));
        $this->comentario = htmlspecialchars(strip_tags($this->comentario));

        // Bind parameters
        $stmt->bindParam(':idComent', $this->idComent);
        $stmt->bindParam(':comentario', $this->comentario);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir uma comentario pelo idComent
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idComent = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idComent);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
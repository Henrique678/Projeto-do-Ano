<?php

include_once 'models/Coment.php';

class ComentController {
    private $db;
    private $coment;

    public function __construct($db) {
        $this->db = $db;
        $this->coment = new Coment($db);
    }

    // Método para criar uma nova comentario
    public function create($comentario) {
        $this->coment->comentario = $comentario;

        if($this->coment->create()) {
            return "comentario criada.";
        } else {
            return "Não foi possível criar comentario.";
        }
    }

    // Método para obter detalhes de uma comentario pelo idComent
    public function readOne($idComent) {
        $this->coment->idComent = $idComent;
        $this->coment->readOne();

        if($this->coment->comentario != null) {
            // Cria um array associativo com os detalhes da comentario
            $coment_arr = array(
                "idComent" => $this->coment->idComent,
                "comentario" => $this->coment->comentario
            );
            return $coment_arr;
        } else {
            return "comentario não localizada.";
        }
    }

    // Método para atualizar os dados de uma comentario
    public function update($idComent, $comentario) {
        $this->coment->idComent = $idComent;
        $this->coment->comentario = $comentario;

        if($this->coment->update()) {
            return "comentario atualizada.";
        } else {
            return "Não foi possível atualizar a comentario.";
        }
    }

    // Método para excluir uma comentario pelo idComent
    public function delete($idComent) {
        $this->coment->idComent = $idComent;

        if($this->coment->delete()) {
            return "comentario foi excluída.";
        } else {
            return "Nao foi possível excluir comentario.";
        }
    }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todas as comentarios (exemplo adicional)
    public function readAll() {
        $query = "SELECT idComent, comentario, FROM " . $this->coment->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $coments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $coments;
    }
}
?>

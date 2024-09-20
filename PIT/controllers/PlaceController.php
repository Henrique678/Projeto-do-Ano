<?php

include_once 'models/Place.php';

class PlaceController {
    private $db;
    private $place;

    public function __construct($db) {
        $this->db = $db;
        $this->place = new Place($db);
    }

    // Método para criar um novo usuário
    public function create($nome, $categoria, $descricao, $endereco, $numero, $bairro, $cidade, $cep, $telefone, $emailPlace) {
        $this->place->tarefa = $nome;
        $this->place->prazo = $categoria;
        $this->place->prazo = $descricao;
        $this->place->prazo = $endereco;
        $this->place->prazo = $numero;
        $this->place->prazo = $bairro;
        $this->place->prazo = $cidade;
        $this->place->prazo = $cep;
        $this->place->prazo = $telefone;
        $this->place->prazo = $emailPlace;

        if($this->place->create()) {
            return "Local criado.";
        } else {
            return "Não foi possível criar local.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($idPlace) {
        $this->place->idPlace = $idPlace;
        $this->place->readOne();

        if($this->place->tarefa != null) {
            // Cria um array associativo com os detalhes do usuário
            $place_arr = array(
                "idPlace" => $this->place->idPlace,
                "nome" => $this->place->nome,
                "categoria" => $this->place->categoria,
                "descricao" => $this->place->descricao,
                "endereco" => $this->place->endereco,
                "numero" => $this->place->numero,
                "bairro" => $this->place->bairro,
                "cidade" => $this->place->cidade,
                "cep" => $this->place->cep,
                "telefone" => $this->place->telefone,
                "emailPlace" => $this->place->emailPlace
            );
            return $place_arr;
        } else {
            return "Local não localizado.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($idPlace) {
        $this->place->idPlace = $idPlace;

        if($this->place->delete()) {
            return "Local excluído.";
        } else {
            return "Nao foi possível excluir local.";
        }
    }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll() {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace FROM " . $this->place->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $places;
    }
}
?>

<?php

include_once 'Model.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    // Método para criar um novo usuário
    public function create_user($name, $email, $senha) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->create_user()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_user($idUser) {
        $this->user->idUser = $idUser;
        $this->user->readOne_user();

        if($this->user->name != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "idUser" => $this->user->idUser,
                "name" => $this->user->name,
                "email" => $this->user->email,
                "senha" => $this->user->senha 
            );
            return $user_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_user($idUser, $name, $email, $senha) {
        $this->user->id = $idUser;
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->update_user()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_user($idUser) {
        $this->user->idUser = $idUser;

        if($this->user->delete_user()) {
            return "Usuário foi excluído.";
        } else {
            return "Nao foi possível excluir usuário.";
        }
    }
    public function index_user() {
        return $this->readAll_user();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll_user() {
        $query = "SELECT idUser, name, email FROM " . $this->user->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

include_once 'Model.php';

class PlaceController {
    private $db;
    private $place;

    public function __construct($db) {
        $this->db = $db;
        $this->place = new Place($db);
    }

    // Método para criar um novo usuário
    public function create_place($nome, $categoria, $descricao, $endereco, $numero, $bairro, $cidade, $cep, $telefone, $emailPlace, $horario, $site, $insta, $img, $waze) {
        $this->place->nome = $nome;
        $this->place->categoria = $categoria;
        $this->place->descricao = $descricao;
        $this->place->endereco = $endereco;
        $this->place->numero = $numero;
        $this->place->bairro = $bairro;
        $this->place->cidade = $cidade;
        $this->place->cep = $cep;
        $this->place->telefone = $telefone;
        $this->place->emailPlace = $emailPlace;
        $this->place->horario = $horario;
        $this->place->site = $site;
        $this->place->insta = $insta;
        $this->place->img = $img;
        $this->place->waze = $waze;

        if($this->place->create_place()) {
            return "Local criado.";
        } else {
            return "Não foi possível criar local.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_place($idPlace) {
        $this->place->idPlace = $idPlace;
        $this->place->readOne_place();

        if($this->place->nome != null) {
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
                "emailPlace" => $this->place->emailPlace,
                "horarios" => $this->place->horarios,
                "site" => $this->place->site,
                "insta" => $this->place->insta,
                "img" => $this->place->img,
                "waze" => $this->place->waze
            );
            return $place_arr;
        } else {
            return "Local não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_place($id, $name, $email) {
        $this->place->id = $id;
        $this->place->name = $name;
        $this->place->email = $email;

        if($this->place->update_place()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_place($idPlace) {
        $this->place->idPlace = $idPlace;

        if($this->place->delete_place()) {
            return "Usuário foi excluído.";
        } else {
            return "Nao foi possível excluir usuário.";
        }
    }
    public function index_place() {
        return $this->readAll_place();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll_place() {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, horarios, site, insta, img, waze FROM " . $this->place->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $places;
    }

    public function readSearch($pesquisa) {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, horarios, site, insta, img, waze FROM " . $this->place->table_name . " WHERE nome like :pesquisa";
        $stmt = $this->db->prepare($query);
        $pesquisa = "%$pesquisa%";  
        $stmt->bindParam(':pesquisa', $pesquisa);  
        $stmt->execute();
        $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $places;
    }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

include_once 'Model.php';

class FavController {
    private $db;
    private $fav;

    public function __construct($db) {
        $this->db = $db;
        $this->fav = new Fav($db);
    }

    // Método para criar um novo usuário
    public function create_fav($fk_idUser, $fk_idPlace) {
        $this->fav->fk_idUser = $fk_idUser;
        $this->fav->fk_idPlace = $fk_idPlace;

        if($this->fav->create_fav()) {
            return "Favorito adicionado.";
        } else {
            return "Não foi possível adicionar favorito.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_fav($idFav) {
        $this->fav->idFav = $idFav;
        $this->fav->readOne_fav();

        if($this->fav->fk_idPlace != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "idFav" => $this->fav->idFav,
                "fk_idUser" => $this->fav->fk_idUser,
                "fk_idPlace" => $this->fav->fk_idPlace
            );
            return $fav_arr;
        } else {
            return "Favorito não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_fav($idFav, $fk_idUser, $fk_idPlace) {
        $this->fav->idFav = $idFav;
        $this->fav->fk_idUser = $fk_idUser;
        $this->fav->fk_idPlace = $fk_idPlace;

        if($this->fav->update_fav()) {
            return "Favorito atualizado.";
        } else {
            return "Não foi possível atualizar o favorito.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_fav($fk_idPlace) {
        $this->fav->fk_idPlace = $fk_idPlace;

        if($this->fav->delete_fav()) {
            return "Favorito foi excluído.";
        } else {
            return "Nao foi possível excluir favorito.";
        }
    }
    public function index_fav() {
        return $this->readAll_fav();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll_fav() {
        $query = "SELECT idFav, fk_idUser, fk_idPlace FROM " . $this->fav->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $favs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $favs;
    }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

include_once 'Model.php';

class ComentController {
    private $db;
    private $coment;

    public function __construct($db) {
        $this->db = $db;
        $this->coment = new Coment($db);
    }

    // Método para criar um novo usuário
    public function create_coment($coment, $fk_idUser) {
        $this->coment->coment = $coment;
        $this->coment->fk_idUser = $fk_idUser;

        if($this->coment->create_coment()) {
            return "Comentário criado.";
        } else {
            return "Não foi possível criar comentário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_coment($idComent) {
        $this->coment->idComent = $idComent;
        $this->coment->readOne_coment();

        if($this->coment->coment != null) {
            // Cria um array associativo com os detalhes do usuário
            $coment_arr = array(
                "idComent" => $this->coment->idComent,
                "coment" => $this->coment->coment,
                "fk_idUser" => $this->coment->fk_idUser
            );
            return $coment_arr;
        } else {
            return "Comentário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_coment($idComent, $coment, $fk_idUser) {
        $this->coment->idComent = $idoComent;
        $this->coment->coment = $coment;
        $this->coment->fk_idUser = $fk_idUser;

        if($this->coment->update_coment()) {
            return "Comentário atualizado.";
        } else {
            return "Não foi possível atualizar o comentário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_coment($idComent) {
        $this->coment->idComent = $idComent;

        if($this->coment->delete_coment()) {
            return "Comentário foi excluído.";
        } else {
            return "Nao foi possível excluir comentário.";
        }
    }
    public function index_coment() {
        return $this->readAll_coment();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll_coment() {
        $query = "SELECT idComent, coment, fk_idUser FROM " . $this->coment->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $coments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $coments;
    }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

include_once 'Model.php';

class AvalController {
    private $db;
    private $aval;

    public function __construct($db) {
        $this->db = $db;
        $this->aval = new Aval($db);
    }

    // Método para criar um novo usuário
    public function create($fk_idPlace, $fk_idUser, $nota) {
        $this->aval->fk_idPlace = $fk_idPlace;
        $this->aval->fk_idPlace = $fk_idPlace;
        $this->aval->nota = $nota;

        if($this->aval->create_aval()) {
            return "Avaliação criada.";
        } else {
            return "Não foi possível criar avaliação.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_Aval($id) {
        $this->aval->id = $id;
        $this->aval->readOne_Aval();

        if($this->aval->nota != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "nota" => $this->aval->nota,

            );
            return $aval_arr;
        } else {
            return "Avaliação não localizada.";
        }
    }

    // // Método para atualizar os dados de um usuário
    // public function update($id, $name, $email) {
    //     $this->user->id = $id;
    //     $this->user->name = $name;
    //     $this->user->email = $email;

    //     if($this->user->update()) {
    //         return "Usuário atualizado.";
    //     } else {
    //         return "Não foi possível atualizar o usuário.";
    //     }
    // }

    // // Método para excluir um usuário pelo ID
    // public function delete($id) {
    //     $this->user->id = $id;

    //     if($this->user->delete()) {
    //         return "Usuário foi excluído.";
    //     } else {
    //         return "Nao foi possível excluir usuário.";
    //     }
    // }
    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll() {
        $query = "SELECT id, name, email FROM " . $this->user->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
?>
<?php

class User {
    private $conn;
    public $table_name = "usuarios";

    public $idUser;
    public $name;
    public $email;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create_user() {
        $query = "INSERT INTO " . $this->table_name . " (name, email, senha) VALUES (:name, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind parameters
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_user() {
        $query = "SELECT name, email, senha FROM " . $this->table_name . " WHERE idUser = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUser);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->senha = $row['senha'];
    }

    // Update - Atualizar os dados de um usuário
    public function update_user() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, senha = :senha WHERE idUser = :idUser";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind parameters
        $stmt->bindParam(':idUser', $this->idUser);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete_user() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idUser = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUser);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

class Place {
    private $conn;
    public $table_name = "places";

    public $pesquisa;
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
    public $horarios;
    public $site;
    public $insta;
    public $img;
    public $waze;

    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Create - Criar um novo local
    // public function create_place() {
    //     $query = "INSERT INTO " . $this->table_name . " (nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, hr_segunda, hr_terca, hr_quarta, hr_quinta, hr_sexta, hr_sabado, hr_domingo, site, insta, img, waze) VALUES (:nome, :categoria, :descricao, :endereco, :numero, :bairro, :cidade, :cep, :telefone, :emailPlace, :hr_segunda, :hr_terca, :hr_quarta, :hr_quinta, :hr_sexta, :hr_sabado, :hr_domingo, :site, :insta, :img, :waze)";
    //     $stmt = $this->conn->prepare($query);

    //     // Sanitize inputs
    //     $this->name = htmlspecialchars(strip_tags($this->name));
    //     $this->email = htmlspecialchars(strip_tags($this->email));

    //     // Bind parameters
    //     $stmt->bindParam(':name', $this->name);
    //     $stmt->bindParam(':email', $this->email);

    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_place() {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, horarios, site, insta, img, waze FROM " . $this->table_name . " WHERE idPlace = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idPlace);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->idPlace = $row['idPlace'];
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
        $this->horarios = json_decode($row['horarios'], true);
        $this->site = $row['site'];
        $this->insta = $row['insta'];
        $this->img = $row['img'];
        $this->waze = $row['waze'];
        
    }

    // Update - Atualizar os dados de um usuário
    // public function update() {
    //     $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email WHERE id = :id";
    //     $stmt = $this->conn->prepare($query);

    //     // Sanitize inputs
    //     $this->id = htmlspecialchars(strip_tags($this->id));
    //     $this->name = htmlspecialchars(strip_tags($this->name));
    //     $this->email = htmlspecialchars(strip_tags($this->email));

    //     // Bind parameters
    //     $stmt->bindParam(':id', $this->id);
    //     $stmt->bindParam(':name', $this->name);
    //     $stmt->bindParam(':email', $this->email);

    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // // Delete - Excluir um usuário pelo ID
    // public function delete() {
    //     $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(1, $this->id);

    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

class Fav {
    private $conn;
    public $table_name = "favoritos";

    public $idFav;
    public $fk_idUser;
    public $fk_idPlace;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create_fav() {
        $query = "INSERT INTO " . $this->table_name . " (fk_idUser, fk_idPlace) VALUES (:fk_idUser, :fk_idPlace)";
        $stmt = $this->conn->prepare($query);
    
        // Sanitize inputs
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));
        $this->fk_idPlace = htmlspecialchars(strip_tags($this->fk_idPlace));
    
        // Bind parameters
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);
        $stmt->bindParam(':fk_idPlace', $this->fk_idPlace);
    
        try {
            // Tenta executar a consulta
            if ($stmt->execute()) {
                return "Local favoritado com sucesso."; // Somente se a inserção for bem-sucedida
            }
        } catch (PDOException $e) {
            // Verifica se o erro é relacionado à duplicidade na coluna com UNIQUE
            if ($e->getCode() == 23000) { // Código 23000 refere-se a uma violação de restrição de integridade, como UNIQUE
                return "Erro: o local já foi favoritado.";  // Mensagem personalizada para duplicidade
            } else {
                // Exibir o erro completo para debug
                return "Erro ao favoritar: " . $e->getMessage();  // Outros erros
            }
        }
    
        return false; // Retorna falso se nenhuma ação foi tomada
    }
    

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_fav() {
        $query = "SELECT fk_idUser, fk_idPlace FROM " . $this->table_name . " WHERE idFav = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idFav);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->fk_idUser = $row['fk_idUser'];
        $this->fk_idPlace = $row['fk_idPlace'];
    }

    // Update - Atualizar os dados de um usuário
    public function update_fav() {
        $query = "UPDATE " . $this->table_name . " SET fk_idUser = :fk_idUser, fk_idPlace = :fk_idPlace WHERE idFav = :idFav";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idFav = htmlspecialchars(strip_tags($this->idFav));
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));
        $this->fk_idPlace = htmlspecialchars(strip_tags($this->fk_idPlace));

        // Bind parameters
        $stmt->bindParam(':idFav', $this->idFav);
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);
        $stmt->bindParam(':fk_idPlace', $this->fk_idPlace);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
   

    // Delete - Excluir um usuário pelo ID
    public function delete_fav() {
        $query = "DELETE FROM " . $this->table_name . " WHERE fk_idPlace = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->fk_idPlace);

        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }
}
?>

<!-- ======================================================================================================================================================================================= -->

<?php

class Coment {
    private $conn;
    public $table_name = "comentarios";

    public $idComent;
    public $coment;
    public $datahora;
    public $fk_idUser;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create_coment() {
        $query = "INSERT INTO " . $this->table_name . " (coment, datahora, fk_idUser) VALUES (:coment, now(), :fk_idUser)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->coment = htmlspecialchars(strip_tags($this->coment));
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));

        // Bind parameters
        $stmt->bindParam(':coment', $this->coment);
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_coment() {
        $query = "SELECT coment, datahora, fk_idUser FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idComent);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->coment = $row['coment'];
        $this->datahora = $row['datahora'];
        $this->fk_idUser = $row['fk_idUser'];
    }

    // Update - Atualizar os dados de um usuário
    public function update_coment() {
        $query = "UPDATE " . $this->table_name . " SET coment = :coment, datahora = now() WHERE idComent = :idComent";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idComent = htmlspecialchars(strip_tags($this->idComent));
        $this->coment = htmlspecialchars(strip_tags($this->coment));
        $this->datahora = htmlspecialchars(strip_tags($this->datahora));

        // Bind parameters
        $stmt->bindParam(':ididComent', $this->idComent);
        $stmt->bindParam(':coment', $this->coment);
        $stmt->bindParam(':datahora', $this->datahora);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete_coment() {
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

<!-- ======================================================================================================================================================================================= -->

<?php

class Aval {
    private $conn;
    public $table_name = "avaliacoes";

    public $fk_idPlace;
    public $fk_idUser;
    public $nota;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (fk_idPlace, fk_idUser, nota) VALUES (:fk_idPlace, :fk_idUser, :nota)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->fk_idPlace = htmlspecialchars(strip_tags($this->fk_idPlace));
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));
        $this->nota = htmlspecialchars(strip_tags($this->nota));

        // Bind parameters
        $stmt->bindParam(':fk_idPlace', $this->fk_idPlace);
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);
        $stmt->bindParam(':nota', $this->nota);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne() {
        $query = "SELECT sum(nota) FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->email = $row['email'];
    }

    // // Update - Atualizar os dados de um usuário
    // public function update() {
    //     $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email WHERE id = :id";
    //     $stmt = $this->conn->prepare($query);

    //     // Sanitize inputs
    //     $this->id = htmlspecialchars(strip_tags($this->id));
    //     $this->name = htmlspecialchars(strip_tags($this->name));
    //     $this->email = htmlspecialchars(strip_tags($this->email));

    //     // Bind parameters
    //     $stmt->bindParam(':id', $this->id);
    //     $stmt->bindParam(':name', $this->name);
    //     $stmt->bindParam(':email', $this->email);

    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // // Delete - Excluir um usuário pelo ID
    // public function delete() {
    //     $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(1, $this->id);

    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
?>
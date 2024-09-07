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
    public function create() {

            // $query = "SELECT email FROM " . $this->table_name . " WHERE email = :email";
            // $stmt = $this->conn->prepare($query);    
            // //$row = $stmt->fetch(PDO::FETCH_ASSOC);


            // $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            
            // $email = 'matheus@gmail.com';
            
            // // Execute the statement
            // $stmt->execute();
            
            // // Fetch the result
            // $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // if ($result == false) {
            //     // No email found
            //     echo "No email found.";
            // } else {
            //     // Email found
            //     echo "Email: " . $result['email'];
            // }

            
        //     if (!empty($row)) {
        //         $bole -> false;
        //     } else {
        //         $bole -> true;
        //     }
           //if ($bole == false) {
                $query = "INSERT INTO " . $this->table_name . " (name, email, senha) VALUES (:name, :email, :senha)";
                $stmt = $this->conn->prepare($query);

                //Sanitize inputs
                $this->name = htmlspecialchars(strip_tags($this->name));
                $this->email = htmlspecialchars(strip_tags($this->email));
                $this->senha = htmlspecialchars(strip_tags($this->senha));

                //Bind parameters
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':senha', $this->senha);

                // if ($stmt->execute()) {
                //     return true;
                // } else {
                //     return false;
                // }
                try {
                    if ($stmt->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo " ";
                }
                
                
           //}
        
    }

    // public function readOne() {
        
        
    //     $query = "SELECT name, email FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(1, $this->id);
    //     $stmt->execute();

    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $this->name = $row['name'];
    //     $this->email = $row['email'];
    // }
}
?>
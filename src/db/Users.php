<?php 

namespace TecnologiaWeb\db;

use PDO;

class Users {

    private $connect;
    public function __construct(){
        $this->connect = new PDO("mysql:host=localhost;dbname=tecnologia_web", "root", "back");
    }

    public function getUsers($role) {

        $sql = "SELECT * FROM users WHERE role = :role";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $dados;


    }

    
    public function getUser($id) {

        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $dados;


    }

}

?>
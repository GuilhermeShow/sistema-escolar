<?php 

namespace TecnologiaWeb\db;

use PDO;

class Auth {

    private $connect;
    public function __construct(){
        $this->connect = new PDO("mysql:host=localhost;dbname=tecnologia_web", "root", "back");
    }

    public function cadastrar($nome, $email, $senha, $role = "aluno") {

        $usuarioExist = "SELECT * FROM users WHERE email = :email";
        $emailExistente = $this->connect->prepare($usuarioExist);
        $emailExistente->bindParam(":email", $email);
        $emailExistente->execute();
        if($emailExistente->rowCount() > 0) {
            $_SESSION["erro"] = "E-mail em uso, tente outro endereço de E-mail";
            return false;
        }else {
            
            $sql = "INSERT INTO users (nome, email, senha, role) VALUES (:n,:e,:s,:r)";

            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(":n", $nome);
            $stmt->bindParam(":e", $email);
            $stmt->bindParam(":s", $senha);
            $stmt->bindParam(":r", $role);
            $stmt->execute();
            
            
            return true;  
        }

  
    }

    public function login($email, $senha) {

        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if($dados["senha"] == $senha) {       
                session_start();
                if($dados["role"] == "aluno") {
                    $_SESSION["aluno"] = $dados;
                    $_SESSION["logado"] = true;
                    header("Location: /area-do-aluno");
                } else {
                    $_SESSION["professor"] = $dados;
                    $_SESSION["logado"] = true;
                    header("Location: /area-do-professor");       
                }         
        } else {
            $_SESSION["erro"] = "E-mail ou senha incorreto";
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function redirect($to) {
        header("Location: $to");
    }


}

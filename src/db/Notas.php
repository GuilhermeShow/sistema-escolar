<?php
namespace TecnologiaWeb\db;

use PDO;

class Notas {

    private $connect;
    public function __construct(){
        $this->connect = new PDO("mysql:host=localhost;dbname=tecnologia_web", "root", "back");
    }

    public function cadastrarNota($email, $nome, $s1, $s2, $s3, $s4) {
        $sql = "INSERT INTO notas (email_aluno, nome, semestre1, semestre2, semestre3, semestre4)
        VALUES (:e, :n, :s1, :s2, :s3 ,:s4)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":e", $email);
        $stmt->bindParam(":n", $nome);
        $stmt->bindParam(":s1", $s1);
        $stmt->bindParam(":s2", $s2);
        $stmt->bindParam(":s3", $s3);
        $stmt->bindParam(":s4", $s4);
        $stmt->execute();
        return true;
    }

}

?>
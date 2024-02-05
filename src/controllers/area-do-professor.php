<?php

use TecnologiaWeb\db\Users;

require_once("./vendor/autoload.php");

if(!isset($_SESSION["professor"])) {
    header("Location: /");
};

$dados = new Users();
$dado = $dados->getUsers("aluno");




include VIEW. "common/header.html";
include VIEW. "common/topo-menu.html";
include VIEW. "areas/professor/professor.html";
include VIEW. "common/footer.html";

?>
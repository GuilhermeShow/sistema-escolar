<?php

use TecnologiaWeb\db\Notas;
use TecnologiaWeb\db\Users;

require("./vendor/autoload.php");

if(!isset($_SESSION["professor"])) {
    header("Location: /");
};

$id = $_GET["aluno"];
$dados = new Users();
$dado = $dados->getUser($id);


// $form = filter_input_array(INPUT_POST);

// $notas = new Notas();
// $notas->cadastrarNota($dado["email"], $dado["nome"], $form["s1"],$form["s2"],$form["s3"],$form["s4"]);


include VIEW. "common/header.html";
include VIEW. "common/topo-menu.html";
include VIEW. "areas/professor/detalhe-aluno.html";
include VIEW. "common/footer.html";



?>


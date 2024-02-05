<?php

use TecnologiaWeb\db\Auth;
require ("./vendor/autoload.php");

$erro = $_SESSION["erro"];
$sucess = $_SESSION["sucess"];

$dados = filter_input_array(INPUT_POST);

if(!empty($dados)) {
    $login = new Auth();
    $login->cadastrar($dados["nome"], $dados["email"], $dados["senha"]);
}



$nameDocument = "Tecnologia | home";

include VIEW. "common/header.html";
include VIEW. "common/topo-menu.html";
include VIEW. "register/register.html";
include VIEW. "common/footer.html";

?>
<?php 

session_start();

$aluno = $_SESSION["aluno"];
$admin = $_SESSION["admin"];

define("VIEW", "src/views/");
define("MODEL", "src/models/");
define("CONTROLLER", "src/controllers/");

$url = $_SERVER["REQUEST_URI"];   

$id = $_GET['aluno'];

switch($url) {
    case "/": 
        include_once("./src/controllers/home.php");
        break;
        case "/login": 
            include_once("./src/controllers/login.php");
            break;
            case "/matricular": 
                include_once("./src/controllers/registrar.php");
                break;
                case "/area-do-professor": 
                    include_once("./src/controllers/area-do-professor.php");
                    break;
                    case "/detalhe-aluno?aluno=$id": 
                        include_once("./src/controllers/detalhe-aluno.php");
                        break;
                    case "/area-do-aluno": 
                        include_once("./src/controllers/area-do-aluno.php");
                        break;
                    case "/sair":
                        include_once("./src/controllers/sair.php");
                        break;
                        // default: 
                        //     echo "Pagina inexistente";
            }

?>
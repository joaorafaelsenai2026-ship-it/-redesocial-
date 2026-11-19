
<?php

require_once __DIR__ . "/../controllers/UsuarioController.php";
require_once __DIR__ . "/../controllers/PostagemController.php";
require_once __DIR__ . "/../controllers/CurtidaController.php";

$rota = $_GET["rota"] ?? "";
$metodo = $_SERVER["REQUEST_METHOD"];

$dados = json_decode(file_get_contents("php://input"), true) ?? [];
$id = $_GET["id"] ?? null;

switch ($rota) {

    case "usuario":
        switch ($metodo) {
            case "POST":
                createUsuario($con);
                break;

            case "GET":
                readUsuario($con);
                break;

            case "DELETE":
                deleteUsuario($con);
                break;

            default:
                teste();
                break;
        }
        break;

    case "postagens":
        postagemController($con, $metodo, $dados, $id);
        break;

    case "curtidas":
        curtidaController($con, $metodo, $dados, $id);
        break;

    default:
        http_response_code(404);
        echo json_encode(["erro" => "Rota não encontrada"]);
        break;
}

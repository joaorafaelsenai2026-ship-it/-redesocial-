<?php

require_once __DIR__ . "/../models/PostagemModel.php";

function postagemController($con, $metodo, $dados, $id = null) {

    switch ($metodo) {

        case "GET":
            if ($id) {
                $resultado = buscarPostagem($con, $id);
            } else {
                $resultado = listarPostagens($con);
            }
            break;

        case "POST":
            $resultado = criarPostagem($con, $dados);
            break;

        case "PUT":
            $resultado = atualizarPostagem($con, $id, $dados);
            break;

        case "DELETE":
            $resultado = excluirPostagem($con, $id);
            break;

        default:
            http_response_code(405);
            $resultado = ["erro" => "Método não permitido"];
    }

    echo json_encode($resultado);
}

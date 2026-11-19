<?php

require_once __DIR__ . "/../models/CurtidaModel.php";

function curtidaController($con, $metodo, $dados, $id = null) {

    switch ($metodo) {

        case "GET":
            $resultado = listarCurtidas($con);
            break;

        case "POST":
            $resultado = criarCurtida($con, $dados);
            break;

        case "DELETE":
            $resultado = excluirCurtida($con, $id);
            break;

        default:
            http_response_code(405);
            $resultado = ["erro" => "Método não permitido"];
    }

    echo json_encode($resultado);
}

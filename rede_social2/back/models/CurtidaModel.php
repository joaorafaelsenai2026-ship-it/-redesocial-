<?php

function listarCurtidas($con) {
    $sql = "SELECT * FROM curtidas";
    return $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function criarCurtida($con, $dados) {
    $stmt = $con->prepare(
        "INSERT INTO curtidas (id_usuario, id_postagem) VALUES (?, ?)"
    );

    return $stmt->execute([
        $dados["id_usuario"],
        $dados["id_postagem"]
    ]);
}

function excluirCurtida($con, $id) {
    $stmt = $con->prepare("DELETE FROM curtidas WHERE id_curtida = ?");
    return $stmt->execute([$id]);
}

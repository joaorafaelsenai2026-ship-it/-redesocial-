<?php

function listarPostagens($con) {
    $sql = "SELECT * FROM postagens";
    return $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function buscarPostagem($con, $id) {
    $stmt = $con->prepare("SELECT * FROM postagens WHERE id_postagem = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function criarPostagem($con, $dados) {
    $stmt = $con->prepare(
        "INSERT INTO postagens (id_usuario, conteudo) VALUES (?, ?)"
    );

    return $stmt->execute([
        $dados["id_usuario"],
        $dados["conteudo"]
    ]);
}

function atualizarPostagem($con, $id, $dados) {
    $stmt = $con->prepare(
        "UPDATE postagens SET conteudo = ? WHERE id_postagem = ?"
    );

    return $stmt->execute([
        $dados["conteudo"],
        $id
    ]);
}

function excluirPostagem($con, $id) {
    $stmt = $con->prepare("DELETE FROM postagens WHERE id_postagem = ?");
    return $stmt->execute([$id]);
}

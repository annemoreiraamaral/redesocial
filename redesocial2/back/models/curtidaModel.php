<?php
//CREATE
function inserir($con,$dados){
    $stmt = $con->prepare(
        "INSERT INTO curtidas (id_usuario, id_publicacao)
        VALUES(?,?)"

    );
    $stmt -> execute([  $dados["id_usuario"],
        $dados["id_publicacao"]]);                    
        return $con->lastInsertId();
}
//READ
function listar($con){
    $stmt = $con -> query("SELECT * FROM curtidas");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//UPDATE
function atualizar($con,$id,$dados){
    $stmt = $con->prepare(
       "UPDATE curtidas SET id_usuario = ?, id_publicacao = ?
        WHERE id_curtida = ?"
    );
    $stmt -> execute([
        $dados["id_usuario"],
        $dados["id_publicacao"],
        $id
    ]);
}
//DELETE
function remover($con,$id){
    $stmt = $con->prepare(
        "DELETE FROM curtidas WHERE id_curtida = ?"
    );
    $stmt -> execute([$id]);
}
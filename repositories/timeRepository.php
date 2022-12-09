<?php
include_once __DIR__ . "/../data/connection.php";

function adicionar_time($time)
{
    $conexao = getConnection();
    $sql = "insert into time (nome, imagem) values (? , ?);";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $time['nome']);
    $sentenca->bindParam(2, $time['imagem']);
    $sentenca->execute();
    $conexao = null;
}

function atualizar_time($time)
{
    $conexao = getConnection();
    $sql = "update time set nome=?, imagem=? where id =?;";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $time['nome']);
    $sentenca->bindParam(2, $time['imagem']);
    $sentenca->bindParam(3, $time['id']);
    $sentenca->execute();
    $conexao = null;
}

function obter_todos_times()
{
    $conexao = getConnection();
    $sql = "select * from time;";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
}

function obter_time_por_id($id)
{
    $conexao = getConnection();
    $sql = "select * from time where id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $time = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $time;
}

function excluir_time($id)
{
    $conexao = getConnection();
    $sql = "delete from time where id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
}


?>
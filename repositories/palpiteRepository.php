<?php
include_once __DIR__ . "/../data/connection.php";

function adicionar_palpite($palpite)
{
    $conexao = getConnection();
    $sql = "insert into palpite (time1_placar, time2_placar, jogo_id, usuario_id) values (?, ?, ?, ?);";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $palpite['time1_placar']);
    $sentenca->bindParam(2, $palpite['time2_placar']);
    $sentenca->bindParam(3, $palpite['jogo_id']);
    $sentenca->bindParam(4, $palpite['usuario_id']);
    $sentenca->execute();
    $conexao = null;
}

function obter_palpites_por_usuario_id($usuario_id)
{
    $conexao = getConnection();
    $sql = "select * from palpite where usuario_id = ?;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $usuario_id);
    $sentenca->execute();
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
}

function obter_todos_palpites()
{
    $conexao = getConnection();
    $sql = "
    select p.id         as palpite_id,
        p.jogo_id       as palpite_jogo_id,
        p.time1_placar  as palpite_time1_placar,
        p.time2_placar  as palpite_time2_placar,
        u.nome_completo as usuario_nome_completo
    from palpite p
        join usuario u on u.id = p.usuario_id;";

    $sentenca = $conexao->prepare($sql);
    $sentenca->execute();
    $dados = $sentenca->fetchAll();
    $conexao = null;

    return $dados;
}

function obter_palpite_por_id($id)
{
    $conexao = getConnection();
    $sql = "select * from palpite where id = ?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $jogo = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $jogo;
}

function atualizar_palpite($palpite)
{
    $conexao = getConnection();
    $sql = "update palpite set time1_placar = ?, time2_placar = ? where id = ?;";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $palpite['time1_placar']);
    $sentenca->bindParam(2, $palpite['time2_placar']);
    $sentenca->bindParam(3, $palpite['id']);
    $sentenca->execute();
    $conexao = null;
}


?>
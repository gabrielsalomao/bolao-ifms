<?php
include_once __DIR__ . "/../data/connection.php";

function adicionar_jogo($jogo)
{
    $conexao = getConnection();
    $sql = "insert into jogo(time1_id, time2_id, data_hora) values(?, ?, ?);";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $jogo['time1_id']);
    $sentenca->bindParam(2, $jogo['time2_id']);
    $sentenca->bindParam(3, $jogo['data_hora']);
    $sentenca->execute();
    $conexao = null;
}

function atualizar_jogo($jogo)
{
    $conexao = getConnection();
    $sql = "update jogo set data_hora=?, time1_id=?, time2_id=?, time1_placar=?, time2_placar=? where id =?;";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $jogo['data_hora']);
    $sentenca->bindParam(2, $jogo['time1_id']);
    $sentenca->bindParam(3, $jogo['time2_id']);
    $sentenca->bindParam(4, $jogo['time1_placar']);
    $sentenca->bindParam(5, $jogo['time2_placar']);
    $sentenca->bindParam(6, $jogo['id']);
    $sentenca->execute();
    $conexao = null;
}

function obter_todos_jogos()
{
    $conexao = getConnection();
    $sql = "
    select 
       j.id,
       j.data_hora,
       t1.nome   as time1_nome,
       t1.imagem as time1_imagem,
       j.time1_placar,
       t2.nome   as time2_nome,
       t2.imagem as time2_imagem,
       j.time2_placar
    from jogo j
            join time t1 on j.time1_id = t1.id
            join time t2 on j.time2_id = t2.id
    order by j.data_hora desc;";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
}

function obter_jogo_por_id($id)
{
    $conexao = getConnection();
    $sql = "
    select 
       j.id,
       j.time1_id,
       j.time2_id,
       j.data_hora,
       t1.nome   as time1_nome,
       t1.imagem as time1_imagem,
       j.time1_placar,
       t2.nome   as time2_nome,
       t2.imagem as time2_imagem,
       j.time2_placar
    from jogo j
            join time t1 on j.time1_id = t1.id
            join time t2 on j.time2_id = t2.id where j.id = ?;
    ";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $jogo = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $jogo;
}

function excluir_jogo($id)
{
    $conexao = getConnection();
    $sql = "delete from jogo where id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
}

?>
<?php
include_once __DIR__ . "/../data/connection.php";

function adicionar_usuario($usuario)
{
    $conexao = getConnection();
    $sql = "insert into usuario(nome_completo, login, senha, admin)
            values (?, ?, ?, ?);";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $usuario['nome_completo']);
    $sentenca->bindParam(2, $usuario['login']);
    $sentenca->bindParam(3, $usuario['senha']);
    $sentenca->bindParam(4, $usuario['admin']);
    $sentenca->execute();
    $conexao = null;
}

function logar($login, $senha)
{
    $conexao = getConnection();
    $sql = "select * from usuario where login = ? and senha = ? limit 1;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $login);
    $sentenca->bindParam(2, $senha);
    $sentenca->execute();
    $usuario = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $usuario;
}

function login_existe($login)
{
    $conexao = getConnection();
    $sql = "select exists(select login from usuario where login = ?) as login_existe;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $login);
    $sentenca->execute();
    $result = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $result['login_existe'] == '1';
}

?>
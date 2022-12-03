<?php
include_once __DIR__ . "/../data/connection.php";

function adicionarUsuario($usuario)
{
    $conexao = getConnection();
    $sql = "insert into usuario(nome_completo, email, senha, admin)
            values (?, ?, ?, ?);";

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $usuario['nomeCompleto']);
    $sentenca->bindParam(2, $usuario['email']);
    $sentenca->bindParam(3, $usuario['senha']);
    $sentenca->bindParam(4, $usuario['admin']);
    $sentenca->execute();
    $conexao = null;
}

function logar($email, $senha)
{
    $conexao = getConnection();
    $sql = "select * from usuario where email = ? and senha = ? limit 1;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $email);
    $sentenca->bindParam(2, $senha);
    $sentenca->execute();
    $usuario = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $usuario;
}

?>
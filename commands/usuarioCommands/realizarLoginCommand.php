<?php
include_once __DIR__ . "/../../repositories/usuarioRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$login = array();
$login['login'] = $_POST['login'];
$login['senha'] = md5($_POST['senha']);

$usuario = logar($login['login'], $login['senha']);

if (!$usuario) {
    $errors = array();
    array_push($errors, 'Usuário ou senha inválidos');

    $_SESSION['errors'] = $errors;

    header("location: /login");
    return;
}

$_SESSION['usuario'] = $usuario;

header("location: /");

?>
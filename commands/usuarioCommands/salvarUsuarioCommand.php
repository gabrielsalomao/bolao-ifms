<?php
include_once __DIR__ . "/../../repositories/usuarioRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$nova_conta_form = array();
$nova_conta_form['nome_completo'] = $_POST['nome_completo'];
$nova_conta_form['login'] = $_POST['login'];
$nova_conta_form['senha'] = md5($_POST['senha']);
$nova_conta_form['admin'] = false;

if (login_existe($nova_conta_form['login'])) {
    array_push($errors, 'Login já cadastrado');
}

if (count($errors) > 0) {
    $_SESSION['nova_conta_form'] = $nova_conta_form;
    $_SESSION['errors'] = $errors;

    header("location:  /nova-conta");
    return;
}

adicionar_usuario($nova_conta_form);

$usuario = logar($nova_conta_form['login'], $nova_conta_form['senha']);

var_dump($usuario);

if (!isset($usuario)) {
    array_push($errors, 'Erro ao realizar login!');
    $_SESSION['errors'] = $errors;
    header("location:  /nova-conta");
} else {
    $_SESSION['usuario'] = $usuario;

    var_dump($_SESSION['usuario']);
    header("location: /");
}
?>
<?php
include_once __DIR__ . "/../../repositories/usuarioRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usuario = array();
$usuario['nomeCompleto'] = $_POST['nomeCompleto'];
$usuario['email'] = $_POST['email'];
$usuario['senha'] = md5($_POST['senha']);
$usuario['admin'] = false;

adicionarUsuario($usuario);

$logarResponse = logar($usuario['email'], $usuario['senha']);

if (empty($usuario)) {
  header("location:  /nova-conta");
} else {
  $_SESSION['usuario'] = $usuario;

  var_dump($_SESSION['usuario']);
  header("location: /");
}
?>
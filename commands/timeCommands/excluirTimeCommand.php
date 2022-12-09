<?php
include_once __DIR__ . "/../../repositories/timeRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$novo_time_form = array();

$novo_time_form['id'] = $_POST['id'];
$novo_time_form['imagem'] = $_POST['imagem'];

unlink(__DIR__ . "/../../uploads/imagens/time/" . $novo_time_form['imagem']);

excluir_time($novo_time_form['id']);

header("location: /times");

?>
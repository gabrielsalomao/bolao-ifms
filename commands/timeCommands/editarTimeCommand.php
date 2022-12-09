<?php
include_once __DIR__ . "/../../repositories/timeRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$novo_time_form = array();

$novo_time_form['id'] = $_POST['id'];
$novo_time_form['nome'] = $_POST['nome'];
$novo_time_form['imagem'] = $_POST['imagem'];

$arquivo = $_FILES['imagem_time_upload'];

if ($arquivo['name'] != "") {

    $arquivo_temporario = $arquivo['tmp_name'];
    $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

    $nomeArquivo = sha1(time()) . "." . $extensao;
    move_uploaded_file($arquivo_temporario, __DIR__ . "/../../uploads/imagens/time/" . $nomeArquivo);

    $novo_time_form['imagem'] = $nomeArquivo;
}

atualizar_time($novo_time_form);

header("location: /times");

?>
<?php
include_once __DIR__ . "/../../repositories/jogoRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$novo_time_form = array();

$novo_time_form['id'] = $_POST['id'];

excluir_jogo($novo_time_form['id']);

header("location: /jogos");

?>
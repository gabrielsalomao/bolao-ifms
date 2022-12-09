<?php
include_once __DIR__ . "/../../repositories/jogoRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$novo_jogo_form = array();

$novo_jogo_form['id'] = $_POST['id'];
$novo_jogo_form['time1_id'] = $_POST['time1_id'];
$novo_jogo_form['time1_placar'] = $_POST['time1_placar'];
$novo_jogo_form['time2_id'] = $_POST['time2_id'];
$novo_jogo_form['time2_placar'] = $_POST['time2_placar'];
$novo_jogo_form['data_hora'] = $_POST['data_hora'];

atualizar_jogo($novo_jogo_form);

header("location: /jogos");
?>
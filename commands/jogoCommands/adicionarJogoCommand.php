<?php
include_once __DIR__ . "/../../repositories/jogoRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$nogo_jogo_form = array();

$nogo_jogo_form['time1_id'] = $_POST['time1_id'];
$nogo_jogo_form['time2_id'] = $_POST['time2_id'];
$nogo_jogo_form['data_hora'] = $_POST['data_hora'];

adicionar_jogo($nogo_jogo_form);

header("location: /jogos");
?>
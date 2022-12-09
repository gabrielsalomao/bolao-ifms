<?php
include_once __DIR__ . "/../../repositories/palpiteRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$palpite_form = array();

$palpite_form['id'] = $_POST['palpite_id'];
$palpite_form['time1_placar'] = $_POST['time1_placar'];
$palpite_form['time2_placar'] = $_POST['time2_placar'];


atualizar_palpite($palpite_form);

header("location: /meus-palpites");
?>
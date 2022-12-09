<?php
include_once __DIR__ . "/../../repositories/palpiteRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

$usuario = $_SESSION['usuario'];
$novo_palpite_form = array();
$novo_palpite_form['time1_placar'] = $_POST['time1_placar'];
$novo_palpite_form['time2_placar'] = $_POST['time2_placar'];
$novo_palpite_form['jogo_id'] = $_POST['jogo_id'];
$novo_palpite_form['usuario_id'] = $usuario['id'];

var_dump($novo_palpite_form);

adicionar_palpite($novo_palpite_form);

header("location: /meus-palpites");
?>
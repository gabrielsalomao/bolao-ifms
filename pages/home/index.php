<?php
include_once __DIR__ . "/../../repositories/jogoRepository.php";
include_once __DIR__ . "/../../repositories/palpiteRepository.php";

$jogos = obter_todos_jogos();

$palpites = obter_todos_palpites();

if (!isset($palpites)) {
    $palpites = array();
}

?>

<style>
    img {
        object-fit: cover;
        object-position: center;
        border-radius: 140px;
        width: 140px;
        height: 140px;
    }

    .time-titulo {
        width: 140px;

    }
</style>

<div class="row g-5 d-flex justify-content-center">
    <div class="col-md-8">
        <h2 class="my-4 text-center">Palpites</h2>
        <?php

        foreach ($jogos as $jogo) {

            $palpites_por_jogo_li = "";

            foreach ($palpites as $palpite) {

                if ($palpite['palpite_jogo_id'] == $jogo['id']) {
                    $palpite_certo =
                        ($palpite['palpite_time1_placar'] == $jogo['time1_placar'] &&
                            $palpite['palpite_time2_placar'] == $jogo['time2_placar'])
                        ? 'list-group-item-success' : '';

                    $palpites_por_jogo_li .= "
                    <li
                        class='{$palpite_certo} list-group-item d-flex justify-content-between align-items-center'
                    >
                        <span>{$palpite['usuario_nome_completo']}</span> <strong>{$palpite['palpite_time1_placar']} x {$palpite['palpite_time2_placar']}</strong>
                    </li>";
                }
            }

            $data_formatada = date_format(date_create($jogo['data_hora']), "m/d H:i");

            echo "
                <div class='card text-center mb-4 shadow-sm'>
                    <div class='card-body'>
                        <span class='text-muted'>{$data_formatada}</span>
                        <div class='d-flex justify-content-evenly align-items-center'>
                            <div class='d-grid gap-2'>
                                <img
                                    id='imagem_time_1'
                                    src='../../uploads/imagens/time/{$jogo['time1_imagem']}'
                                    alt='Imagem do time'
                                >
                                <strong>{$jogo['time1_nome']}</strong>
                            </div>
                            <p class='fs-1 mb-0'>{$jogo['time1_placar']}</p>
                            <i class='bi bi-x-lg fs-4'></i>
                            <p class='fs-1 mb-0'>{$jogo['time2_placar']}</p>
                            <div class='d-grid gap-2'>
                                <img
                                    id='imagem_time_2'
                                    src='../../uploads/imagens/time/{$jogo['time2_imagem']}'
                                    alt='Imagem do time'
                                >
                                <strong>{$jogo['time2_nome']}</strong>
                            </div>
                        </div>
                        <span>Palpites</span>
                        <ul class='list-group list-group-flush my-3 mx-5'>
                            {$palpites_por_jogo_li}
                        </ul>
                    </div>
                </div>";
        }

        ?>
    </div>
</div>
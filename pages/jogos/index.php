<?php
include_once __DIR__ . "/../../repositories/jogoRepository.php";

$jogos = obter_todos_jogos();

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
        <div class="container">
            <h2 class="my-4 text-center">Jogos</h2>
            <div class="col">
                <a
                    class="me-4 py-2 text-primary text-decoration-none"
                    href="/novo-jogo"
                >
                    <strong>
                        Novo jogo
                    </strong>
            </div>
            </a>
        </div>

        <?php

        foreach ($jogos as $jogo) {
            $data_formatada = date_format(date_create($jogo['data_hora']), "m/d H:i");
            echo "
            <div class='card text-center mb-4'>
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
            </div>
        </div>";
        }

        ?>

    </div>
</div>
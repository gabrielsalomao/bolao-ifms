<?php
include_once __DIR__ . "/../../repositories/jogoRepository.php";
include_once __DIR__ . "/../../repositories/palpiteRepository.php";

$jogos = obter_todos_jogos();
$usuario = $_SESSION['usuario'];

$palpites = obter_palpites_por_usuario_id($usuario['id']);

if (!isset($palpites)) {
    $palpites = array();
}

// function findObjectById($jogo_id)
// {  
// $array = array( /* your array of objects with ids as keys */ );

//     foreach ($jogos as $jogo) {
//         $jogo
//     }

//     return false;
// }

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
        <h2 class="my-4 text-center">Meus palpites</h2>
        <?php

        foreach ($jogos as $jogo) {

            $possui_palpite = false;

            foreach ($palpites as $palpite) {

                if ($palpite['jogo_id'] == $jogo['id']) {
                    $jogo_palpite = $palpite;
                    $possui_palpite = true;
                    break;
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
                        <p class='fs-1 mb-0'>" . ($possui_palpite ? $jogo_palpite['time1_placar'] : '?') . "</p>
                        <i class='bi bi-x-lg fs-4'></i>
                        <p class='fs-1 mb-0'>" . ($possui_palpite ? $jogo_palpite['time2_placar'] : '?') . "</p>
                        <div class='d-grid gap-2'>
                            <img
                                id='imagem_time_2'
                                src='../../uploads/imagens/time/{$jogo['time2_imagem']}'
                                alt='Imagem do time'
                            >
                            <strong>{$jogo['time2_nome']}</strong>
                        </div>
                    </div>
                    <div class='d-flex mt-2 gap-2 align-items-center'>
                    " . ($possui_palpite ? "   
                        <a
                            href='/palpites/editar?palpite_id={$jogo_palpite['id']}&jogo_id={$jogo['id']}'
                            class='link-primary fs-5 text-decoration-none'
                        >
                            Editar palpite
                        </a>" :
                       "<a
                            href='/palpitar?jogo_id={$jogo['id']}'
                            class='link-primary fs-5 text-decoration-none'
                        >
                            Palpitar
                        </a>") . "
                    </div>
                </div>
            </div>";
        }

        ?>

    </div>
</div>
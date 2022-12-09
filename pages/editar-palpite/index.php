<?php

include_once __DIR__ . "/../../utils/error.php";
include_once __DIR__ . "/../../repositories/jogoRepository.php";
include_once __DIR__ . "/../../repositories/palpiteRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$jogo_id = $_GET['jogo_id'];
$palpite_id = $_GET['palpite_id'];

$jogo = obter_jogo_por_id($jogo_id);
$palpite = obter_palpite_por_id($palpite_id);

$errors = array();

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
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

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
        margin-top: 10px;
        text-align: center;
        padding: 0px;
        width: 50px;
        height: 50px;
    }
</style>

<div class="row g-5 d-flex justify-content-center">
    <div class="col-md-7">
        <h2 class="my-4 text-center">Editar meu palpite</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="editar-palpite"
            method="post"
            enctype="multipart/form-data"
        >
            <input
                type="text"
                class="form-control"
                id="jogo_id"
                name="jogo_id"
                placeholder=""
                required
                hidden
                value="<?php echo $jogo_id; ?>"
            />
            <input
                type="text"
                class="form-control"
                id="palpite_id"
                name="palpite_id"
                placeholder=""
                required
                hidden
                value="<?php echo $palpite_id; ?>"
            />
            <div class="row g-3">
                <div class="d-flex justify-content-between gap-2 align-items-center">
                    <div class='d-flex flex-column gap-2 justify-content-center align-items-center'>
                        <img
                            id="imagem_time_1"
                            alt="Imagem do time"
                            src="../../uploads/imagens/time/<?php echo $jogo['time1_imagem']; ?>"
                        />
                        <strong>
                            <?php echo $jogo['time1_nome']; ?>
                        </strong>
                    </div>
                    <div class="col-md-1">
                        <input
                            onkeypress='validate(event)'
                            required
                            id="time1_placar"
                            name="time1_placar"
                            type="number"
                            class="form-control form-control-lg"
                            value="<?php echo $palpite['time1_placar']; ?>"
                        />
                    </div>
                    <i class="bi bi-x-lg fs-1"></i>
                    <div class="col-md-1">
                        <input
                            onkeypress='validate(event)'
                            required
                            id="time2_placar"
                            name="time2_placar"
                            type="number"
                            class="form-control form-control-lg"
                            value="<?php echo $palpite['time2_placar']; ?>"
                        />
                    </div>
                    <div class='d-flex flex-column gap-2 justify-content-center align-items-center'>
                        <img
                            id="imagem_time_2"
                            src="../../uploads/imagens/time/<?php echo $jogo['time2_imagem']; ?>"
                            alt="Imagem do time"
                        />
                        <strong>
                            <?php echo $jogo['time2_nome']; ?>
                        </strong>
                    </div>
                </div>
            </div>
            <button
                class="my-4 w-100 btn btn-primary"
                type="submit"
            >
                Salvar
            </button>
        </form>
    </div>
</div>

<script>
    // Previne valores negativos
    function validate(e) {
        var ev = e || window.event;
        var key = ev.keyCode || ev.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]/;
        if (!regex.test(key)) {
            ev.returnValue = false;
            if (ev.preventDefault) ev.preventDefault();
        }
    }
</script>
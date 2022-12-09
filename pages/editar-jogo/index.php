<?php

include_once __DIR__ . "/../../utils/error.php";
include_once __DIR__ . "/../../repositories/timeRepository.php";
include_once __DIR__ . "/../../repositories/jogoRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];

$times = obter_todos_times();
$jogo = obter_jogo_por_id($id);

$times1Options = '';
$times2Options = '';

foreach ($times as $time) {
    $selected1 = $time['id'] == $jogo['time1_id'] ? 'selected' : '';

    $times1Options .= "<option {$selected1} value='{$time['id']}'>{$time['nome']}</option>";

    $selected2 = $time['id'] == $jogo['time2_id'] ? 'selected' : '';

    $times2Options .= "<option {$selected2} value='{$time['id']}'>{$time['nome']}</option>";
}

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
        <h2 class="my-4 text-center">Editar jogo</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="editar-jogo"
            method="post"
            enctype="multipart/form-data"
        >
            <input
                type="text"
                class="form-control"
                id="id"
                name="id"
                placeholder=""
                required
                hidden
                value="<?php echo $jogo['id'] ?>"
            >
            <div class="row g-3">
                <div class="d-flex justify-content-between gap-2 align-items-center">
                    <img
                        id="imagem_time_1"
                        alt="Imagem do time"
                        src="../../uploads/imagens/time/<?php echo $jogo['time1_imagem']; ?>"
                    />
                    <div class="col-md-1">
                        <input
                            onkeypress='validate(event)'
                            required
                            id="time1_placar"
                            name="time1_placar"
                            value="<?php echo $jogo['time1_placar']; ?>"
                            type="number"
                            class="form-control form-control-lg"
                        />
                    </div>
                    <i class="bi bi-x-lg fs-1"></i>
                    <div class="col-md-1">
                        <input
                            onkeypress='validate(event)'
                            required
                            id="time2_placar"
                            name="time2_placar"
                            value="<?php echo $jogo['time2_placar']; ?>"
                            type="number"
                            class="form-control form-control-lg"
                        />
                    </div> <img
                        id="imagem_time_2"
                        src="../../uploads/imagens/time/<?php echo $jogo['time2_imagem']; ?>"
                        alt="Imagem do time"
                    />
                </div>
                <div class="col-sm-6">
                    <label
                        for="nome"
                        class="form-label"
                    >
                        Time 1
                    </label>
                    <select
                        required
                        id="time1"
                        name="time1_id"
                        class="form-select"
                        onchange="onTimeChange(event,1)"
                    >
                        <option value="">
                            Selecione
                        </option>
                        <?php echo $times1Options; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label
                        for="nome"
                        class="form-label"
                    >
                        Time 2
                    </label>
                    <select
                        required
                        id="time2"
                        name="time2_id"
                        onchange="onTimeChange(event,2)"
                        class="form-select"
                    >
                        <option value="">
                            Selecione
                        </option>
                        <?php echo $times2Options; ?>
                    </select>
                </div>
                <div class="col-sm-12">
                    <label
                        for="nome"
                        class="form-label"
                    >
                        Data e horário
                    </label>
                    <input
                        id="data_hora"
                        name="data_hora"
                        name="time2"
                        type="datetime-local"
                        value="<?php echo $jogo['data_hora']; ?>"
                        required
                        class="form-control"
                    >
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
    const times = <?php echo json_encode($times); ?>;

    function onTimeChange(event, time_imagem_id) {
        const imagem_time_el = document.getElementById('imagem_time_' + time_imagem_id);
        const time = times.find(t => t.id == event.target.value);

        if (!time) {
            imagem_time_el.src = '../../assets/images/blank.png';
            return;
        }

        imagem_time_el.src = '../../uploads/imagens/time/' + time.imagem;
    }

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
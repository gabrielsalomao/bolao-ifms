<?php

include_once __DIR__ . "/../../utils/error.php";
include_once __DIR__ . "/../../repositories/timeRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$times = obter_todos_times();

$timesOptions = '';

foreach ($times as $time) {
    $timesOptions .= "<option value='{$time['id']}'>{$time['nome']}</option>";
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
</style>

<div class="row g-5 d-flex justify-content-center">
    <div class="col-md-7">
        <h2 class="my-4 text-center">Novo Jogo</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="novo-jogo"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
                <div class="d-flex justify-content-between gap-2 align-items-center">
                    <img
                        id="imagem_time_1"
                        alt="Imagem do time"
                        src="../../assets/images/blank.png"
                    >
                    <i class="bi bi-x-lg fs-1"></i>
                    <img
                        id="imagem_time_2"
                        src="../../assets/images/blank.png"
                        alt="Imagem do time"
                    >
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
                        <option
                            selected
                            value=""
                        >
                            Selecione
                        </option>
                        <?php echo $timesOptions; ?>
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
                        <option
                            selected
                            value=""
                        >
                            Selecione
                        </option>
                        <?php echo $timesOptions; ?>
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
            imagem_time_el.src = '../../assets/images/blank.png'
            return;
        }

        imagem_time_el.src = '../../uploads/imagens/time/' + time.imagem

    }

</script>
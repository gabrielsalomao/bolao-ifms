<?php

include_once __DIR__ . "/../../utils/error.php";
include_once __DIR__ . "/../../repositories/jogoRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
$jogo = obter_jogo_por_id($id);

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
        border-radius: 150px;
        width: 150px;
        height: 150px;
    }
</style>

<div class="row g-5 d-flex justify-content-center">
    <div class="col-md-7">
        <h2 class="my-4 text-center">Excluir jogo</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="excluir-jogo"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
                <div class="d-flex justify-content-between gap-2 align-items-center">
                    <img
                        id="imagem_time_1"
                        alt="Imagem do time"
                        src="../../uploads/imagens/time/<?php echo $jogo['time1_imagem']; ?>"
                    />
                    <p class='fs-1 mb-0'>
                        <?php echo $jogo['time1_placar'] ?>
                    </p>
                    <i class="bi bi-x-lg fs-1"></i>
                    <p class='fs-1 mb-0'>
                        <?php echo $jogo['time2_placar'] ?>
                    </p>
                    <img
                        id="imagem_time_2"
                        src="../../uploads/imagens/time/<?php echo $jogo['time2_imagem']; ?>"
                        alt="Imagem do time"
                    />
                </div>
                <div class="col-sm-12 d-flex justify-content-center">
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
                    <h5 class="text-center text-muted">
                        <?php
                        $data_formatada = date_format(date_create($jogo['data_hora']), "m/d H:i");

                        echo $data_formatada;
                        ?>
                    </h3>
                </div>
                <p class="mb-4 text-center">Deseja realmente excluir esse jogo?</p>
            </div>
            <button
                class="my-4 w-100 btn btn-danger"
                type="submit"
            >
                Excluir
            </button>
        </form>
    </div>
</div>
<?php

include_once __DIR__ . "/../../utils/error.php";
include_once __DIR__ . "/../../repositories/timeRepository.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
$time = obter_time_por_id($id);

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
        <h2 class="my-4 text-center">Excluir time</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="excluir-time"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
                <div class="d-flex justify-content-center">
                    <img
                        src="../../uploads/imagens/time/<?php echo $time['imagem'] ?>"
                        id="imagem_time"
                        alt="Imagem do time"
                    >
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
                        value="<?php echo $time['id'] ?>"
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="imagem"
                        name="imagem"
                        placeholder=""
                        required
                        hidden
                        value="<?php echo $time['imagem'] ?>"
                    >
                    <h4 class="my-4 text-center">
                        <?php echo $time['nome'] ?>
                        </h3>
                </div>
                <p class="mb-4 text-center">Deseja realmente excluir esse time?</p>
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
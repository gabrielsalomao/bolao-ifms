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
        <h2 class="my-4 text-center">Editar time</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="editar-time"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
                <div class=" d-flex justify-content-center">
                    <img
                        src="../../uploads/imagens/time/<?php echo $time['imagem'] ?>"
                        id="imagem_time"
                        alt="Imagem do time"
                    >
                </div>
                <div class="col-sm-12">
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
                    <label
                        for="nome"
                        class="form-label"
                    >
                        Nome
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="nome"
                        name="nome"
                        placeholder=""
                        required
                        value="<?php echo $time['nome'] ?>"
                    >
                </div>
                <div class="col-sm-12">
                    <label
                        for="nome"
                        class="form-label"
                    >
                        Imagem
                    </label>
                    <input
                        class="form-control"
                        type="file"
                        id="imagem_time_upload"
                        name="imagem_time_upload"
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
    const imagem_time_upload_el = document.querySelector("#imagem_time_upload");

    imagem_time_upload_el.addEventListener("change", function () {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            const imagem_time_el = document.getElementById("imagem_time");

            imagem_time_el.src = uploaded_image;
            imagem_time_el.removeAttribute('hidden')
        });
        reader.readAsDataURL(this.files[0]);
    });
</script>
<?php

include_once __DIR__ . "/../../utils/error.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        <h2 class="my-4 text-center">Novo time</h2>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="novo-time"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
                <div class=" d-flex justify-content-center">
                    <img
                        hidden
                        id="imagem_time"
                        alt="Imagem do time"
                    >
                </div>
                <div class="col-sm-12">
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
                        required
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
<?php

include_once __DIR__ . "/../../utils/error.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o formulário é reenvio e preenche 
// com os valores da requisição
if (isset($_SESSION['nova_conta_form'])) {
    $nova_conta_form = $_SESSION['nova_conta_form'];
    unset($_SESSION['nova_conta_form']);
}

// Garante que os valores do formulário sejam preenchidos
if (!isset($nova_conta_form)) {
    $nova_conta_form = array();
    $nova_conta_form['nome_completo'] = "";
    $nova_conta_form['login'] = "";
    $nova_conta_form['senha'] = "";
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
        border-radius: 150px;
        width: 150px;
        height: 150px;
    }
</style>

<div class="row g-5">
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Novo time</h4>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form class="needs-validation" action="nova-conta" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-sm-12">
                    <img src="https://countryflagsapi.com/png/brazil" id="imagem_time" alt="...">
                </div>
                <div class="col-sm-12">
                    <label for="nome" class="form-label">
                        Nome
                    </label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nova_conta_form['nome_completo']; ?>" required>
                </div>
                <div class="col-sm-12">
                    <label for="nome" class="form-label">
                        Imagem
                    </label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <button class="my-4 w-100 btn btn-primary btn-lg" type="submit">
                Salvar
            </button>
        </form>
    </div>
</div>

<script>
</script>
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

<div class="row g-5">
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Novo time</h4>
        <?php
        if (count($errors) > 0) {
            echo renderErrors($errors);
        }
        ?>
        <form
            class="needs-validation"
            action="nova-conta"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
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
                        value="<?php echo $nova_conta_form['nome_completo']; ?>"
                        required
                    >
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label
                        for="login"
                        class="form-label"
                    >
                        Login
                    </label>
                    <input
                        type="login"
                        class="form-control"
                        id="login"
                        name="login"
                        value="<?php echo $nova_conta_form['login']; ?>"
                    >
                </div>
                <div class="col-sm-12">
                    <label
                        for="senha"
                        class="form-label"
                    >
                        Senha
                    </label>
                    <input
                        minlength="4"
                        type="text"
                        class="form-control"
                        id="senha"
                        name="senha"
                        placeholder=""
                        value=""
                        required
                    >
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>

            <button
                class="my-4 w-100 btn btn-primary btn-lg"
                type="submit"
            >
                Cadastrar
            </button>
        </form>
    </div>
</div>

<script>
</script>
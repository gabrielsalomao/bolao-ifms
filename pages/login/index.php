<?php
include_once __DIR__ . "/../../utils/error.php";

$errors = array();

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<style>
    .form-signin {
        align-items: center;
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<div class="form-signin">
    <?php
    if (count($errors) > 0) {
        echo renderErrors($errors);
    }
    ?>
    <form
        class="needs-validation"
        action="login"
        method="post"
        enctype="multipart/form-data"
    >
        <h1 class="h3 mb-3 fw-normal">Login</h1>
        <div class="form-floating">
            <input
                type="text"
                class="form-control"
                id="login"
                name="login"
                placeholder="example"
            >
            <label for="login">Login</label>
        </div>
        <div class="form-floating">
            <input
                type="password"
                class="form-control"
                required
                id="senha"
                name="senha"
                placeholder="Password"
            >
            <label for="floatingPassword">Senha</label>
        </div>
        <button
            class="w-100 btn btn-lg btn-primary"
            type="submit"
        >
            Entrar
        </button>
    </form>
</div>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($usuario)) {
    $usuario = array();
    $usuario['nomeCompleto'] = "";
    $usuario['email'] = "";
    $usuario['senha'] = "";
}
?>


<div class="row g-5">
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Nova conta</h4>
        <form
            class="needs-validation"
            novalidate
            action="nova-conta"
            method="post"
            enctype="multipart/form-data"
        >
            <div class="row g-3">
                <div class="col-sm-12">
                    <label
                        for="nomeCompleto"
                        class="form-label"
                    >
                        Nome completo
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="nomeCompleto"
                        name="nomeCompleto"
                        placeholder=""
                        value=""
                        required
                    >
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label
                        for="email"
                        class="form-label"
                    >E-Mail</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                    >
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <div class="col-sm-12">
                    <label
                        for="senha"
                        class="form-label"
                    >
                        Senha
                    </label>
                    <input
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
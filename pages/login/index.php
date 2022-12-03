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

    .form-signin input[type="email"] {
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
    <form>
        <h1 class="h3 mb-3 fw-normal">Login</h1>
        <div class="form-floating">
            <input
                type="email"
                class="form-control"
                id="email"
                id="email"
                placeholder="name@example.com"
            >
            <label for="email">E-Mail</label>
        </div>
        <div class="form-floating">
            <input
                type="password"
                class="form-control"
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
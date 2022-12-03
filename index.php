<?php
session_start();

$logado = false;

if (count($_SESSION) != 0) {
    $usuario = $_SESSION['usuario'];
    $logado = $usuario != null;
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>Bolão IFMS</title>

    <!-- CSS only -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    >

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link
        href="./style.css"
        rel="stylesheet"
    >
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a
                    href="/"
                    class="d-flex align-items-center text-dark text-decoration-none"
                >
                    <span class="fs-4">
                        Bolão
                        <span class="text-success">IFMS</span>
                    </span>
                </a>


                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <?php

                    if ($logado) {

                        echo '
                         <a
                            class="me-4 py-2 text-dark text-decoration-none"
                            href="/sair"
                        >
                            Meus Palpites
                        </a>
                        <a
                            class="me-4 py-2 text-danger text-decoration-none"
                            href="/sair"
                        >
                            Sair
                        </a>';
                    } else {
                        echo '
                        <a
                            class="me-4 py-2 text-dark text-decoration-none"
                            href="/login"
                        >
                            Login
                        </a>
                        <a
                            class="btn btn-primary"
                            href="/nova-conta"
                            role="button"
                        >
                            Nova conta
                        </a>';
                    }
                    ?>

                </nav>
            </div>
        </header>

        <main>
            <?php

            $request = $_SERVER['REQUEST_URI'];
            $method = $_SERVER['REQUEST_METHOD'];

            switch ($request) {
                case '/':
                    require __DIR__ . '/pages/home/index.php';
                    break;
                case '/login':
                    if ($method == 'GET') {
                        require __DIR__ . '/pages/login/index.php';
                        break;
                    }
                case '/nova-conta':
                    if ($method == 'GET') {
                        require __DIR__ . '/pages/nova-conta/index.php';
                        break;
                    }

                    if ($method == 'POST') {
                        require __DIR__ . '/commands/usuarioCommands/salvarUsuarioCommand.php';
                        break;
                    }
                case '/sair':
                    if ($method == 'GET') {
                        session_start();
                        session_destroy();
                        header("location: /");
                        break;
                    }
                default:
                    http_response_code(404);
                    require __DIR__ . '/pages/nada-encontrado/index.php';
                    break;
            }

            ?>
        </main>

    </div>


    <!-- JavaScript Bundle with Popper -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"
    ></script>
</body>

</html>
<?php
include_once __DIR__ . "/../../repositories/timeRepository.php";

$times = obter_todos_times();
?>

<style>
    img {
        object-fit: cover;
        object-position: center;
    }
</style>



<div class="album">
    <div class="container">
        <h2 class="my-4 text-center">Times</h2>
        <div class="col">
            <a
                class="me-4 py-2 text-primary text-decoration-none"
                href="/novo-time"
            >
                <strong>
                    Novo time
                </strong>
        </div>
        </a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            foreach ($times as $time) {
                echo '     
                <div class="col">
                    <div class="card shadow-sm">
                        <img
                            class="bd-placeholder-img card-img-top"
                            alt="Imagem time"
                            width="100%"
                            height="225"
                            src="../../uploads/imagens/time/' . $time['imagem'] . '"
                        >

                        <div class="card-body d-flex justify-content-between align-items-center">
                            <strong class="card-text">
                                ' . $time['nome'] . '
                            </strong>
                            <div class="d-flex justify-content-between gap-2 align-items-center">
                                <a
                                    href="/times/editar?id=' . $time['id'] . '"
                                    class="link-primary fs-5"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a
                                    href="/times/excluir?id=' . $time['id'] . '"
                                    class="link-danger fs-5"
                                >
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</div>
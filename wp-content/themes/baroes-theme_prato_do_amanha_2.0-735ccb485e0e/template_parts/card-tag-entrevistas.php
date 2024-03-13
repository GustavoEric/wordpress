<?php
    $foto_entrevista = get_field('img_perfil_entrevista');
    $nome = get_field('nome_pessoa_entrevista');
    $cargo_ocupacao = get_field('cargo_ocupacao');
?>
<!-- card menor -->
<div class="col-md-6 mb-3">
    <div class="card entrevistas mb-4 mb-md-5">
        <div class="card__entrevistas mb-3">
            <div class="row">
                <div class="col-6 col-md-6">
                    <div class="card__thumb">
                        <img src="<?= $foto_entrevista; ?>">
                    </div>
                </div>
                <div class="col-6 col-md-6 d-flex">
                    <div class="card__content">
                        <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="author-section">
            <div class="name"><?= $nome ?></div>
            <div class="role"><?= $cargo_ocupacao ?></div>
        </div>
    </div>
</div>
<?php
    $especiais = get_field('especiais', 'option');
?>

<section class="especiais mb-3 mb-md-5 pb-4">
    <?php if(is_front_page()) { ?>
        <div class="d-flex flex-wrap align-items-center mb-3 mb-md-4">
            <h2 class="title m-0">Especiais</h2>
            <h3 class="ms-md-3 mb-0 mt-1 mt-md-0">Confira notícias, artigos e entrevistas agrupados por assunto</h3>
        </div>
    <?php } else { ?>
        <h2 class="title mb-4">Especiais</h2>
    <?php } ?>

    <div class="cards-especiais">
        <a href="<?= $especiais[0]['link_pagina'] ?>" class="d-flex especial first">
            <p><?= $especiais[0]['texto_especiais'] ?></p>
            <div class="arrow">
            </div>
        </a>
        <a href="<?= $especiais[1]['link_pagina'] ?>" class="d-flex especial second">
            <p><?= $especiais[1]['texto_especiais'] ?></p>
            <div class="arrow">
            </div>
        </a>
        <a href="<?= $especiais[2]['link_pagina'] ?>" class="d-flex especial third">
            <p><?= $especiais[2]['texto_especiais'] ?></p>
            <div class="arrow">
            </div>
        </a>
        <a href="<?= $especiais[3]['link_pagina'] ?>" class="d-flex especial fourth">
            <p><?= $especiais[3]['texto_especiais'] ?></p>
            <div class="arrow">
            </div>
        </a>
    </div>
</section>
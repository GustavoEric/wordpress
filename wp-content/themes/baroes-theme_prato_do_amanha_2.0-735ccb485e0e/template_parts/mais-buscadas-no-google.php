<?php
    $mais_buscadas_select = get_field('mais_buscadas_select', 'option');
    $i = 1;
    // var_dump($mais_buscadas_select)
?>

<div class="mais-buscadas">
    <h2 class="title">Mais buscadas no Google</h2>

    <?php if ($mais_buscadas_select) : ?>
        <?php foreach ($mais_buscadas_select as $post) : setup_postdata($post); ?>
            <a href="<?= the_permalink(); ?>" class="w-100">
                <div class="post-title <?php if($i == 1) {echo '';} elseif($i == 2) {echo 'white bg-orange';} elseif($i == 3) {echo 'white bg-musgo';} ?>">
                    <?= the_title(); ?>
                </div>
            </a>
        <?php $i++; endforeach; ?>
    <?php endif; ?>
</div>
<?php if (is_category()) { ?>

    <div class="newsletter-banner category px-0 my-5">
        <div class="col-md-12">
            <div class="newsletter-txt-content">
                <p>Gostou do nosso conteúdo?</p>
                <span>Receba a nossa newsletter quinzenal gratuitamente e continue acompanhando nossas novidades.</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="newsletter-form-wrapper">
                <form action="https://gmail.us14.list-manage.com/subscribe/post?u=225df3c157f292e48d9577e71&amp;id=36f00b84c3" class="form-inline" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                onsubmit="">
                    <div class="form-group">
                        <div class="d-flex align-items-center grupo-form">
                            <label for="newsletter-email" class="">
                            </label>
                            <input type="text" name="EMAIL" class="form-control" id="newsletter-email" placeholder="Coloque seu melhor e-mail aqui" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Quero me cadastrar</button>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="" required>
                        <label class="form-check-label px-0" for="newsletter-checkbox">
                            Concordo com a política de privacidade e aceito receber informações sobre produtos e serviços da Marfrig.
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } elseif (is_front_page()) { ?>
    
    <div class="newsletter-banner category homepage px-0">
        <div class="col-md-12">
            <div class="newsletter-txt-content">
                <p>Gostou do nosso conteúdo?</p>
                <span>Receba a nossa newsletter quinzenal gratuitamente e continue acompanhando nossas novidades.</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="newsletter-form-wrapper">
                <form action="https://gmail.us14.list-manage.com/subscribe/post?u=225df3c157f292e48d9577e71&amp;id=36f00b84c3" class="form-inline" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                onsubmit="">
                    <div class="form-group">
                        <div class="d-flex align-items-center grupo-form">
                            <label for="newsletter-email" class="">
                            </label>
                            <input type="text" name="EMAIL" class="form-control" id="newsletter-email" placeholder="Coloque seu melhor e-mail aqui" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Quero me cadastrar</button>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="" required>
                        <label class="form-check-label px-0" for="newsletter-checkbox">
                            Concordo com a política de privacidade e aceito receber informações sobre produtos e serviços da Marfrig.
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 d-none d-md-block">
            <div class="custom-post-newsletter">
                <h2>Últimas edições</h2>

                <?php
                    $args = array(
                        'posts_per_page' => 5,
                        'orderby' =>'post_date',
                        'order' => 'DESC',
                        'post_type' => 'newsletter',
                        'post__not_in' => $exclude_ids,
                    );
                ?>

                    <?php $query = new WP_Query($args);
                        if ($query->have_posts()):
                    ?>
                        <?php while ( $query->have_posts() ) {
                            $query->the_post();
                            $exclude_ids[] = $post->ID;
                        ?>
                            <?php 
                                $title_news = get_field('titulo_newsletter');
                                $data_news = get_field('data_newsletter');
                                $url_news = get_field('url_newsletter');
                            ?>

                            <div class="news-information">
                                <div class="news-date"><a href="<?= $url_news; ?>"><?= $data_news; ?></a></div>
                                <div class="news-title"><a href="<?= $url_news; ?>"><?= $title_news; ?></a></div>
                            </div>

                        <?php } ?>
                    <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>

<?php } else { ?>

    <div class="newsletter-banner px-0">
        <div class="col-md-5 shadow-news">
            <div class="newsletter-txt-content">
                <p>Gostou do nosso conteúdo?</p>
                <span>Receba a nossa newsletter quinzenal gratuitamente e continue acompanhando nossas novidades.</span>
            </div>
        </div>
        <div class="col-md-7">
            <div class="newsletter-form-wrapper">
                <form action="https://gmail.us14.list-manage.com/subscribe/post?u=225df3c157f292e48d9577e71&amp;id=36f00b84c3" class="form-inline" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                onsubmit="">
                    <div class="form-group">
                        <div class="d-flex align-items-center grupo-form">
                            <label for="newsletter-email" class="">
                            </label>
                            <input type="text" name="EMAIL" class="form-control" id="newsletter-email" placeholder="Coloque seu melhor e-mail aqui" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Quero me cadastrar</button>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="" required>
                        <label class="form-check-label px-0" for="newsletter-checkbox">
                            Concordo com a política de privacidade e aceito receber informações sobre produtos e serviços da Marfrig.
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>
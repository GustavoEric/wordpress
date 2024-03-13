<?php $post_id = get_the_ID(); ?>
<?php $img_url = get_the_post_thumbnail_url($post_id, 'web-stories-poster-portrait'); ?>
<?php $exclude_ids[] = $post_id; ?>

<div class="web-stories-list__story mb-4">
    <div class="web-stories-list__story-poster">
        <a href="<?php the_permalink();?>" target="_blank" >
            <img src="<?= $img_url  ?>" alt="<?php the_title();?>" width="185" height="308">
        </a>
    </div>
                                
    <div class="web-stories-list__story-content-overlay">
        <div class="story-content-overlay__title">
            <?php the_title();?>
        </div>
    </div>
</div>
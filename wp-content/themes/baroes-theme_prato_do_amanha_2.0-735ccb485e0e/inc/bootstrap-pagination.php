<?php

function bootstrap_pagination($echo = true)
{
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(
        array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type'  => 'array',
            'prev_next'   => true,
            'prev_text'    => __('<span aria-hidden="true">&laquo;</span>'),
            'next_text'    => __('<span aria-hidden="true">&raquo;</span>'),
        )
    );

    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');

        $pagination = '<ul class="pagination">';

        foreach ($pages as $page) {
            // $page_link = str_replace('page-numbers', 'page-link', $page);
            preg_match(
                '/(class="((.*?\s)?page-numbers(\s.*?)?)")/',
                $page,
                $page_numbers
            );

            $replace_class = str_replace('page-numbers', 'page-link', $page_numbers[0]);

            preg_match(
                '/aria-current/',
                $page,
                $is_current
            );

            $current_class = empty($is_current) ? '' : ' active';

            $page_link = str_replace($page_numbers[0], $replace_class, $page);

            $pagination .= "<li class=\"page-item{$current_class}\">$page_link</li>";
        }

        $pagination .= '</ul>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }
}
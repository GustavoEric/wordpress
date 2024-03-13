<?php
function getPostCategory($postId) {
  $tempCategories = get_the_category($postId);
  $auxCategories = false;

  if (!empty($tempCategories)) {
    $auxCategories = $tempCategories;
  }

  if (!$auxCategories) {
    return false;
  }

  return (object) [
    'url' => esc_url(get_category_link($auxCategories[0]->term_id)),
    'slug' => $auxCategories[0]->slug,
    'name' => esc_html($auxCategories[0]->name),
  ];
}

// $printedPostIds = [];
$GLOBALS['b_ignored_posts'] = [];
function b_ignored_posts($type = 'array') {
  // global $printedPostIds;
  // return $printedPostIds;
  if ($type == 'string') {
      return join(',', $GLOBALS['b_ignored_posts']);
  }

  return $GLOBALS['b_ignored_posts'];
}

function b_add_ignore_post($post) {
  // global $printedPostIds;

  $postId = 0;
  if (is_null($post)) {
    $postId = get_the_ID();
  } else if (is_object($post)) {
    $postId = $post->ID;
  } else {
    $postId = $post;
  }

  // $printedPostIds[] = $postId;
  $GLOBALS['b_ignored_posts'][] = $postId;
}

function getTodayDate() {
  $format = get_option('date_format');
  $date = wp_date($format);

  return apply_filters( 'get_the_date', $date, false, false );
}

function b_query_posts($perPage = 1, $extendedParams = []) {
  $queryPosts = get_posts(
    array_merge([
      'posts_per_page' => $perPage,
      'post__not_in' => b_ignored_posts(),
    ], $extendedParams)
  );

  return $queryPosts;
}

function b_create_page($pageTitle, $args = []) {
  if (get_page_by_title($pageTitle) !== NULL)
    return false;

  $createPageArgs = array_merge([
    'post_title' => $pageTitle,
    'post_type'     => 'page',
    'post_name'     => $pageName
  ], $args);

  wp_insert_post($createPageArgs);
}
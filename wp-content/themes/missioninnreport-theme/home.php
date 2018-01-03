<?php
$context = Timber::get_context();
$args = array(
// Get post type
    'post_type' => 'special-offer',
    'post_status' => 'publish',
// Get all posts
    'posts_per_page' => -1,
// Order by post date
    'meta_key' => 'wpcf-sort-order',
    'orderby'  => 'meta_value',
    'order'=>'ASC'
);
$context['special_offers'] = Timber::get_posts($args);
Timber::render( 'home.twig', $context );

?>
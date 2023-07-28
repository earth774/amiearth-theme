<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts = new WP_Query(array(
    's'              => get_search_query(),
    'paged' => $paged,
    'orderby'       => 'date',
    'order'         => 'DESC'
));
get_template_part('views/posts');

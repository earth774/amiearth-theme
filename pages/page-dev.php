<?php get_header() ?>
<?php
/* Template Name: Dev Template */

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts = new WP_Query(array(
    'category_name' => 'Dev',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby'       => 'date',
    'order'         => 'DESC'
));

get_template_part('views/posts');

?>

<?php get_footer() ?>
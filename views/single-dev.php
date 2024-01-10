<?php
get_header();
$related = new WP_Query(array(
    'category_name' => 'Dev',
    'posts_per_page' => 4,
    'orderby'       => 'rand',
    'post__not_in'   => array(get_the_ID())
));
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="single-content-block">
            <h1 class="single-content-title color-info text-3xl text-center mt-9"><?php the_title() ?></h1>
            <p class="single-content-subtitle text-center ">
                <span><?= get_the_author() ?></span>
                <span>•</span>
                <span>
                    <?php $categories = get_the_category(); ?>
                    <a class="color-info" href="/dev">
                        <?= "#{$categories[0]->name}" ?>
                    </a>
                </span>
                <span>•</span>
                <span><?= get_the_time('H:i') ?>, <?= get_the_date('d/m/Y') ?></span>
            </p>

            <div class="single-content-image mt-9">
                <img class="mx-auto" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
            </div>
            <!-- discription -->
            <div class="col-md-7 col-xl-6">
                <article class="single-main-content page-content mx-auto mt-9">
                    <p><?php the_content() ?> </p>
                </article>
            </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<section class="single-content-block">
    <article class="comment mx-auto mt-9">
        <?php
            comments_template();
        ?>
    </article>
</section>

<?php get_footer(); ?>
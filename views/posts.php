<?php get_header() ?>

<!-- Blog -->
<section class="posts-block mx-auto mt-8">
    <?php if ($posts->have_posts()) : ?>
        <div class="cards grid justify-items-center grid-cols-1 gap-1 md:grid-cols-2 md:gap-2 lg:grid-cols-3 lg:gap-3 ">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <div class="card">
                    <?php $categories = get_the_category(); ?>
                    <a class="color-info" href="<?php
                                                if ($categories[0]->name == 'Dev') {
                                                    echo '/dev';
                                                } elseif ($categories[0]->name == 'Life') {
                                                    echo '/life';
                                                } elseif ($categories[0]->name == 'Books') {
                                                    echo '/books';
                                                }
                                                ?>">
                        <?= "#{$categories[0]->name}" ?>
                    </a>


                    <a href="<?php the_permalink(); ?>" class="large-image" title="<?php the_title() ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
                        <h1 class="posts-content-title color-info text-base text-center mt-4"><?php the_title() ?></h1>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

        <?php if ($posts->max_num_pages > 1) : ?>
            <div class="pagination flex justify-between w-96 mx-auto mt-9">
                <div class="pagination-previous color-info text-2xl">
                    <?php previous_posts_link('< Previous', $posts->max_num_pages); ?>
                </div>

                <div class="pagination-next color-info  text-2xl">
                    <?php next_posts_link('Next >', $posts->max_num_pages); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php get_footer() ?>
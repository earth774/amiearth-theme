<?php 

function wp_theme_setup() {
	/**
	 * Load translation identity
	 * add default WordPress support for title, feed and enable post thumbnail in post/page.
	 */
	load_theme_textdomain( 'wp-theme-prototype' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	/**
	 * un comment these lines if you want to register your own image size
	 * it's effect when uploading new image.
	 */
	// add_image_size( 'wp-theme-prototype-1024', 1024, 768, true );
	// add_image_size( 'wp-theme-prototype-600', 600, 300, true );

	/**
	 * Register menu 
	 * It will show up in Appearance > Menus
	 */
	register_nav_menus(array(
		'top'    => __('Top Navigation', 'wp-theme-prototype'),
		'about' => __('About', 'wp-theme-prototype'),
		'story' => __('Story', 'wp-theme-prototype'),
		'sitemap' => __('Sitemap', 'wp-theme-prototype'),
		'footer' => __('Footer Menu', 'wp-theme-prototype'),
		'mobile_menu' => __('Mobile Navigation', 'wp-theme-prototype'),
	));
	
	/**
	 * Enable html5 power for comment, gallery and caption element.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'wp_theme_setup' );

function wp_theme_register_script()
{
	/**
	 * Enqueue stylesheet that generated from gulp
	 * first is vendor, second is your style.css
	 */
	wp_enqueue_style('wp-vendor', get_theme_file_uri('css/vendor/vendor.css'), array(), '1.0.0');
	wp_enqueue_style('wp-style', get_stylesheet_uri(), array(), '1.0.0');
	wp_enqueue_style('prism-css', 'https://cdn.jsdelivr.net/npm/prismjs@1.28.0/themes/prism-okaidia.min.css', array(), '1.28.0');
	/**
	 * Register js script file(js/client.js) 
	 * dependency on jQuery, and place this before close body tag
	 */
	wp_register_script('wp-vendor', get_theme_file_uri('/js/vendor/vendor.js'), array('jquery'), '1.0.0', true);
	// wp_register_script('wp-client', get_theme_file_uri('/js/compiled.js'), array('jquery'), rand(1, 99999), true);
	wp_register_script('wp-client', get_theme_file_uri('/js/compiled.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('prism-js', 'https://cdn.jsdelivr.net/npm/prismjs@1.28.0/prism.min.js', array(), '1.28.0', true);
	/**
	 * Uncomment if you want to pass an php variebles to js-script
	 * for example, you can use homeURL in main.js(its return root url).
	 */
	// $js_variables = array('homeURL' => home_url());
	// wp_localize_script( 'wp-client', 'themeVariables', $js_variables );
	wp_enqueue_script('wp-vendor');
	wp_enqueue_script('wp-client');
}
add_action('wp_enqueue_scripts', 'wp_theme_register_script');

class WordpressThemeCourse_Walker_Comment extends Walker_Comment {

    /**
     * Outputs a single comment.
     *
     * @since 3.6.0
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function comment( $comment, $depth, $args ) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }

        $commenter          = wp_get_current_commenter();
        $show_pending_links = isset( $commenter['comment_author'] ) && $commenter['comment_author'];

        if ( $commenter['comment_author_email'] ) {
            $moderation_note = __( 'Your comment is awaiting moderation.' );
        } else {
            $moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.' );
        }
        ?>

        <<?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
        <?php if ( 'div' !== $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <?php endif; ?>

        <div class="comment">
            <div class="userpic d-none d-sm-block">
                <?php
                if ( 0 != $args['avatar_size'] ) {
                    echo get_avatar( $comment, $args['avatar_size'] );
                }else{
                    echo '<span class="icon icon-user"></span>';
                }
                ?>
            </div>
            <div class="text">
                <div class="meta">
                    <a href="#" class="meta-author"><b><?php echo get_comment_author( $comment ); ?></b></a>
                    <span class="meta-date"><i class="icon icon-clock3"></i><?php echo get_comment_date( 'd M, Y', $comment ); ?></span>
                </div>
                <?php
                comment_text(
                    $comment,
                    array_merge(
                        $args,
                        array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                        )
                    )
                );
                ?>



                <?php
                $reply = get_comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '',
                            'after'     => '',
                            'reply_text'     => '<i class="icon-reply-black"></i>Reply',

                        )
                    )
                );

                $reply = str_replace('comment-reply-link', 'reply comment-reply-link', $reply);
                echo $reply;
                ?>
            </div>
        </div>

        <?php if ( 'div' !== $args['style'] ) : ?>
            </div>
        <?php endif; ?>
        <?php
    }

}

?>

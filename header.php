<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/img/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/img/favicons/safari-pinned-tab.svg" color="#eac040">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <h1 class="pt-0.5 text-3xl font-bold text-center mt-5">Amiearth</h1>
    <header class="header mx-auto">
        <nav class="top-navigation mx-auto pt-4">
            <?php wp_nav_menu(array(
                'theme_location'    => 'top',
                'menu_class'        => 'site-navifation',
                'container'         => false
            )); ?>
        </nav>
        <form method="get" action="<?php echo home_url('/') ?>" class="form">
            <div class="pt-4 px-6">
                <div class="relative mt-2 rounded-md shadow-sm">
                    <input name="s" value="<?php echo get_search_query(); ?>" type="text" class="block w-full rounded-md border-0 py-3 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-700 sm:text-sm sm:leading-6" placeholder="ค้นหาบทความ">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <button type="submit" class="rounded-md bg-green-800 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-700">
                            ค้นหา</button>

                    </div>
                </div>
            </div>
        </form>
    </header>
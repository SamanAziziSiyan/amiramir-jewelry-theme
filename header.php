<?php

/**
 * jeweleryTemplate's header.php
 *
 * @package jeweleryTemplate
 * @since jeweleryTemplate 1.0
 */

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-Type" content="text/html; utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg">

    <meta name="theme-color" id="theme-color-meta" media="(prefers-color-scheme: light)" content="#065224">
    <meta name="theme-color" id="theme-color-meta-dark" media="(prefers-color-scheme: dark)" content="#000">

    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body style="overflow: hidden;" <?php body_class(); ?>>

    <div id="preload" class="z-[999] w-full !h-screen flex items-center justify-center bg-black">
        <!-- <div class="lg:bg-[url(./assets/images/placeholder.svg)] bg-[url(./assets/images/placeholder.svg)] bg-no-repeat z-[999] bg-black w-full h-full bg-cover bg-center"></div> -->
        <div class="w-full h-full hidden lg:flex items-center justify-center">
            <video preload autoplay loop muted playsinline>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg">
                </source>
            </video>
        </div>

        <div class="w-full h-full hidden max-lg:flex   items-center justify-center">
            <video preload autoplay loop muted playsinline>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg">
                </source>
            </video>
        </div>
    </div>
    <div class="w-full text-center mx-auto relative">
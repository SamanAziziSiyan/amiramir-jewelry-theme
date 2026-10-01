<?php

/**
 * jeweleryTemplate's archive.php
 *
 * Template Name: index
 *
 * @package jeweleryTemplate index.php
 * @since jeweleryTemplate 1.0
 */

?>
<?php get_header(); ?>
<?php get_template_part('template-parts/nav/nav', 'nav'); ?>

<?php get_template_part('template-parts/index/hero-header', 'hero-header'); ?>
<?php get_template_part('template-parts/index/key', 'key'); ?>
<?php get_template_part('template-parts/index/image', 'image'); ?>
<?php get_template_part('template-parts/index/products', 'products'); ?>
<?php get_template_part('template-parts/footer', 'footer'); ?>

<?php get_footer(); ?>

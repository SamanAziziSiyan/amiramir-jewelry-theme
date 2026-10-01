<?php

/**
 * jeweleryTemplate's archive.php
 *
 * Template Name: Jewelry Category
 *
 * @package jeweleryTemplate archive.php
 * @since jeweleryTemplate 1.0
 */

?>
<?php get_header(); ?>

<?php get_template_part('template-parts/nav/nav', 'nav'); ?>
<?php get_template_part('template-parts/category/hero', 'hero'); ?>
<?php //get_template_part('template-parts/category/filter', 'filter');
?>
<?php get_template_part('template-parts/category/content', 'content'); ?>
<?php get_template_part('template-parts/footer', 'footer'); ?>

<?php get_footer(); ?>

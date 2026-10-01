<?php

/**
 * jeweleryTemplate's archive.php
 *
 * @package jeweleryTemplate single.php
 * @since jeweleryTemplate 1.0
 */

?>
<?php get_header(); ?>
<?php get_template_part('template-parts/nav/nav', 'nav'); ?>
<?php get_template_part('template-parts/common/breadcrumb', 'breadcrumb'); ?>
<?php get_template_part('loop/single/single-content', 'single-content') ?>
<?php get_template_part('template-parts/footer', 'footer'); ?>


<?php get_footer(); ?>
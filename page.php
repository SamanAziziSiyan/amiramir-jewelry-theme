<?php
/**
 * jeweleryTemplate's archive.php
 *
 * @package jeweleryTemplate page.php
 * @since jeweleryTemplate 1.0
 */

?>
<?php get_header(); ?>
page.php
<?php get_template_part('template-parts/nav/nav','nav');?>
<?php

if (have_posts()):
    while (have_posts()) : the_post();
        the_content();
    endwhile;
else:
    echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
?>
<?php get_template_part('template-parts/footer','footer');?>

<?php get_footer(); ?>
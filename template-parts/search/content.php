<header class="page-header mb-6 mt-40">
    <span class="text-2xl font-normal"><?php printf(__('Search results for: %s', 'twentytwentyone'), '<span class="text-gray-800">' . get_search_query() . '</span>'); ?></span>
</header><!-- .page-header -->

<section class="grid w-full md:grid-cols-3 grid-cols-2 justify-center items-center lg:gap-[88px] 2xl:gap-20 gap-10 max-sm:gap-4 xl:px-36 px-4 pb-[86px] mt-20">

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <a class="categoryPost product_image_bg relative overflow-hidden border border-transparent hover:border-[#004D29] " href="<?php the_permalink(); ?>">
                <div class="col-span-1 relative w-full !bg-[#FFFFFF40] flex flex-col items-center">
                    <div class="min-w-[100%]">
                        <img src="<?php echo jewp_jew_thumbnail(); ?>" class="firstImg w-full" alt="" />
                    </div>

                    <div class="md:max-w-[320px] 2xl:max-w-[420px] absolute top-0 min-w-[160px] max-w-[160px] min-[375px]:max-w-[260px] sm:min-w-[260px] md:min-w-[320px] flex items-center justify-center">
                        <img src="<?php echo (jewp_jew_first_gallery_image(get_the_ID()) ? jewp_jew_first_gallery_image(get_the_ID()) : jewp_jew_thumbnail()); ?>" class="secondImg " alt="" />
                    </div>
                </div>
            </a>
        <?php
        endwhile;
        wp_reset_postdata(); // Reset post data
    else :
        ?>
        <p class="text-gray-700"><?php _e('No results found', 'twentytwentyone'); ?></p>
    <?php
    endif;
    ?>

</section><!-- #primary -->
<?php
$args = [
    'post_type' => ['jewelery'],
    'posts_per_page' => 6,
    'showposts' => 6,
    // 'order'=>'asc'
];
$the_query = new WP_Query($args);
?>
<!-- Project Swiper Loop Section -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper ">
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="swiper-slide !bg-white flex flex-col items-center">
                    <img class="!w-[320px]" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" />
                    <h2 class="text-black md:text-2xl text-base py-3 leading-[150%]">
                        <?php //echo the_title();
                        ?>
                    </h2>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="flex items-center text-center justify-center bg-blue-500 text-white text-sm font-bold px-4 py-3 w-full">
                <?php esc_html_e('There is no project yet', 'StudioPanjere'); ?>
            </div>
        <?php endif; ?>
        <?php $the_query->rewind_posts(); ?>



    </div>
</div>
</div>

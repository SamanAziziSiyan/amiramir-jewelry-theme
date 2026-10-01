<?php

if(is_page('project')){
    $args = [
        'post_type' => ['project'],
        'posts_per_page' => 1,
        'showposts' => 1,
        // 'order'=>'asc'
    ];
}else{
    $args = [
        'post_type' => ['post'],
        'posts_per_page' => 1,
        'showposts' => 1,
        // 'order'=>'asc'
    ];
}
$the_query = new WP_Query($args);
?>

<!-- Header Section -->

<div class="md:bg-[url('./assets/images/placeholder.svg')] header bg-[url('./assets/images/placeholder.svg')] px-8 flex flex-col  bg-no-repeat w-full md:h-[860px] h-[720px] md:bg-contain md:bg-top">

    <?php get_template_part('template-parts/nav/nav', 'nav'); ?>
    <?php get_template_part('template-parts/common/breadcrumb', 'breadcrumb'); ?>

    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="grid grid-cols-2 gap-x-7 items-center justify-center align-middle w-full mt-7">
                <div class="lg:col-span-1 md:order-1 max-md:order-2 col-span-2">
                    <div class="flex flex-col justify-center lg:items-start items-center lg:text-right text-center">
                        <h2 class="text-[#242424] md:text-[32px] leading-[100px] text-[18px] font-bold">
                            <?php echo get_the_title() ?>
                        </h2>
                        <span class="text-[#242424] md:text-[16px] text-[14px] font-normal leading-7 text-justify">
                            <?php echo wp_trim_words(get_the_content(), 30, '...'); ?>
                        </span>
                        <div class="flex gap-x-4 mt-4 leading-7">
                            <a href="<?php the_permalink(); ?>" class="flex items-center justify-center text-[#356BF7] rounded-lg  font-medium md:text-[16px] text-[14px] px-6 py-3.5 text-center mr-3 md:mr-0">
                                بیشتر بخوانید
                                <svg class="mr-2 md:flex hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M9.56994 18.8201C9.37994 18.8201 9.18994 18.7501 9.03994 18.6001L2.96994 12.5301C2.67994 12.2401 2.67994 11.7601 2.96994 11.4701L9.03994 5.40012C9.32994 5.11012 9.80994 5.11012 10.0999 5.40012C10.3899 5.69012 10.3899 6.17012 10.0999 6.46012L4.55994 12.0001L10.0999 17.5401C10.3899 17.8301 10.3899 18.3101 10.0999 18.6001C9.95994 18.7501 9.75994 18.8201 9.56994 18.8201Z" fill="#356BF7" />
                                    <path d="M20.4999 12.75H3.66992C3.25992 12.75 2.91992 12.41 2.91992 12C2.91992 11.59 3.25992 11.25 3.66992 11.25H20.4999C20.9099 11.25 21.2499 11.59 21.2499 12C21.2499 12.41 20.9099 12.75 20.4999 12.75Z" fill="#356BF7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1 md:order-2 max-md:order-1 col-span-2 lg:mt-0 mt-14 w-full flex items-center">
                    <img class="w-full h-[306px] rounded-2xl lg:px-0 px-4" src="<?php echo jewp_jew_thumbnail(); ?>" alt="<?php echo get_the_title() ?>">
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <div class="flex items-center text-center justify-center bg-blue-500 text-white text-sm font-bold px-4 py-3 w-full">
            <?php esc_html_e('There is no posted yet', 'StudioPanjere'); ?>
        </div>
    <?php endif; ?>
    <?php $the_query->rewind_posts(); ?>

</div>
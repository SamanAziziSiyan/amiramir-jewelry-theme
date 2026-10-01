
<div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1  w-full md:gap-6 mt-10 gap-4 items-center">
    <?php
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [
        'post_type' => ['post'],
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $page,
        'status' => 'publish'

    ];
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()):
        while ($the_query->have_posts()) : $the_query->the_post();            ?>
              <div class="w-full bg-[#FFFFFF80] st-blog-box rounded-lg h-full xl:p-4 p-2 gap-y-3 flex flex-col text-white">
                <img class="rounded-lg w-full h-full" src="<?php echo jewp_jew_thumbnail(); ?>" alt="<?php echo get_the_title() ?>">
                <h4 class=" text-[20px] font-bold  text-[#242424]"><?php echo get_the_title() ?></h4>
                <span class=" text-[14px] px-1 text-[#595959]">
                    <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>.
                </span>
                <div class="flex justify-between">
                    <button class="flex bg-[#407BFF0D] px-2 items-center">
                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M17 10C18.6569 10 20 8.65685 20 7C20 5.34315 18.6569 4 17 4C15.3431 4 14 5.34315 14 7C14 8.65685 15.3431 10 17 10Z" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 20C8.65685 20 10 18.6569 10 17C10 15.3431 8.65685 14 7 14C5.34315 14 4 15.3431 4 17C4 18.6569 5.34315 20 7 20Z" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14 14H20V19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H15C14.7348 20 14.4804 19.8946 14.2929 19.7071C14.1054 19.5196 14 19.2652 14 19V14ZM4 4H10V9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10H5C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9V4Z" stroke="#878787" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="text-[#878787] text-[10px]">
                            <?php
                            $post_tags = jewp_get_post_tags();
                            $count = 0;
                            if ($post_tags) :
                                foreach ($post_tags as $tag) :
                                    $tag_link = get_tag_link($tag->term_id);
                            ?>
                                    <a href="<?php echo $tag_link; ?>">
                                        <?php echo $tag->name ?>
                                    </a>
                                    <?php if ($count = 1) break; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                بدون برچسب
                            <?php endif; ?>
                        </span>
                    </button>
                    <div class="flex items-center">
                        <a class=" xl:text-[14px] lg:text-[12px] text-[#356BF7]" href="<?php the_permalink(); ?>"> بیشتر بخوانید </a>
                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9.56994 18.82C9.37994 18.82 9.18994 18.75 9.03994 18.6L2.96994 12.53C2.67994 12.24 2.67994 11.76 2.96994 11.47L9.03994 5.4C9.32994 5.11 9.80994 5.11 10.0999 5.4C10.3899 5.69 10.3899 6.17 10.0999 6.46L4.55994 12L10.0999 17.54C10.3899 17.83 10.3899 18.31 10.0999 18.6C9.95994 18.75 9.75994 18.82 9.56994 18.82Z" fill="#356BF7" />
                            <path d="M20.4999 12.75H3.66992C3.25992 12.75 2.91992 12.41 2.91992 12C2.91992 11.59 3.25992 11.25 3.66992 11.25H20.4999C20.9099 11.25 21.2499 11.59 21.2499 12C21.2499 12.41 20.9099 12.75 20.4999 12.75Z" fill="#356BF7" />
                        </svg>
                    </div>

                </div>

            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>

</div>
<!-- Pagination -->
<div class="text-center md:mt-9 mt-6">
    <?php echo Pagination::paginate($the_query);?>
</div>

<div id="first" class="px-4 tab-contents  ">
    <!-- Swiper -->
    <div class="swiper !py-8  !pl-2 mySwiper">
        <div class="swiper-wrapper">
            <?php
            $category_slug = 'ring'; // Replace 'your-category-slug' with the slug of your desired category

            // Check if the category exists
            $category = get_term_by('slug', $category_slug, 'jewelery-cat');

            if ($category) {
                // Category exists, proceed with WP_Query
                $args = array(
                    'post_type' => 'jewelery', // Specify your custom post type
                    'posts_per_page' => 6, // Number of posts to display (-1 for all)
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'jewelery-cat',
                            'field'    => 'slug',
                            'terms'    => $category_slug,
                        ),
                    ),
                );

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <!-- Ring -->

                        <div class="home_swiper_card swiper-slide">
                            <a class="relative" href="<?php the_permalink(); ?>">
                                <div class="relative overflow-hidden w-full flex items-center justify-center   ">
                                    <img class=" firstImg w-5/6" src="<?php echo jewp_jew_thumbnail(); ?>" alt="<?php the_title(); ?>" />



                                    <img src="<?php echo (jewp_jew_first_gallery_image(get_the_ID()) ? jewp_jew_first_gallery_image(get_the_ID()) : jewp_jew_thumbnail()); ?>" class="  secondImg absolute top-0 max-w-full" alt="" />
                                </div>



                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php echo 'No posts found.'; ?>
            <?php endif;
            } else {
                echo "No $category_slug category found.";
            }
            ?>
        </div>

        <div class="swiper-button-next md:hidden md:h-10 md:w-10 w-7 h-7 p-1 md:p-2 rounded-full bg-[#F0F2F4] flex items-center align-middle justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <mask id="mask0_643_530" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                    <rect width="24" height="24" fill="#D9D9D9" />
                </mask>
                <g mask="url(#mask0_643_530)">
                    <path d="M7.87635 21.2873L6.92188 20.3418L15.284 11.9795L6.92188 3.6302L7.87635 2.67188L17.1841 11.9795L7.87635 21.2873Z" fill="black" />
                </g>
            </svg>
        </div>
        <div class="swiper-button-prev md:hidden md:h-10 md:w-10 w-7 h-7 p-1 md:p-2 rounded-full bg-[#F0F2F4] flex items-center align-middle justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <mask id="mask0_643_4317" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                    <rect width="24" height="24" fill="#D9D9D9" />
                </mask>
                <g mask="url(#mask0_643_4317)">
                    <path d="M16.3077 21.6154L7 12.3077L16.3077 3L17.2622 3.95835L8.9 12.3077L17.2622 20.6571L16.3077 21.6154Z" fill="black" />
                </g>
            </svg>
        </div>
    </div>
</div>
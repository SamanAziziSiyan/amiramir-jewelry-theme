<section class="grid w-full md:grid-cols-3 grid-cols-2 justify-center items-center lg:gap-20 gap-4 lg:px-36 px-4 pb-[86px]">
    <?php

    $category_slug = 'collection'; // Replace 'your-category-slug' with the slug of your desired category

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
                <a class="categoryPost product_image_bg relative border max-sm:w-full max-2xl:w-max border-transparent hover:border-[#004D29] " href="<?php the_permalink(); ?>">
                    <div class="col-span-1 relative  max-sm:w-full max-2xl:w-max  w-full !bg-[#FFFFFF40]  flex flex-col items-center overflow-hidden">
                        <div class="md:max-w-[320px] 2xl:max-w-[420px] min-[375px]:max-w-[260px] max-w-[160px] min-w-[160px] sm:min-w-[260px] md:min-w-[320px]">
                            <img src="<?php echo jewp_jew_thumbnail();; ?>" class=" firstImg w-full" alt="" />
                        </div>


                        <div class="md:max-w-[320px] 2xl:max-w-[420px] absolute top-0  max-w-[160px] min-[375px]:max-w-[260px]  sm:min-w-[260px]  md:min-w-[320px] flex items-center justify-center !min-w-full !min-h-full">
                            <img src="<?php echo (jewp_jew_first_gallery_image(get_the_ID()) ? jewp_jew_first_gallery_image(get_the_ID()) : jewp_jew_thumbnail()); ?>" class=" secondImg " alt="" />
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        <?php else : ?>
            <?php echo 'No posts found.'; ?>
    <?php endif;
    } else {
        echo "No $category_slug category found.";
    }
    ?>

</section>
<?php
// Get the current post ID
$current_post_id = get_the_ID();

// Get the categories of the current post
$categories = get_the_terms($current_post_id, 'jewelery-cat');

// If the post has categories
if ($categories) {
    // Get the first category (you can modify this if your post can belong to multiple categories)
    $current_category = $categories[0]->term_id;
    // Custom query to fetch related posts by category
    $related_query = new WP_Query(array(
        'post_type' => 'jewelery', // Replace 'jewelery' with the actual name of your custom post type
        'posts_per_page' => 3, // Adjust the number of related posts to display
        'tax_query' => array(
            array(
                'taxonomy' => 'jewelery-cat', // Replace 'category' with the actual name of your custom taxonomy
                'terms' => $current_category,
            ),
        ),
        'post__not_in' => array($current_post_id), // Exclude the current post from the results
    ));

    // Display related posts
    if ($related_query->have_posts()) {
        while ($related_query->have_posts()) {
            $related_query->the_post();
?>
            <a class="categoryPost product_image_bg  relative border border-transparent hover:border-[#004D29] w-max" href="<?php the_permalink(); ?>">
                <div class="col-span-1 relative    w-full !bg-[#FFFFFF40] flex  items-center">
                    <div class="lg:max-w-[320px] min-h-[160px] max-w-[160px] min-w-[160px] lg:min-w-[320px]">
                        <img src="<?php echo jewp_jew_thumbnail();; ?>" class=" firstImg w-full" alt="" />
                    </div>


                    <div class="md:max-w-[320px] min-h-[160px] 2xl:max-w-[420px] absolute top-0 min-w-[160px] max-w-[160px] min-[375px]:max-w-[260px]  sm:min-w-[260px]  md:min-w-[320px] flex items-center justify-center">
                        <img src="<?php echo (jewp_jew_first_gallery_image(get_the_ID()) ? jewp_jew_first_gallery_image(get_the_ID()) : jewp_jew_thumbnail()); ?>" class=" secondImg " alt="" />
                    </div>
                </div>
            </a>

<?php
        }
        // Reset post data
        wp_reset_postdata();
    } else {
        echo '<p>No related posts found.</p>';
    }
}
?>
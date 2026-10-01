        <!--Start Portfolio details -->
        <div class="h-screen flex items-center justify-center   lg:mt-10 2xl:mt-5  min-[1800px]:mt-10  px-[33px] lg:px-16 xl:px-[148px] max-md:pt-20  ">
            <?php get_template_part('loop/single/portfolio/portfolio-info', 'portfolio-info') ?>
        </div>

        <!-- Content -->

        <?php
        $image_id = get_post_meta(get_the_ID(), '_listing_image_id', true);
        $image_id_mobile = get_post_meta(get_the_ID(), '_mobile_image_id', true);
        ?>
        <?php if ($image_id || $image_id_mobile) : ?>
            <section class="w-full h-screen">
                <?php

                if ($image_id || $image_id_mobile) {
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    $image_url_mobile = wp_get_attachment_image_url($image_id_mobile, 'full');
                    echo '<img class="w-full h-full hidden md:inline-block" src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
                    echo '<img class="w-full h-full md:hidden inline-block" src="' . esc_url($image_url_mobile) . '" alt="' . esc_attr(get_the_title()) . '" />';
                } else {
                    echo '<img class="w-full h-full" src="' . get_template_directory_uri() . '/assets/images/placeholder.svg" alt="' . esc_attr(get_the_title()) . '" />';
                }
                ?>
            </section>

        <?php endif; ?>
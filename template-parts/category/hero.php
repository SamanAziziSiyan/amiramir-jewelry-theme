      <!-- Start Header img -->
      <section class="w-full h-full relative">
          <div class="w-full md:mt-32 mt-20 relative">
              <?php
                $category_image = get_term_meta(get_queried_object_id(), 'category_image', true);
                if ($category_image) {
                ?>
                  <img src="<?php echo esc_url($category_image); ?>" class="w-full h-full max-[1440px]:max-h-[400px] max-h-[600px]" alt="" />
              <?php } ?>

          </div>
      </section>
      <!-- End Header img -->
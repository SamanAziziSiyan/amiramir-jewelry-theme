  <!-- Start Single Content -->
  <div class="">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>



        <?php if (is_singular('jewelery')) : ?>
          <?php get_template_part('loop/single/portfolio/single-portfolio-content', 'single-portfolio-content') ?>
        <?php else : ?>
          <?php get_template_part('loop/single/post/single-post-content', 'single-post-content') ?>

        <?php endif; ?>


  </div>

  <?php endwhile; ?>
  <?php endif; ?>

  </div>

  <!--Relvent Blog Section -->
  <div class="w-full flex items-center justify-center flex-col mt-8 lg:mt-16">
    <h4 class="text-[#000] text-base lg:text-[36px] font-normal mx-auto lg:mb-16 mb-8">
      you may also like
    </h4>

  </div>
  <section class="grid w-full md:grid-cols-3 grid-cols-2 max-md:grid-cols-2 justify-center items-center lg:gap-20 gap-4 lg:px-36 px-4 pb-[86px]">
    <?php if (is_singular("jewelery")) : ?>
      <?php get_template_part('loop/single/portfolio/related-jew', 'related-jew') ?>
    <?php else : ?>
      <?php get_template_part('loop/single/portfolio/related-post', 'related-post') ?>
    <?php endif ?>

  </section>
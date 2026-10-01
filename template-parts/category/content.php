<section class="grid justify-items-center w-full lg:grid-cols-3 grid-cols-2  justify-center items-center max-sm:gap-3 max-sm:gap-y-6 lg:gap-[78px] 2xl:gap-0 2xl:gap-y-[88px] gap-10 lg:px-8 xl:px-32 px-4 max-sm:px-3 pb-[86px] mt-10">
    <h2 class="uppercase md:text-[48px] xl:px-36 px-4 text-[24px] font-normal text-white absolute lg:top-[13%] xl:top-[18%]  top-[12%] max-md:top-[8%] max-[322px]:top-[3%] max-[426px]:top-[4%] max-[600px]:top-[5%] left-0">
        <?php single_cat_title(); ?>
    </h2>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();  ?>
            <a class="lg:max-w-[320px] lg:min-w-[320px] lg:max-h-[320px] lg:min-h-[320px] 2xl:max-w-[380px] 2xl:min-w-[380px] 2xl:max-h-[380px] 2xl:min-h-[380px] categoryPost product_image_bg max-sm:w-full max-2xl:w-max relative border border-transparent hover:border-[#004D29] " href="<?php the_permalink(); ?>">
                <div class=" col-span-1 max-sm:w-full max-2xl:w-max relative  overflow-hidden  w-full !bg-[#FFFFFF40] flex  items-center">
                    <div class=" max-w-full min-w-full flex items-center justify-center ">
                        <img width="320" height="320" src="<?php echo jewp_jew_thumbnail();; ?>" class=" firstImg max-w-full min-w-full" alt="" />
                    </div>


                    <div class="absolute max-w-full min-w-full top-0 flex items-center justify-center">
                        <img width="320" height="320" src="<?php echo (jewp_jew_first_gallery_image(get_the_ID()) ? jewp_jew_first_gallery_image(get_the_ID()) : jewp_jew_thumbnail()); ?>" class=" secondImg max-w-full min-w-full " alt="" />
                    </div>



                </div>
            </a>
        <?php endwhile; ?>
    <?php else : ?>
        <?php echo 'No posts found.'; ?>
    <?php endif; ?>
</section>
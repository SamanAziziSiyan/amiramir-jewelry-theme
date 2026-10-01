<section class="lg:h-screen max-lg:pb-14 pt-28 w-full bg-black relative">
    <div id="houseHeader" class="grid grid-cols-3  transition-all delay-300 ">
        <div class="min-[1025px]:col-span-1 max-lg:mt-0  col-span-3 z-50  flex flex-col items-start text-left pl-4 max-md:pr-4 xl:pl-8 lg:justify-start lg:mt-10  mt-[145px] xl:mt-[145px] justify-center gap-y-4 ">
            <h2 class="text-white uppercase lg:text-[48px] text-4xl">the house</h2>
            <p class="text-white text-balance lg:text-2xl ">
                Welcome to AMIR AMIR, where the journey towards timeless elegance
                begins with a commitment to exquisite craftsmanship and an
                unwavering passion for perfection. As the heart of our legacy, we
                personally select every stone that graces our creations, ensuring
                that each gem possesses a rare and captivating allure. Our
                dedication to excellence extends beyond aesthetics; it is a
                promise of enduring quality and authenticity.
            </p>
        </div>
        <div class="min-[1025px]:col-span-2 col-span-3 h-full  max-lg:relative max-lg:top-[-18px] flex items-end justify-end lg:items-center lg:justify-center ">
            <video class="max-[769px]:hidden" playsinline poster="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" loop preload class="w-full  h-full " playsinline autoplay muted>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg">
                </source>
            </video>
            <video class="min-[769px]:hidden" playsinline poster="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" loop preload class="w-full  h-full " autoplay muted>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg">
                </source>
            </video>
        </div>
    </div>
    <div class="w-full h-screen house-gradient house-gradient-top max-md:top-[60px] absolute top-0"></div>
</section>

<section id="houseAnimate" class="lg:h-screen pt-8 w-full flex items-center justify-center   relative  bg-black">
    <img id="house-dimond" src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" class=" houseAnimateImage once max-md:hidden  h-full " />

    <img id="houseZ" src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" class=" houseAnimateImage once md:hidden h-full " />

    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" id="textBlur" class="absolute houseAnimateImage  once opacity-0  max-lg:w-[300px] lg:top-[48%]" />
</section>
<style>
    .swiper-button-next,
    .swiper-button-prev {
        display: none !important;
    }
</style>
<div class="w-full h-full flex items-center 2xl:pb-9   justify-center ">
    <div class="grid grid-cols-2  mt-0 md:mt-[100px] lg:mt-0 justify-items-center  items-center justify-center gap-x-[1px] xl:gap-x-[59px] max-lg:gap-y-[32px]">

        <div class="col-span-2 lg:col-span-1  flex items-center justify-center  max-lg:mx-auto w-max   single_jew_image ">

            <div style="background: rgba(255, 255, 255, 0.50);" class="relative   2xl:w-[730px] 2xl:h-[730px]  max-w-[450px] max-h-[450px] max-[350px]:w-[290px] max-sm:w-[320px] max-md:w-[450px] max-lg:w-[400px] max-md:h-[320px] max-lg:h-[400px] overflow-hidden !bg-[#FFFFFF40] ">
                <!-- Like Icon -->
                <div class="like-button mt-6 cursor-pointer absolute -left-4 z-50  w-full flex justify-end" data-product-id="<?php the_ID(); ?>">
                    <?php
                    if (is_user_logged_in()) :
                        $user_id = get_current_user_id();
                        $wishlist = get_user_meta($user_id, 'wishlist', true);
                        if (is_array($wishlist) && in_array(get_the_ID(), $wishlist)) : ?>

                            <div class="flex items-center justify-center p-1 bg-white rounded-full lg:w-7 lg:h-7 w-6 h-6 ">
                                <svg class="liked max-lg:w-5  " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 31 31" fill="none">
                                    <rect width="29.664" height="29.664" transform="translate(0.671875 0.664062)" fill="transparent" />
                                    <path class="liked " d="M15.5039 24.9561L14.5674 24.11C12.5501 22.2671 10.8815 20.6896 9.56156 19.3775C8.24157 18.0655 7.19969 16.9083 6.4359 15.906C5.67212 14.9037 5.13851 13.997 4.83507 13.1856C4.53161 12.3743 4.37988 11.5582 4.37988 10.7374C4.37988 9.16547 4.9139 7.84548 5.98192 6.77745C7.04995 5.70943 8.36993 5.17542 9.94188 5.17542C11.0289 5.17542 12.0486 5.45351 13.001 6.00971C13.9533 6.56591 14.7876 7.37485 15.5039 8.43654C16.2201 7.37485 17.0544 6.56591 18.0068 6.00971C18.9591 5.45351 19.9788 5.17542 21.0659 5.17542C22.6378 5.17542 23.9578 5.70943 25.0258 6.77745C26.0938 7.84548 26.6279 9.16547 26.6279 10.7374C26.6279 11.5582 26.4761 12.3743 26.1727 13.1856C25.8692 13.997 25.3356 14.9037 24.5718 15.906C23.808 16.9083 22.7701 18.0655 21.4581 19.3775C20.146 20.6896 18.4734 22.2671 16.4404 24.11L15.5039 24.9561ZM15.5039 23.2828C17.4815 21.4954 19.1089 19.9642 20.3861 18.6894C21.6633 17.4146 22.6727 16.3085 23.4143 15.3712C24.1559 14.4339 24.6709 13.6036 24.9593 12.8802C25.2477 12.1568 25.3919 11.4426 25.3919 10.7374C25.3919 9.50141 24.9799 8.47141 24.1559 7.64741C23.3319 6.82341 22.3019 6.41141 21.0659 6.41141C20.0818 6.41141 19.1738 6.69228 18.3419 7.25402C17.51 7.81576 16.7652 8.66156 16.1076 9.79141H14.9001C14.2267 8.64572 13.4779 7.79597 12.6539 7.24216C11.8299 6.68833 10.9259 6.41141 9.94188 6.41141C8.72172 6.41141 7.69569 6.82341 6.86378 7.64741C6.03185 8.47141 5.61588 9.50141 5.61588 10.7374C5.61588 11.4426 5.76008 12.1568 6.04848 12.8802C6.33688 13.6036 6.85188 14.4339 7.59348 15.3712C8.33508 16.3085 9.34448 17.4106 10.6217 18.6775C11.8989 19.9444 13.5263 21.4795 15.5039 23.2828Z" fill="#CE0000" />
                                    <path class="liked likedBody" d="M15.5039 23.2828C17.4815 21.4954 19.1089 19.9642 20.3861 18.6894C21.6633 17.4146 22.6727 16.3085 23.4143 15.3712C24.1559 14.4339 24.6709 13.6036 24.9593 12.8802C25.2477 12.1568 25.3919 11.4426 25.3919 10.7374C25.3919 9.50141 24.9799 8.47141 24.1559 7.64741C23.3319 6.82341 22.3019 6.41141 21.0659 6.41141C20.0818 6.41141 19.1738 6.69228 18.3419 7.25402C17.51 7.81576 16.7652 8.66156 16.1076 9.79141H14.9001C14.2267 8.64572 13.4779 7.79597 12.6539 7.24216C11.8299 6.68833 10.9259 6.41141 9.94188 6.41141C8.72172 6.41141 7.69569 6.82341 6.86378 7.64741C6.03185 8.47141 5.61588 9.50141 5.61588 10.7374C5.61588 11.4426 5.76008 12.1568 6.04848 12.8802C6.33688 13.6036 6.85188 14.4339 7.59348 15.3712C8.33508 16.3085 9.34448 17.4106 10.6217 18.6775C11.8989 19.9444 13.5263 21.4795 15.5039 23.2828Z" fill="#CE0000" />
                                </svg>
                            </div>

                        <?php else : ?>
                            <div class="flex items-center justify-center p-1 bg-white rounded-full lg:w-7 lg:h-7 w-6 h-6">
                                <svg class="liked max-lg:w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 31 31" fill="none">
                                    <rect width="29.664" height="29.664" transform="translate(0.671875 0.664062)" fill="transparent" />
                                    <path class="liked" d="M15.5039 24.9561L14.5674 24.11C12.5501 22.2671 10.8815 20.6896 9.56156 19.3775C8.24157 18.0655 7.19969 16.9083 6.4359 15.906C5.67212 14.9037 5.13851 13.997 4.83507 13.1856C4.53161 12.3743 4.37988 11.5582 4.37988 10.7374C4.37988 9.16547 4.9139 7.84548 5.98192 6.77745C7.04995 5.70943 8.36993 5.17542 9.94188 5.17542C11.0289 5.17542 12.0486 5.45351 13.001 6.00971C13.9533 6.56591 14.7876 7.37485 15.5039 8.43654C16.2201 7.37485 17.0544 6.56591 18.0068 6.00971C18.9591 5.45351 19.9788 5.17542 21.0659 5.17542C22.6378 5.17542 23.9578 5.70943 25.0258 6.77745C26.0938 7.84548 26.6279 9.16547 26.6279 10.7374C26.6279 11.5582 26.4761 12.3743 26.1727 13.1856C25.8692 13.997 25.3356 14.9037 24.5718 15.906C23.808 16.9083 22.7701 18.0655 21.4581 19.3775C20.146 20.6896 18.4734 22.2671 16.4404 24.11L15.5039 24.9561ZM15.5039 23.2828C17.4815 21.4954 19.1089 19.9642 20.3861 18.6894C21.6633 17.4146 22.6727 16.3085 23.4143 15.3712C24.1559 14.4339 24.6709 13.6036 24.9593 12.8802C25.2477 12.1568 25.3919 11.4426 25.3919 10.7374C25.3919 9.50141 24.9799 8.47141 24.1559 7.64741C23.3319 6.82341 22.3019 6.41141 21.0659 6.41141C20.0818 6.41141 19.1738 6.69228 18.3419 7.25402C17.51 7.81576 16.7652 8.66156 16.1076 9.79141H14.9001C14.2267 8.64572 13.4779 7.79597 12.6539 7.24216C11.8299 6.68833 10.9259 6.41141 9.94188 6.41141C8.72172 6.41141 7.69569 6.82341 6.86378 7.64741C6.03185 8.47141 5.61588 9.50141 5.61588 10.7374C5.61588 11.4426 5.76008 12.1568 6.04848 12.8802C6.33688 13.6036 6.85188 14.4339 7.59348 15.3712C8.33508 16.3085 9.34448 17.4106 10.6217 18.6775C11.8989 19.9444 13.5263 21.4795 15.5039 23.2828Z" fill="black" />
                                    <path class="liked likedBody" d="M15.5039 23.2828C17.4815 21.4954 19.1089 19.9642 20.3861 18.6894C21.6633 17.4146 22.6727 16.3085 23.4143 15.3712C24.1559 14.4339 24.6709 13.6036 24.9593 12.8802C25.2477 12.1568 25.3919 11.4426 25.3919 10.7374C25.3919 9.50141 24.9799 8.47141 24.1559 7.64741C23.3319 6.82341 22.3019 6.41141 21.0659 6.41141C20.0818 6.41141 19.1738 6.69228 18.3419 7.25402C17.51 7.81576 16.7652 8.66156 16.1076 9.79141H14.9001C14.2267 8.64572 13.4779 7.79597 12.6539 7.24216C11.8299 6.68833 10.9259 6.41141 9.94188 6.41141C8.72172 6.41141 7.69569 6.82341 6.86378 7.64741C6.03185 8.47141 5.61588 9.50141 5.61588 10.7374C5.61588 11.4426 5.76008 12.1568 6.04848 12.8802C6.33688 13.6036 6.85188 14.4339 7.59348 15.3712C8.33508 16.3085 9.34448 17.4106 10.6217 18.6775C11.8989 19.9444 13.5263 21.4795 15.5039 23.2828Z" fill="none" />
                                </svg>
                            </div>

                        <?php endif; ?>
                    <?php else : ?>
                        <div class="flex items-center justify-center p-1 bg-white rounded-full lg:w-7 lg:h-7 w-6 h-6">
                            <svg onclick="wishlist_sidebar_toggle(); closeNav()" class="liked max-lg:w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 31 31" fill="none">
                                <rect width="29.664" height="29.664" transform="translate(0.671875 0.664062)" fill="white" />
                                <path class="liked" d="M15.5039 24.9561L14.5674 24.11C12.5501 22.2671 10.8815 20.6896 9.56156 19.3775C8.24157 18.0655 7.19969 16.9083 6.4359 15.906C5.67212 14.9037 5.13851 13.997 4.83507 13.1856C4.53161 12.3743 4.37988 11.5582 4.37988 10.7374C4.37988 9.16547 4.9139 7.84548 5.98192 6.77745C7.04995 5.70943 8.36993 5.17542 9.94188 5.17542C11.0289 5.17542 12.0486 5.45351 13.001 6.00971C13.9533 6.56591 14.7876 7.37485 15.5039 8.43654C16.2201 7.37485 17.0544 6.56591 18.0068 6.00971C18.9591 5.45351 19.9788 5.17542 21.0659 5.17542C22.6378 5.17542 23.9578 5.70943 25.0258 6.77745C26.0938 7.84548 26.6279 9.16547 26.6279 10.7374C26.6279 11.5582 26.4761 12.3743 26.1727 13.1856C25.8692 13.997 25.3356 14.9037 24.5718 15.906C23.808 16.9083 22.7701 18.0655 21.4581 19.3775C20.146 20.6896 18.4734 22.2671 16.4404 24.11L15.5039 24.9561ZM15.5039 23.2828C17.4815 21.4954 19.1089 19.9642 20.3861 18.6894C21.6633 17.4146 22.6727 16.3085 23.4143 15.3712C24.1559 14.4339 24.6709 13.6036 24.9593 12.8802C25.2477 12.1568 25.3919 11.4426 25.3919 10.7374C25.3919 9.50141 24.9799 8.47141 24.1559 7.64741C23.3319 6.82341 22.3019 6.41141 21.0659 6.41141C20.0818 6.41141 19.1738 6.69228 18.3419 7.25402C17.51 7.81576 16.7652 8.66156 16.1076 9.79141H14.9001C14.2267 8.64572 13.4779 7.79597 12.6539 7.24216C11.8299 6.68833 10.9259 6.41141 9.94188 6.41141C8.72172 6.41141 7.69569 6.82341 6.86378 7.64741C6.03185 8.47141 5.61588 9.50141 5.61588 10.7374C5.61588 11.4426 5.76008 12.1568 6.04848 12.8802C6.33688 13.6036 6.85188 14.4339 7.59348 15.3712C8.33508 16.3085 9.34448 17.4106 10.6217 18.6775C11.8989 19.9444 13.5263 21.4795 15.5039 23.2828Z" fill="black" />
                                <path class="liked likedBody" d="M15.5039 23.2828C17.4815 21.4954 19.1089 19.9642 20.3861 18.6894C21.6633 17.4146 22.6727 16.3085 23.4143 15.3712C24.1559 14.4339 24.6709 13.6036 24.9593 12.8802C25.2477 12.1568 25.3919 11.4426 25.3919 10.7374C25.3919 9.50141 24.9799 8.47141 24.1559 7.64741C23.3319 6.82341 22.3019 6.41141 21.0659 6.41141C20.0818 6.41141 19.1738 6.69228 18.3419 7.25402C17.51 7.81576 16.7652 8.66156 16.1076 9.79141H14.9001C14.2267 8.64572 13.4779 7.79597 12.6539 7.24216C11.8299 6.68833 10.9259 6.41141 9.94188 6.41141C8.72172 6.41141 7.69569 6.82341 6.86378 7.64741C6.03185 8.47141 5.61588 9.50141 5.61588 10.7374C5.61588 11.4426 5.76008 12.1568 6.04848 12.8802C6.33688 13.6036 6.85188 14.4339 7.59348 15.3712C8.33508 16.3085 9.34448 17.4106 10.6217 18.6775C11.8989 19.9444 13.5263 21.4795 15.5039 23.2828Z" fill="none" />
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Swiper -->
                <div class="swiper singlePageSwiper ">
                    <div class="swiper-wrapper">
                        <div style="background: rgba(255, 255, 255, 0.50);" class="swiper-slide  !bg-[#FFFFFF40]   flex flex-col items-center ">
                            <img class="cursor-pointer" src="<?php echo jewp_jew_thumbnail();  ?>" data-fancybox="gallery" data-caption="<?php the_title();  ?>" />
                        </div>
                        <!-- Ring -->
                        <?php
                        $postData = get_post_meta(get_the_ID());

                        // Check if the key 'gallery_data' exists in $postData
                        if (isset($postData['gallery_data'])) {
                            $photos_array = get_post_meta(get_the_ID(), 'gallery_data', true);

                            // Check if 'image_url' key exists in $photos_array
                            if (is_array($photos_array) && isset($photos_array['image_url']) && is_array($photos_array['image_url'])) {
                                $url_array = $photos_array['image_url'];
                                $count = sizeof($url_array);

                                for ($i = 0; $i < $count; $i++) {
                        ?>
                                    <div style="background: rgba(255, 255, 255, 0.50);" class=" swiper-slide !bg-[#FFFFFF40]flex flex-col items-center">


                                        <img class="cursor-pointer" src="<?php echo esc_url($url_array[$i]);  ?>" data-fancybox="gallery" />




                                    </div>
                            <?php
                                    if ($i == 0) {
                                        $i = 0;
                                    }
                                }
                            }
                        } else {

                            ?>
                            <div style="background: rgba(255, 255, 255, 0.50);" class="swiper-slide   flex flex-col items-center ">



                                <img class="cursor-pointer" src="<?php echo jewp_jew_thumbnail();  ?>" data-fancybox="gallery" data-caption="<?php the_title();  ?>" />

                            </div>
                        <?php
                        }
                        ?>

                    </div>

                    <div class="swiper-button-next md:hidden h-10 w-10 p-2 rounded-full bg-[#D9D9D9] flex items-center align-middle justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <mask id="mask0_643_530" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_643_530)">
                                <path d="M7.87635 21.2873L6.92188 20.3418L15.284 11.9795L6.92188 3.6302L7.87635 2.67188L17.1841 11.9795L7.87635 21.2873Z" fill="black" />
                            </g>
                        </svg>
                    </div>
                    <div class="swiper-button-prev md:hidden h-10 w-10 p-2 rounded-full bg-[#D9D9D9] flex items-center align-middle justify-center">
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

                <div class="button-next mr-3 absolute top-[85%] md:top-[89%]  rounded-full bg-white p-1 z-[980] right-1 lg:w-7 lg:h-7 h-6 w-6 flex items-center justify-center">
                    <svg class="max-lg:w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 33 33" fill="none">
                        <mask id="mask0_2163_1350" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="33" height="33">
                            <rect x="0.671875" y="0.328003" width="32" height="32" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_2163_1350)">
                            <path d="M11.174 28.7109L9.90137 27.4502L21.0509 16.3006L9.90137 5.16815L11.174 3.89038L23.5843 16.3006L11.174 28.7109Z" fill="black" />
                        </g>
                    </svg>
                </div>
                <div class="button-prev ml-3 absolute top-[85%] md:top-[89%] bg-white rounded-full p-1  lg:w-7 lg:h-7 h-6 w-6 flex items-center justify-center z-[980] left-1">

                    <svg class="max-lg:w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" fill="none">
                        <mask id="mask0_2163_1354" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32">
                            <rect width="32" height="32" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_2163_1354)">
                            <path d="M21.2101 28.0205L8.7998 15.6102L21.2101 3.19995L22.4827 4.47775L11.3331 15.6102L22.4827 26.7427L21.2101 28.0205Z" fill="black" />
                        </g>
                    </svg>
                </div>
            </div>



            <!-- <button class="like-button" data-product-id="<?php //the_ID();
                                                                ?>">Like</button> -->
        </div>


        <div class="col-span-2 lg:ml-12 xl:ml-0 lg:col-span-1 flex flex-col gap-4 lg:gap-y-12 items-start justify-end max-md:ml-4">
            <h1 class="text-[#000] text-2xl text-left lg:text-4xl uppercase"><?php the_title(); ?></h1>
            <div class="text-[#000] text-base lg:text-[18px] text-left w-full xl:w-6/6 single_jew_description "><?php the_content(); ?> </div>
            <button onclick="openModal()" class="bg-[#004D29] text-white text-center uppercase w-max py-2  mt-4 px-8  flex items-center justify-center gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path d="M4.30762 23.1795V22.0513H27.6923V23.1795H4.30762ZM5.23072 20V19.93C5.23072 17.1128 6.1585 14.7587 8.01405 12.8676C9.86961 10.9764 12.1555 9.84104 14.8718 9.46155V8.66668C14.8718 8.35613 14.9822 8.09045 15.203 7.86965C15.4238 7.64885 15.6894 7.53845 16 7.53845C16.3105 7.53845 16.5762 7.64885 16.797 7.86965C17.0178 8.09045 17.1282 8.35613 17.1282 8.66668V9.46155C19.8347 9.84104 22.1182 10.9764 23.9786 12.8676C25.839 14.7587 26.7692 17.1128 26.7692 19.93V20H5.23072ZM6.45635 18.8718H25.5436C25.335 16.5356 24.3025 14.5701 22.4461 12.9752C20.5897 11.3804 18.4393 10.5829 15.9948 10.5829C13.539 10.5829 11.3878 11.3804 9.54138 12.9752C7.69496 14.5701 6.66662 16.5356 6.45635 18.8718Z" fill="white" />
                </svg>
                book appointment

            </button>
        </div>

    </div>
</div>

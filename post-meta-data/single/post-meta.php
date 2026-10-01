<div class="flex items-center justify-center my-4">
    <ul class="flex flex-row items-center ">
        <li class="flex gap-2 bg-[#356BF717]  ml-2 p-2 text-[#64646C] md:text-[14px] text-[10px]"><span class="mr-2">
            <svg class="text-black w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                <path d="M4.51555 7C3.55827 8.4301 3 10.1499 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3V6M12 12L8 8" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span><?php echo ReadEstimateTime::dwt_read_estimate_time(get_the_content()) ?> دقیقه</li>

        <?php if(current_user_can('manage_options')): ?>
            <li class="flex gap-2 bg-[#356BF717]  ml-2 p-2 text-[#64646C] md:text-[14px] text-[10px]"><span class="icons mr-2">
                <svg class="text-gray-500 w-5 h-5" xmlns="http://www.w3.org/2000/svg"  width="800px" height="800px" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M13,13 L13,11 L22,11 L22,12 C22,17.5228475 17.5228475,22 12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C15.0799102,2 17.9312703,3.40249752 19.8167429,5.76259117 L18.2541652,7.01093042 C16.7442641,5.12094914 14.4653084,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 C16.0796177,20 19.4460082,16.9463116 19.9381062,13 L13,13 Z"/>
                </svg>
            </span><?php echo GoogleReferer::dwt_get_google_referer(get_the_ID()) ?></li>

            <!-- <?php //edit_post_link('ویرایش','<li class="flex gap-2 bg-[#E9E9E9] ml-2 p-2 text-[#64646C] md:text-[14px] text-[10px]"><span class="icons mr-2">
                // <svg class="text-gray-500 w-5 h-5" xmlns="http://www.w3.org/2000/svg"  width="800px" height="800px" viewBox="0 0 24 24">
                    // <path fill-rule="evenodd" d="M13,13 L13,11 L22,11 L22,12 C22,17.5228475 17.5228475,22 12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C15.0799102,2 17.9312703,3.40249752 19.8167429,5.76259117 L18.2541652,7.01093042 C16.7442641,5.12094914 14.4653084,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 C16.0796177,20 19.4460082,16.9463116 19.9381062,13 L13,13 Z"/>
                // </svg>
            // ','</span><?php echo GoogleReferer::dwt_get_google_referer(get_the_ID()) ?></li>','inline') ?> -->
        <?php endif; ?>
    </ul>
</div>

<?php $fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>
<div id="myModal" class="w-full modal">
    <!-- Modal content -->
    <div class="modal-content max-md:p-0 max-md:w-[95%] flex items-center justify-center">
        <div class="flex flex-col relative <?php echo $condition  ? 'bg-[#000]' : 'bg-[#F0F2F4]'; ?> items-center justify-center w-[95%] lg:w-[790px] ">
            <div class="flex relative  lg:justify-center lg:items-center max-lg:flex-col gap-y-4 lg:gap-x-14 lg:border-b border-[#004D29] max-lg:w-full pt-1 pb-4 lg:pb-8 lg:pt-10 w-[90%] ">
                <div onclick="closeModal()" class="lg:px-4 lg:absolute lg:top-[36%] left-0 flex items-center gap-x-2 max-lg:pl-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" class="max-lg:w-6" height="40" viewBox="0 0 40 40" fill="<?php echo $fill; ?>">
                        <mask id="mask0_685_1580" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                            <rect width="40" height="40" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_685_1580)">
                            <path d="M10.5785 30.4252L9.57422 29.421L18.9951 20L9.57422 10.5791L10.5785 9.57483L19.9994 18.9957L29.4204 9.57483L30.4246 10.5791L21.0037 20L30.4246 29.421L29.4204 30.4252L19.9994 21.0043L10.5785 30.4252Z" fill="<?php echo $fill; ?>" />
                        </g>
                    </svg>
                    <span class="<?php echo $condition  ? 'text-white' : 'text-black'; ?>">CLOSE</span>
                </div>
                <span class="lg:text-3xl text-2xl block max-lg:mx-auto <?php echo $condition  ? 'text-white' : 'text-black'; ?> whitespace-nowrap">BOOK APPOINTMENT</span>
            </div>
            <hr class="w-5/6 h-[2px] bg-[#004D29] lg:hidden" />
            <form method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" class="wordpress-ajax-form flex flex-col max-lg:w-4/6 w-3/6 md:gap-4 gap-2">
                <div class="mt-8">
                    <label for="name" class="text-2xl <?php echo $condition  ? 'text-white' : 'text-black'; ?>  text-left max-lg:text-base block mb-4">Name</label>

                    <input type="text" name="name" id="Your name" value="<?php echo is_user_logged_in() ? get_user_meta(get_current_user_id(), 'first_name', true) : ""; ?>" placeholder="Name" required oninvalid="this.setCustomValidity('Name is required')" oninput="setCustomValidity('')" class="py-2 px-4 outline-none w-full border placeholder:text-base placeholder:text-[#0000004D] border-black bg-white rounded-[5px]" />
                </div>
                <div class="flex flex-col mt-4">
                    <label for="location" class="text-2xl <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-left max-lg:text-base">Location</label>
                    <select type="text" name="location" id="location" class="py-2 px-4 rounded-[5px] mt-4 outline-none border placeholder:text-base placeholder:text-black text-black border-black bg-white">
                        <option value="1" class="text-[#0000004D]">Location</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Toronto">Toronto</option>
                    </select>
                </div>
                <div class="mt-4">
                    <label for="phone" class="text-2xl <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-left max-lg:text-base block mb-4">Your phone number</label>

                    <input placeholder="phone" type="tel" name="phone" id="phone-number" value="<?php echo is_user_logged_in() ? get_user_meta(get_current_user_id(), 'phone_number', true) : ""; ?>" placeholder="phone" required oninvalid="this.setCustomValidity('Mobile number is required')" oninput="setCustomValidity('')" class="py-2 px-4 outline-none w-full border placeholder:text-base placeholder:text-[#0000004D] rounded-[5px] border-black bg-white" />
                </div>
                <!-- <div class="flex flex-col mt-4 relative">
                    <label for="Appointment" class="text-2xl <?php //echo $condition  ? 'text-white' : 'text-black';
                                                                ?> text-left  max-lg:text-base block mb-4">Appointment</label>
                    <div class="relative w-full " id="calendarIcon">

                        <input type="text" autocomplete="true" required oninvalid="this.setCustomValidity('Data Shall not be empty')" oninput="setCustomValidity('')" id="Appointment2" placeholder="Appointment" class="border py-2  px-4   bg-transparent w-full outline-none  rounded-[5px]   placeholder:text-balance placeholder:text-[#0000004D] border-black bg-white " />


                        <a class="input-button" title="toggle" data-toggle>
                            <div class=" absolute top-[10px]  right-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="<?php echo $fill; ?>">
                                    <mask id="mask0_686_191" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_686_191)">
                                        <path d="M5.46152 20.9999C5.05191 20.9999 4.70592 20.8588 4.42355 20.5764C4.14118 20.294 4 19.948 4 19.5384V6.30762C4 5.898 4.14118 5.55201 4.42355 5.26964C4.70592 4.98727 5.05191 4.84609 5.46152 4.84609H7.42947V2.76917H8.3846V4.84609H15.6923V2.76917H16.5833V4.84609H18.5385C18.9481 4.84609 19.2941 4.98727 19.5764 5.26964C19.8588 5.55201 20 5.898 20 6.30762V19.5384C20 19.948 19.8588 20.294 19.5764 20.5764C19.2941 20.8588 18.9481 20.9999 18.5385 20.9999H5.46152ZM5.46152 20.1538H18.5385C18.6923 20.1538 18.8333 20.0897 18.9615 19.9615C19.0897 19.8333 19.1538 19.6923 19.1538 19.5384V10.5384H4.84615V19.5384C4.84615 19.6923 4.91025 19.8333 5.03845 19.9615C5.16665 20.0897 5.30767 20.1538 5.46152 20.1538ZM4.84615 9.69224H19.1538V6.30762C19.1538 6.15377 19.0897 6.01274 18.9615 5.88454C18.8333 5.75634 18.6923 5.69224 18.5385 5.69224H5.46152C5.30767 5.69224 5.16665 5.75634 5.03845 5.88454C4.91025 6.01274 4.84615 6.15377 4.84615 6.30762V9.69224ZM12 14.1538C11.7936 14.1538 11.6138 14.0772 11.4606 13.924C11.3074 13.7708 11.2308 13.591 11.2308 13.3846C11.2308 13.1781 11.3074 12.9983 11.4606 12.8451C11.6138 12.6919 11.7936 12.6153 12 12.6153C12.2064 12.6153 12.3862 12.6919 12.5394 12.8451C12.6926 12.9983 12.7692 13.1781 12.7692 13.3846C12.7692 13.591 12.6926 13.7708 12.5394 13.924C12.3862 14.0772 12.2064 14.1538 12 14.1538ZM8 14.1538C7.79358 14.1538 7.61377 14.0772 7.46057 13.924C7.30738 13.7708 7.23077 13.591 7.23077 13.3846C7.23077 13.1781 7.30738 12.9983 7.46057 12.8451C7.61377 12.6919 7.79358 12.6153 8 12.6153C8.20642 12.6153 8.38622 12.6919 8.53942 12.8451C8.69262 12.9983 8.76923 13.1781 8.76923 13.3846C8.76923 13.591 8.69262 13.7708 8.53942 13.924C8.38622 14.0772 8.20642 14.1538 8 14.1538ZM16 14.1538C15.7936 14.1538 15.6138 14.0772 15.4606 13.924C15.3074 13.7708 15.2308 13.591 15.2308 13.3846C15.2308 13.1781 15.3074 12.9983 15.4606 12.8451C15.6138 12.6919 15.7936 12.6153 16 12.6153C16.2064 12.6153 16.3862 12.6919 16.5394 12.8451C16.6926 12.9983 16.7692 13.1781 16.7692 13.3846C16.7692 13.591 16.6926 13.7708 16.5394 13.924C16.3862 14.0772 16.2064 14.1538 16 14.1538ZM12 17.9999C11.7936 17.9999 11.6138 17.9233 11.4606 17.7701C11.3074 17.6169 11.2308 17.4371 11.2308 17.2307C11.2308 17.0243 11.3074 16.8445 11.4606 16.6913C11.6138 16.5381 11.7936 16.4615 12 16.4615C12.2064 16.4615 12.3862 16.5381 12.5394 16.6913C12.6926 16.8445 12.7692 17.0243 12.7692 17.2307C12.7692 17.4371 12.6926 17.6169 12.5394 17.7701C12.3862 17.9233 12.2064 17.9999 12 17.9999ZM8 17.9999C7.79358 17.9999 7.61377 17.9233 7.46057 17.7701C7.30738 17.6169 7.23077 17.4371 7.23077 17.2307C7.23077 17.0243 7.30738 16.8445 7.46057 16.6913C7.61377 16.5381 7.79358 16.4615 8 16.4615C8.20642 16.4615 8.38622 16.5381 8.53942 16.6913C8.69262 16.8445 8.76923 17.0243 8.76923 17.2307C8.76923 17.4371 8.69262 17.6169 8.53942 17.7701C8.38622 17.9233 8.20642 17.9999 8 17.9999ZM16 17.9999C15.7936 17.9999 15.6138 17.9233 15.4606 17.7701C15.3074 17.6169 15.2308 17.4371 15.2308 17.2307C15.2308 17.0243 15.3074 16.8445 15.4606 16.6913C15.6138 16.5381 15.7936 16.4615 16 16.4615C16.2064 16.4615 16.3862 16.5381 16.5394 16.6913C16.6926 16.8445 16.7692 17.0243 16.7692 17.2307C16.7692 17.4371 16.6926 17.6169 16.5394 17.7701C16.3862 17.9233 16.2064 17.9999 16 17.9999Z" fill="black" />
                                    </g>
                                </svg>
                            </div>
                        </a>

                    </div>
                </div> -->
                <!-- <div class="flex flex-col items-start mt-4 gap-y-2 md:gap-y-4">
                    <label class="<?php //echo $condition  ? 'text-white' : 'text-black';
                                    ?> text-base md:text-2xl">Appointment</label>
                    <input id="birthday" placeholder="Appointment" type="text" name="Appointment" class="border p-2 md:p-4 bg-transparent w-full outline-none  " />
                </div> -->
                <!-- <div class="flex flex-col items-start  w-full mt-4 gap-y-2 md:gap-y-4">
                    <label class="<?php //echo $condition  ? 'text-white' : 'text-black';
                                    ?> text-base md:text-2xl">Appointment</label>
                    <div class="w-full relative">
                        <input value="<?php //echo date("Y/m/d");
                                        ?>" style="min-width: 90%;" id="birthday" placeholder="Birthday" type="text" name="Appointment" class="border !py-2 !px-4 !w-full min-w-full outline-none <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> text-base bg-white  rounded-[5px]  " />
                        <a class="input-button" title="toggle" data-toggle>
                            <div class=" absolute top-[10px]  right-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="<?php echo $fill; ?>">
                                    <mask id="mask0_686_191" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_686_191)">
                                        <path d="M5.46152 20.9999C5.05191 20.9999 4.70592 20.8588 4.42355 20.5764C4.14118 20.294 4 19.948 4 19.5384V6.30762C4 5.898 4.14118 5.55201 4.42355 5.26964C4.70592 4.98727 5.05191 4.84609 5.46152 4.84609H7.42947V2.76917H8.3846V4.84609H15.6923V2.76917H16.5833V4.84609H18.5385C18.9481 4.84609 19.2941 4.98727 19.5764 5.26964C19.8588 5.55201 20 5.898 20 6.30762V19.5384C20 19.948 19.8588 20.294 19.5764 20.5764C19.2941 20.8588 18.9481 20.9999 18.5385 20.9999H5.46152ZM5.46152 20.1538H18.5385C18.6923 20.1538 18.8333 20.0897 18.9615 19.9615C19.0897 19.8333 19.1538 19.6923 19.1538 19.5384V10.5384H4.84615V19.5384C4.84615 19.6923 4.91025 19.8333 5.03845 19.9615C5.16665 20.0897 5.30767 20.1538 5.46152 20.1538ZM4.84615 9.69224H19.1538V6.30762C19.1538 6.15377 19.0897 6.01274 18.9615 5.88454C18.8333 5.75634 18.6923 5.69224 18.5385 5.69224H5.46152C5.30767 5.69224 5.16665 5.75634 5.03845 5.88454C4.91025 6.01274 4.84615 6.15377 4.84615 6.30762V9.69224ZM12 14.1538C11.7936 14.1538 11.6138 14.0772 11.4606 13.924C11.3074 13.7708 11.2308 13.591 11.2308 13.3846C11.2308 13.1781 11.3074 12.9983 11.4606 12.8451C11.6138 12.6919 11.7936 12.6153 12 12.6153C12.2064 12.6153 12.3862 12.6919 12.5394 12.8451C12.6926 12.9983 12.7692 13.1781 12.7692 13.3846C12.7692 13.591 12.6926 13.7708 12.5394 13.924C12.3862 14.0772 12.2064 14.1538 12 14.1538ZM8 14.1538C7.79358 14.1538 7.61377 14.0772 7.46057 13.924C7.30738 13.7708 7.23077 13.591 7.23077 13.3846C7.23077 13.1781 7.30738 12.9983 7.46057 12.8451C7.61377 12.6919 7.79358 12.6153 8 12.6153C8.20642 12.6153 8.38622 12.6919 8.53942 12.8451C8.69262 12.9983 8.76923 13.1781 8.76923 13.3846C8.76923 13.591 8.69262 13.7708 8.53942 13.924C8.38622 14.0772 8.20642 14.1538 8 14.1538ZM16 14.1538C15.7936 14.1538 15.6138 14.0772 15.4606 13.924C15.3074 13.7708 15.2308 13.591 15.2308 13.3846C15.2308 13.1781 15.3074 12.9983 15.4606 12.8451C15.6138 12.6919 15.7936 12.6153 16 12.6153C16.2064 12.6153 16.3862 12.6919 16.5394 12.8451C16.6926 12.9983 16.7692 13.1781 16.7692 13.3846C16.7692 13.591 16.6926 13.7708 16.5394 13.924C16.3862 14.0772 16.2064 14.1538 16 14.1538ZM12 17.9999C11.7936 17.9999 11.6138 17.9233 11.4606 17.7701C11.3074 17.6169 11.2308 17.4371 11.2308 17.2307C11.2308 17.0243 11.3074 16.8445 11.4606 16.6913C11.6138 16.5381 11.7936 16.4615 12 16.4615C12.2064 16.4615 12.3862 16.5381 12.5394 16.6913C12.6926 16.8445 12.7692 17.0243 12.7692 17.2307C12.7692 17.4371 12.6926 17.6169 12.5394 17.7701C12.3862 17.9233 12.2064 17.9999 12 17.9999ZM8 17.9999C7.79358 17.9999 7.61377 17.9233 7.46057 17.7701C7.30738 17.6169 7.23077 17.4371 7.23077 17.2307C7.23077 17.0243 7.30738 16.8445 7.46057 16.6913C7.61377 16.5381 7.79358 16.4615 8 16.4615C8.20642 16.4615 8.38622 16.5381 8.53942 16.6913C8.69262 16.8445 8.76923 17.0243 8.76923 17.2307C8.76923 17.4371 8.69262 17.6169 8.53942 17.7701C8.38622 17.9233 8.20642 17.9999 8 17.9999ZM16 17.9999C15.7936 17.9999 15.6138 17.9233 15.4606 17.7701C15.3074 17.6169 15.2308 17.4371 15.2308 17.2307C15.2308 17.0243 15.3074 16.8445 15.4606 16.6913C15.6138 16.5381 15.7936 16.4615 16 16.4615C16.2064 16.4615 16.3862 16.5381 16.5394 16.6913C16.6926 16.8445 16.7692 17.0243 16.7692 17.2307C16.7692 17.4371 16.6926 17.6169 16.5394 17.7701C16.3862 17.9233 16.2064 17.9999 16 17.9999Z" fill="black" />
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </div>

                </div> -->
                <div class="flex flex-col items-start mt-4  gap-y-2 md:gap-y-4">
                    <label class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Date</label>
                    <div class="bg-white w-full rounded-[5px] ">
                        <input style="border-radius:5px" id="birthday" placeholder="Birthday" type="text" name="Appointment" value="<?php echo date("Y/m/d"); ?>" class="input_white border p-2  bg-transparent w-full rounded-[5px] outline-none <?php echo $condition  ? 'border-none ' : 'border-[#000] placeholder:text-[#0000004D]'; ?> " />
                    </div>

                </div>



                <input type="hidden" name="action" value="custom_action">
                <?php if (is_singular('jewelery')) : ?>
                    <input type="hidden" name="product" value="<?php echo the_title(); ?>">
                <?php endif; ?>
                <?php wp_nonce_field('custom_action_nonce', 'name_of_nonce_field'); ?>
                <div class="lg:pb-[64px] pb-10 flex items-center justify-center w-full">
                    <button title="SUBMIT" class="bg-[#004D29] text-white text-center uppercase w-1/2 py-4 mt-4 mx-auto">
                        SUBMIT
                    </button>
                </div>


            </form>
            <?php get_template_part('template-parts/common/modal-alert', 'modal-alert'); ?>
        </div>
    </div>
</div>

<!-- Subscription modal -->
<div id="subModal" class="w-full modal">
    <!-- Modal content -->
    <div class="modal-content max-md:p-0 max-md:w-[95%] flex items-center justify-center">
        <div class="flex flex-col relative <?php echo $condition  ? 'bg-[#000]' : 'bg-[#F0F2F4]'; ?>  items-center justify-center w-[95%] lg:w-[790px] ">
            <div class="flex relative  lg:justify-center lg:items-center max-lg:flex-col gap-y-4 lg:gap-x-14 lg:border-b border-[#004D29] max-lg:w-full pt-1 pb-4 lg:pb-8 lg:pt-10 w-[90%] ">
                <div onclick="closeModal('subModal')" class="lg:px-4 lg:absolute lg:top-[36%] left-0 flex items-center gap-x-2 max-lg:pl-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" class="max-lg:w-6" height="40" viewBox="0 0 40 40" fill="<?php echo $fill; ?>">
                        <mask id="mask0_685_1580" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                            <rect width="40" height="40" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_685_1580)">
                            <path d="M10.5785 30.4252L9.57422 29.421L18.9951 20L9.57422 10.5791L10.5785 9.57483L19.9994 18.9957L29.4204 9.57483L30.4246 10.5791L21.0037 20L30.4246 29.421L29.4204 30.4252L19.9994 21.0043L10.5785 30.4252Z" fill="<?php echo $fill; ?>" />
                        </g>
                    </svg>
                    <span class="<?php echo $condition  ? 'text-white' : 'text-black'; ?>">CLOSE</span>
                </div>
                <span class="lg:text-3xl text-2xl block max-lg:mx-auto <?php echo $condition  ? 'text-white' : 'text-black'; ?> whitespace-nowrap">subscribe to newsletter</span>
            </div>
            <hr class="w-5/6 h-[2px] bg-[#004D29] lg:hidden" />


            <form id="subscriptionForm" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" class="wordpress-ajax-form flex flex-col max-lg:w-4/6 w-3/6 md:gap-4 gap-2">
                <div class="mt-8 ">
                    <label for="name" class="text-2xl <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-left max-lg:text-base block mb-4">Email</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" value="<?php echo is_user_logged_in() ? wp_get_current_user()->user_email : ""; ?>" placeholder="Email" required oninvalid="this.setCustomValidity('Email is required')" oninput="setCustomValidity('')" class="py-2 px-4 outline-none w-full border placeholder:text-base placeholder:text-[#0000004D] border-black bg-white rounded-[5px] pr-[43px]" />


                        <svg class="absolute top-2 right-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="<?php echo $fill; ?>">
                            <mask id="mask0_2464_4471" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="red" />
                            </mask>
                            <g mask="url(#mask0_2464_4471)">
                                <path d="M4.46152 19C4.05191 19 3.70592 18.8588 3.42355 18.5764C3.14118 18.2941 3 17.9481 3 17.5385V6.46152C3 6.05191 3.14118 5.70592 3.42355 5.42355C3.70592 5.14118 4.05191 5 4.46152 5H19.5385C19.9481 5 20.2941 5.14118 20.5765 5.42355C20.8588 5.70592 21 6.05191 21 6.46152V17.5385C21 17.9481 20.8588 18.2941 20.5765 18.5764C20.2941 18.8588 19.9481 19 19.5385 19H4.46152ZM12 11.941L3.84615 6.53205V17.5385C3.84615 17.718 3.90384 17.8654 4.01923 17.9808C4.13461 18.0962 4.28204 18.1538 4.46152 18.1538H19.5385C19.718 18.1538 19.8654 18.0962 19.9808 17.9808C20.0962 17.8654 20.1539 17.718 20.1539 17.5385V6.53205L12 11.941ZM12 10.9795L19.818 5.84615H4.1987L12 10.9795ZM3.84615 6.53205V5.84615V17.5385C3.84615 17.718 3.90384 17.8654 4.01923 17.9808C4.13461 18.0962 4.28204 18.1538 4.46152 18.1538H3.84615V6.53205Z" fill="black" />
                            </g>
                        </svg>
                    </div>

                </div>


                <input type="hidden" name="action" value="custom_action">
                <?php if (is_singular('jewelery')) : ?>
                    <input type="hidden" name="product" value="<?php echo the_title(); ?>">
                <?php endif; ?>
                <?php wp_nonce_field('custom_action_nonce', 'name_of_nonce_field'); ?>
                <div class="lg:pb-[64px] pb-10 flex items-center justify-center w-full">
                    <button title="SUBMIT" class="bg-[#004D29] text-white text-center uppercase w-1/2 py-4 mt-4 mx-auto">
                        SUBMIT
                    </button>
                </div>


            </form>


        </div>


    </div>

</div>

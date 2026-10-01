<?php
$logged_in_user_information = wp_get_current_user();
$fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>

<div class="w-full border-b px-[15px] border-[#004D29] mt-[25px] pb-4 max-md:flex max-md:justify-between max-md:items-center max-md:mt-24  ">
  <div class="max-[768px]:min-w-[69px] max-[346px]:min-w-[52px] md:hidden ">
    <svg onclick="closeSidebar()" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="<?php echo $fill; ?>">
      <mask id="mask0_2036_3089" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32">
        <rect width="32" height="32" fill="<?php echo $fill; ?>" />
      </mask>
      <g mask="url(#mask0_2036_3089)">
        <path d="M8.46356 24.3401L7.66016 23.5367L15.1969 16L7.66016 8.46319L8.46356 7.65979L16.0003 15.1965L23.5371 7.65979L24.3405 8.46319L16.8038 16L24.3405 23.5367L23.5371 24.3401L16.0003 16.8034L8.46356 24.3401Z" fill="<?php echo $fill; ?>" />
      </g>
    </svg>
  </div>


  <div class="flex max-md:flex-col items-center justify-center ">

    <h4 class="flex  <?php echo $condition  ? 'text-white' : ''; ?> !font-['Montserrat'] justify-center text-[24px] md:text-[32px] text-nowrap">Welcome <h4 class="max-md:hidden  <?php echo $condition  ? 'text-white' : ''; ?> !font-['Montserrat'] justify-center text-[24px] md:text-[32px] text-nowrap">
        , <?php echo get_user_meta(get_current_user_id(), 'first_name', true) ? get_user_meta(get_current_user_id(), 'first_name', true) : "user"; ?>
      </h4>
    </h4>
    <h4 class="flex w-full md:hidden <?php echo $condition  ? 'text-white' : ''; ?> !font-['Montserrat'] justify-center text-[24px] md:text-[32px] text-nowrap">
      <?php echo get_user_meta(get_current_user_id(), 'first_name', true) ? get_user_meta(get_current_user_id(), 'first_name', true) : "user"; ?>
    </h4>
  </div>

  <a class="min-w-[52px] max-[460px]:text-end max-[460px]:max-w-[69px] max-md:text-[13px] md:hidden <?php echo $condition  ? 'text-white' : 'text-black'; ?>" href="<?php echo wp_logout_url(home_url("?action=logout"));
                                                                                                                                                                    ?>" class="text-sm text-black md:hidden <?php echo $condition  ? 'text-white' : ''; ?>">
    SIGN OUT
  </a>
</div>

<div class="w-full flex px-4 items-center justify-between mt-6">
  <button id="editProfile" class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> sidebarBtn font-normal">Personal information</button>
  <button id="subscribe" class=" <?php echo $condition  ? 'text-[#A8AAAB]' : 'text-[#A8AAAB]'; ?>  sidebarBtn font-normal">Subscribe </button>
</div>

<!-- subscribe form -->
<div id="subscribeForm" class="hidden px-8">
  <div class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-left mt-8 text-[18px]">
    <span class="">AMIR AMIR Emails</span>
    <p>
      By joining our email list, you will be the first to know about exciting new designs, special events, store openings and much more.</p>
  </div>


  <div class="w-full mt-8 overflow-y-auto scrollbar-hide loginForm">
    <form class="w-full flex flex-col " method="post">
      <div class="flex flex-col items-start gap-y-2 md:gap-y-4">
        <label class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Email</label>
        <input placeholder="Email" name="subemail" value="<?php echo (esc_attr($logged_in_user_information->user_email) ? esc_attr($logged_in_user_information->user_email) : $_POST['subemail']); ?>" class="border p-2 md:p-4 bg-transparent w-full outline-none <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> " />
      </div>
      <button title="SUBMIT" class="bg-[#004D29]  text-white text-center uppercase w-1/2 py-4 mt-8 md:mt-8">
        SUBMIT
      </button>
    </form>
  </div>

</div>

<!-- edit profile -->
<div id="editProfileForm" class="overflow-y-scroll  h-screen lg:pb-20 2xl:pb-10 pb-40  scrollbar-hide ">
  <div class="w-full mt-8 px-8 h-screen registerForm">
    <form class="w-full flex flex-col " id="update-profile-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">

      <div class="flex flex-col items-start gap-y-4">
        <label class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">First name</label>
        <input placeholder="First name" name="first_name" value="<?php echo esc_attr(get_user_meta($logged_in_user_information->ID, 'first_name', true)); ?>" class="border  <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none  " />
      </div>

      <div class="flex flex-col items-start mt-4 gap-y-2 md:gap-y-4">
        <label class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Second name</label>
        <input placeholder="Second name" name="second_name" value="<?php echo esc_attr(get_user_meta($logged_in_user_information->ID, 'last_name', true)); ?>" class="border p-2 md:p-4 bg-transparent w-full outline-none <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> " />
      </div>


      <div class="flex flex-col items-start mt-4 gap-y-2 md:gap-y-4">
        <label class="<?php echo $condition ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Email</label>
        <input type="email" placeholder="Email" name="email" value="<?php echo esc_attr($logged_in_user_information->user_email); ?>" class="border p-2 md:p-4 bg-transparent w-full outline-none <?php echo $condition ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?>" required oninvalid="this.setCustomValidity('Please enter a valid email address')" oninput="this.setCustomValidity('')" />
      </div>


      <div class="flex flex-col items-start mt-4 gap-y-2 md:gap-y-4">
        <label class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">phone number</label>
        <input type="tel" id="phone-number-profile" placeholder="phone number" name="phone_number" value="<?php echo esc_attr(get_user_meta($logged_in_user_information->ID, 'phone_number', true)); ?>" class="border p-2 md:p-4 bg-transparent w-full outline-none <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> " />
      </div>


      <div class="flex flex-col items-start mt-4 gap-y-2 md:gap-y-4">
        <label class="<?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Birthday</label>
        <input id="birthday" placeholder="Birthday" type="text" name="birthday" value="<?php echo esc_attr(get_user_meta($logged_in_user_information->ID, 'birthday', true) ?: date('Y/m/d')); ?>" class="border p-2 md:p-4 bg-transparent w-full outline-none <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> " />
      </div>
      <input type="hidden" name="action" value="update_user_profile">
      <?php wp_nonce_field('update_user_profile_nonce', 'update_user_profile_nonce'); ?>
      <button type="submit" class="bg-[#004D29] text-white text-center uppercase w-1/2 py-[14px] md:py-4 mt-[13px]  md:mt-4 mx-auto">
        SUBMIT
      </button>
    </form>
  </div>

</div>

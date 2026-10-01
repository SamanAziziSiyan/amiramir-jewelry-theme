<?php $fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>
<!-- create form -->
<div id="signUpForm" class="overflow-y-scroll h-full pb-20  scrollbar-hide ">

  <div class="authForm  h-screen overflow-auto  mt-8  w-full lg:w-[420px]">


    <form id="registrationForm" action="<?php echo esc_url(site_url()); ?>" method="post" class="w-full px-8 flex flex-col">

      <div class="flex flex-col items-start gap-y-4">
        <label for="first_name" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">First name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First name" class="border <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none " />
      </div>

      <div class="flex flex-col items-start mt-8 gap-y-2 md:gap-y-4">
        <label for="second_name" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Second name</label>
        <input type="text" id="second_name" name="second_name" placeholder="Second name" class="border <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none " />
      </div>

      <div class="flex flex-col items-start mt-8 gap-y-2 md:gap-y-4">
        <label for="user_email" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Email</label>
        <input type="email" id="user_email" name="user_email" placeholder="Email" class="border <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none " required oninvalid="this.setCustomValidity('Please enter a valid email address')" oninput="this.setCustomValidity('')" />
      </div>

      <div class="flex flex-col items-start mt-8 gap-y-2 md:gap-y-4">
        <label for="user_password" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Password</label>
        <input type="password" id="user_password" name="user_password" placeholder="Password" class="border <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none " required />
      </div>
      <!-- Add this to your registration form -->
      <?php wp_nonce_field('ajax-register-nonce', 'reg-security'); ?>

      <input type="submit" name="wp-submit" value="Submit" class="bg-[#004D29] text-white text-center uppercase w-1/2 py-4 mt-8 md:mt-16 mx-auto">


    </form>
  </div>
</div>
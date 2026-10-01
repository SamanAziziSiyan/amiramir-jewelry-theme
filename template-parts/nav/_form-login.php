<?php $fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>
<!-- login form -->
<div id="signInForm" class="authForm  w-full lg:w-[420px] mt-8 px-8 hidden">



  <form class="w-full flex flex-col" name="loginform" id="loginform" action="<?php echo esc_url(site_url()); ?>" method="post">

    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">


    <div class="flex flex-col items-start mt-8 gap-y-2 md:gap-y-4">
      <label for="user_login" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Email</label>
      <input required placeholder="Email" name="log" id="user_login" class="border <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none  " />
    </div>

    <div class="flex flex-col items-start mt-8 gap-y-2 md:gap-y-4">
      <label for="user_pass" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> text-base md:text-2xl">Password</label>
      <input required type="password" placeholder="Password" name="pwd" id="user_pass" class="border <?php echo $condition  ? 'border-white placeholder:text-white text-white' : 'border-[#000] placeholder:text-[#0000004D]'; ?> p-2 md:p-4 bg-transparent w-full outline-none  " />
    </div>
    <div class="flex flex-col items-start mt-2 gap-y-2 md:gap-y-4">

      <button type="button" onclick="togglePasswordForm()" class="text-base  <?php echo $condition  ? 'text-white' : 'text-black'; ?>">
        Forgot your password?
      </button>
    </div>
    <?php do_action('login_form'); ?>
    <?php wp_nonce_field('ajax-login-nonce', 'log-security'); ?>

    <input type="submit" name="wp-submit" id="wp-submit" value="Submit" class="bg-[#004D29] text-white text-center uppercase w-1/2 py-4 mt-8 md:mt-16 mx-auto">
  </form>
</div>
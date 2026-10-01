<?php $fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>
<div class="w-full lg:w-[420px] border-b px-[15px] border-[#004D29] mt-[25px] pb-4 max-md:flex max-md:justify-between max-md:items-center max-md:mt-24  ">
  <svg onclick="closeSidebar()" class="md:hidden" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
    <mask id="mask0_2036_3089" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32">
      <rect width="32" height="32" fill="#D9D9D9" />
    </mask>
    <g mask="url(#mask0_2036_3089)">
      <path d="M8.46356 24.3401L7.66016 23.5367L15.1969 16L7.66016 8.46319L8.46356 7.65979L16.0003 15.1965L23.5371 7.65979L24.3405 8.46319L16.8038 16L24.3405 23.5367L23.5371 24.3401L16.0003 16.8034L8.46356 24.3401Z" fill="<?php echo $fill; ?>" />
    </g>
  </svg>
  <h4 class="flex w-full justify-center !font-['Montserrat'] <?php echo $condition  ? 'text-white' : 'text-black'; ?>  text-[24px] md:text-[32px]">Create account</h4>
</div>


<div class="w-full flex items-center justify-between mt-6">
  <button id="signUp" class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?> sidebarBtn text-[#A8AAAB]   px-8 font-normal">Create account</button>
  <button id="signIn" class="   sidebarBtn text-[#A8AAAB] px-8 font-normal">Log in </button>
</div>

<?php get_template_part('template-parts/nav/_form-register', '_form-register'); ?>
<?php get_template_part('template-parts/nav/_form-login', '_form-login'); ?>
<?php get_template_part('template-parts/nav/_form-forget-password', '_form-forget-password'); ?>
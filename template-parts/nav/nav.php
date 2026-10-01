<?php get_template_part('template-parts/nav/_sidebar-menu', '_sidebar-menu'); ?>
<?php get_template_part('template-parts/nav/_search', '_search'); ?>
<!-- End Header Section -->

<?php $fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>

<div class="hidden  w-full h-screen modalFillter max-md:z-[992] top-0 z-[999] fixed">
  <div class="  flex w-full h-full  justify-end    ">
    <div id="sidebarWrapper" class="<?php echo $condition  ? 'bg-[#000]' : 'bg-[#F0F2F4]'; ?> w-0 h-full  transition-all delay-200 duration-700 animate-menu  scrollbar-hide">
      <div class="w-full h-full   md:px-10 <?php echo $condition  ? 'bg-[#000]' : 'bg-[#F0F2F4]'; ?>">
        <div class="max-md:hidden  flex items-center gap-x-2 mt-8 justify-between">
          <div onclick="closeSidebar()" class="flex items-center gap-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="<?php echo $fill; ?>">
              <mask fill="<?php echo $fill; ?>" id="mask0_2036_3089" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32">
                <rect width="32" height="32" fill="<?php echo $fill; ?>" />
              </mask>
              <g mask="url(#mask0_2036_3089)" fill="<?php echo $fill; ?>">
                <path d="M8.46356 24.3401L7.66016 23.5367L15.1969 16L7.66016 8.46319L8.46356 7.65979L16.0003 15.1965L23.5371 7.65979L24.3405 8.46319L16.8038 16L24.3405 23.5367L23.5371 24.3401L16.0003 16.8034L8.46356 24.3401Z" fill="<?php echo $fill; ?>" />
              </g>
            </svg>
            <span class=" <?php echo $condition  ? 'text-white' : 'text-black'; ?>">CLOSE</span>
          </div>
          <?php if (is_user_logged_in()) :  ?>
            <a class="<?php echo $condition  ? 'text-white' : 'text-black'; ?>" href="<?php echo wp_logout_url(home_url("?action=logout"));
                                                                                      ?>" class="uppercase">sign out</a>
          <?php endif; ?>
        </div>
        <?php get_template_part('template-parts/nav/alert', 'alert'); ?>




        <?php if (is_user_logged_in()) :   ?>
          <div id="wishlist_sidebar" class="hidden w-full lg:w-[420px]">
            <?php get_template_part('template-parts/nav/_sidebar-wishlist', '_sidebar-wishlist'); ?>
          </div>
          <div id="account_sidebar" class="hidden    w-full lg:w-[420px]">
            <?php get_template_part('template-parts/nav/_sidebar-profile', '_sidebar-profile'); ?>
          </div>
        <?php endif  ?>


        <?php if (!is_user_logged_in()) :   ?>

          <?php get_template_part('template-parts/nav/_sidebar-auth', '_sidebar-auth'); ?>
        <?php endif  ?>


      </div>
    </div>
  </div>
</div>
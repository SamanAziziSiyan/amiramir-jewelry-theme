<?php $fill = is_page('the-house') || is_page('location')  || is_page('high-jewelery-single-page-2')  ? 'white' : 'black';
$condition = is_page('the-house') || is_page('location') || is_page('high-jewelery-single-page-2');
?>
<div class="w-full border-b px-[15px] border-[#004D29] mt-[25px] pb-4 max-md:flex max-md:justify-between max-md:items-center max-md:mt-24  ">
  <svg onclick="closeSidebar()" class="md:hidden" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
    <mask id="mask0_2036_3089" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32">
      <rect width="32" height="32" fill="#D9D9D9" />
    </mask>
    <g mask="url(#mask0_2036_3089)">
      <path d="M8.46356 24.3401L7.66016 23.5367L15.1969 16L7.66016 8.46319L8.46356 7.65979L16.0003 15.1965L23.5371 7.65979L24.3405 8.46319L16.8038 16L24.3405 23.5367L23.5371 24.3401L16.0003 16.8034L8.46356 24.3401Z" fill="<?php echo $fill; ?>" />
    </g>
  </svg>
  <h4 class="flex w-full justify-center <?php echo $condition  ? 'text-white' : 'text-black'; ?> mr-[22.6px] !font-['Montserrat']  text-[24px] md:text-[32px]">MY WISHLIST</h4>
</div>

<div class="relative overflow-y-auto scrollbar-hide">
  <div class="w-full h-screen pb-48 mt-4 flex flex-col items-center gap-8 px-3 md:px-10 overflow-y-auto scrollbar-hide">

    <?php
    if (is_user_logged_in()) {
      $user_id = get_current_user_id();
      $wishlist = get_user_meta($user_id, 'wishlist', true);

      if (!empty($wishlist)) {
        $wishlist = array_reverse($wishlist);
        foreach ($wishlist as $product_id) {
          // Get product information based on the product ID
          $product_post = get_post($product_id);

          // Check if the product post exists
          if ($product_post && $product_post->post_type === 'jewelery') {


    ?>
            <div class="whishlist_item  <?php echo $condition  ? 'bg-black hover:bg-[#212121d1] !text-white' : 'bg-white !text-black hover:bg-[#ffffff6b]'; ?>  transition-all duration-500 delay-100 w-full h-full max-w-[320px] max-h-[320px] md:min-h-[320px]  max-[375px]:w-[240px] max-[375px]:h-[240px] flex items-center justify-center relative">
              <img src="<?php echo get_the_post_thumbnail_url($product_id); ?>" class=" max-md:w-[240px] max-md:h-[240px] sm:max-h-[320px]" />

              <div class="w-full h-full flex opacity-0 wishlist_content    <?php echo $condition  ? 'backdrop-blur-md' : 'backdrop-blur-sm'; ?> absolute top-0  items-center justify-center  flex-col gap-2 px-10 transition-all delay-200 duration-500">
                <h3><?php echo get_the_title($product_id); ?></h3>
                <hr class="w-full border  border-[#004D29] " />
                <h3><?php echo get_the_title($product_id); ?></h3>
                <a href="<?php echo get_the_permalink($product_id); ?>" class="bg-transparent border mt-8 <?php echo $condition  ? ' border-white' : 'border-black '; ?> p-2">DISCOVER</a>
              </div>
            </div>

    <?php
          }
        }
      } else {
        $wishlist_empty = "<span class='text-gray-400'>Your wishlist is empty.</span>";
        echo $wishlist_empty;
      }
    } else {
      echo 'Please log in to view your wishlist.';
    }

    ?>

  </div>
</div>
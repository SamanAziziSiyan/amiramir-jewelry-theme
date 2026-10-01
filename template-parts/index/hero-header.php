<?php
$jewp_options = get_option('theme_settings');
$jewp_options = is_array($jewp_options) ? $jewp_options : array();
$placeholder = get_template_directory_uri() . '/assets/images/placeholder.svg';
$desktop_poster = !empty($jewp_options['main_images'][0]) ? $jewp_options['main_images'][0] : $placeholder;
$mobile_poster = !empty($jewp_options['main_image_mobile'][0]) ? $jewp_options['main_image_mobile'][0] : $desktop_poster;
$desktop_video = !empty($jewp_options['main_video']) ? $jewp_options['main_video'] : '';
$mobile_video = !empty($jewp_options['main_video_mobile']) ? $jewp_options['main_video_mobile'] : '';
$page_url = jewp_get_page_url_by_template('High-jewelery-single-3.php');
$hero_link = !empty($jewp_options['main_page_header_link']) ? $jewp_options['main_page_header_link'] : $page_url;
?>
<section data-id="1" id="solix1" class="relative z-10 w-full solix">
  <?php if ($desktop_video) : ?>
    <video class="hidden md:flex min-h-screen lg:object-top max-2xl:!object-cover 2xl:w-full" poster="<?php echo esc_url($desktop_poster); ?>" src="<?php echo esc_url($desktop_video); ?>" preload="metadata" autoplay muted loop playsinline></video>
  <?php else : ?>
    <img class="hidden md:flex min-h-screen w-full object-cover" src="<?php echo esc_url($desktop_poster); ?>" alt="" />
  <?php endif; ?>
  <?php if ($mobile_video) : ?>
    <video class="md:hidden min-h-screen h-screen !object-cover w-full" poster="<?php echo esc_url($mobile_poster); ?>" src="<?php echo esc_url($mobile_video); ?>" preload="metadata" autoplay muted loop playsinline></video>
  <?php else : ?>
    <img class="md:hidden min-h-screen h-screen w-full object-cover" src="<?php echo esc_url($mobile_poster); ?>" alt="" />
  <?php endif; ?>
  <div class="absolute top-[20%] max-md:top-[29%] max-md:left-[4%] max-md:w-[90%] md:left-[3%] xl:left-[11%] flex flex-col items-start gap-4">
    <h1 class="text-black uppercase max-md:text-[28px] text-5xl font-normal"><?php echo esc_html($jewp_options['main_page_header_title'] ?? 'AMIRAMIR'); ?></h1>
    <span class="text-black text-2xl text-left max-md:text-base font-normal">
      <?php echo esc_html($jewp_options['main_page_header_desc'] ?? 'Jewelry and design'); ?><br class="max-[322px]:hidden" />
      <?php echo esc_html($jewp_options['main_page_header_desc_short'] ?? 'A custom WordPress theme.'); ?>
    </span>
    <a class="w-auto uppercase border border-black px-20 py-4 max-md:py-2 max-md:px-8" href="<?php echo esc_url($hero_link); ?>">Discover</a>
  </div>
</section>

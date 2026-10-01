<section data-id="4" id="section4" class="page section pb-12 max-lg:px-0 lg:px-24 2xl:px-[188px]">
  <div class="rounded mx-auto">
    <!-- Tabs -->
    <ul id="tabs" class="inline-flex items-center justify-center pt-2 px-1 w-full md:mb-12">
      <li class="md:px-8 px-4 md:text-[24px] text-base  py-4 rounded-t   -mb-px">
        <a href="#first">Ring</a>
      </li>
      <li class="md:px-8 px-4 md:text-[24px] text-base text-black py-4 rounded-t">
        <a href="#second">Earrings</a>
      </li>
      <li class="md:px-8 px-4 md:text-[24px] text-base text-black py-4 rounded-t">
        <a href="#third">Necklace </a>
      </li>
    </ul>

    <!-- Tab Contents -->
    <div id="tab-contents">
      <?php get_template_part('template-parts/index/ring-Tab', 'ring-Tab'); ?>
      <?php get_template_part('template-parts/index/earing-Tab', 'earing-Tab'); ?>
      <?php get_template_part('template-parts/index/necklace-Tab', 'necklace-Tab'); ?>
    </div>
  </div>
</section>
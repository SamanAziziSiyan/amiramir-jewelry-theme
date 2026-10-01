<!-- Start Key Section -->
<div style="min-height: 100vh" id="endKeySection" class="h-400vh relative z-[991]  ">
  <section style="min-height: 100vh" class="  h-screen sticky overflow-hidden top-0 z-[998]">
    <div class="relative">
      <div style="min-height: 100vh" id="keySection" class="w-full z-[991] h-full bg-[url('./assets/images/placeholder.svg')]  lg:bg-[url('./assets/images/placeholder.svg')] top-0 bg-no-repeat bg-cover bg-center transition-all delay-200 ease-linear unset">
        <img id="keyImage" src="<?php echo get_template_directory_uri();
                                ?>/assets/images/placeholder.svg" class="once opacity-0 absolute md:top-0 left-[10%] xl:w-[15%] lg:w-[17%] 2xl:w-[13%] w-[25%] max-md:w-[45%] " alt="key" />
        <img id="lockImage" src="<?php echo get_template_directory_uri();
                                  ?>/assets/images/placeholder.svg" class="once absolute object-contain   hidden lg:-top-[72px] max-lg:-top-[12px] xl:top-0 left-[8%] md:left-[5%] sm:w-[19%] w-[60%] lg:w-[20%] lg:left-[8%]  md:w-[35%] transition-all delay-300 ease-linear" alt="key" />



      </div>
      <div id="keyButton" class="bg-transparent  z-[999] flex  items-start absolute md:bottom-[56px] bottom-[37px]  md:pr-[45px]   md:justify-end justify-start max-md:pl-4 max-md:flex-col gap-y-5  w-full">
        <div class="flex max-md:flex-col md:w-5/6 xl:w-3/6 md:flex-wrap md:justify-between justify-center gap-y-5 items-center">
          <a href="<?php echo site_url("the-collection"); ?>" class="   max-md:w-max   border-[1px] border-solid md:order-2 border-white px-10 md:px-16 py-4 text-white text-[16px] font-normal uppercase whitespace-nowrap">
            <span class="hidden md:inline-block"> key and lock collection</span>
            <span class="inline-block md:hidden uppercase text-base text-white">DISCOVER</span>

          </a>
          <img id="mobilePendingGif" width="40" height="40" class="w-[40px] h-[40px] md:w-16 md:h-16 opacity-0 cursor-pointer" />
        </div>

      </div>
    </div>


  </section>
</div>


<!-- <div class="h-full bg-red-400 w-full"></div> -->
<!-- End Key Section -->


<!-- <div class="relative" style="min-height: 100vh">

        <div class="relative h-400vh w-full" id="keySection">
          <div class="sticky top-0  bg-[url('./assets/images/placeholder.svg')]  lg:bg-[url('./assets/images/placeholder.svg')] z-0 h-100vh overflow-hidden bg-no-repeat bg-cover bg-center">



            <img id="key" src="<?php echo get_template_directory_uri();
                                ?>/assets/images/placeholder.svg" class="    absolute top-[-22px] left-[10%] xl:w-[15%] lg:w-[17%] 2xl:w-[13%] w-[25%] max-md:w-[45%] z-20 rounded-md p-3 transition-all duration-500 first item" alt="key" />
            <img id="lock" src="<?php echo get_template_directory_uri();
                                ?>/assets/images/placeholder.svg" class="  absolute object-contain  sm:w-[19%] w-[60%] lg:w-[20%] lg:left-[8%]  md:w-[35%] transition-all  ease-linear -top-8 z-20 rounded-md p-3 duration-500 first item" alt="key" />
          </div>
        </div>

        <div id="keyButton" class="bg-transparent absolute z-[99] flex items-center md:pr-[45px] -mt-[126px] md:justify-end justify-start max-md:pl-4  w-full">
          <a href="<?php //echo site_url("the-collection");
                    ?>" class="   max-md:w-max   border-[1px] border-solid border-white px-10 md:px-16 py-4 text-white text-[16px] font-normal uppercase whitespace-nowrap">
            <span class="hidden md:inline-block"> key and lock collection</span>
            <span class="inline-block md:hidden uppercase text-base text-white">DISCOVER</span>
          </a>

        </div>

      </div> -->

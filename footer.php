<?php

/**
 * jeweleryTemplate's archive.php
 *
 * @package jeweleryTemplate archive.php
 * @since jeweleryTemplate 1.0
 */

?>



<?php wp_footer(); ?>


<!-- Initialize Swiper -->


<script>
  flatpickr("#Appointment2");
  flatpickr("#birthday");




  var swiper = new Swiper(".mySwiper", {
    slidesPerView: "auto",
    spaceBetween: 92,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      10: {
        slidesPerView: 2,
        spaceBetween: 10,
      },

      480: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 50,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 70,
      },
      1440: {
        slidesPerView: 3,
        spaceBetween: 92,
      },

    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var singlePageSwiper = new Swiper(".singlePageSwiper", {
    slidesPerView: 1,
    spaceBetween: 80,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".button-next",
      prevEl: ".button-prev",
      hide: true, // Hide default navigation icons

    },
  });


  var singlePageSwiper = new Swiper(".locationSwiper", {
    slidesPerView: 1,
    spaceBetween: 5,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".button-next-location",
      prevEl: ".button-prev-location",
      hide: true, // Hide default navigation icons

    },
  });
</script>

</body>

</html>

<!-- Footer Section -->
<footer class="page section <?php echo is_page('the-house') || is_page('high-jewelery-single-page-2') ? "bg-black text-white" : ""; ?> border-t border-[#004D29] py-10">
  <div class="w-full h-full flex md:flex-row flex-col items-center justify-between md:px-10 px-4 max-md:gap-y-8 <?php echo is_page('the-house') || is_page('high-jewelery-single-page-2') ? "bg-black text-white" : "bg-[#F0F2F4]"; ?> ">
    <div class="flex flex-col items-start text-left">
      <span class="<?php echo is_page('the-house') || is_page('high-jewelery-single-page-2') ? "text-white" : "text-black"; ?>  text-[24px] mb-4 inline-block">contact us</span>
      <ul class="<?php echo is_page('the-house') || is_page('high-jewelery-single-page-2') ? "text-white" : "text-black"; ?> flex items-start justify-start flex-col">
        <li>Please email us at: <a class="text-blue-400" href="#contact">Contact</a></li>
        <li>Location details available on request</li>
        <li>Phone number: <a href="#contact">Contact us</a></li>
        <li><button onclick="openModal()">Book an Appointment with us</button></li>
      </ul>
    </div>
    <div class="lg:pr-[156px] flex flex-col items-center">
      <button onclick="openModal('subModal')" class="flex items-center border-[1px] border-solid <?php echo is_page('the-house') || is_page('high-jewelery-single-page-2') ? "border-white" : "border-black"; ?> md:px-20 md:py-4 py-2 px-8">
        <?php if (is_page('the-house') || is_page('high-jewelery-single-page-2')) : ?>
          <svg xmlns="http://www.w3.org/2000/svg" class="max-md:w-6" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <mask id="mask0_850_4657" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="33" height="32">
              <rect x="0.5" width="32" height="32" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_850_4657)">
              <path d="M6.4487 25.3334C5.90254 25.3334 5.44122 25.1452 5.06473 24.7687C4.68824 24.3922 4.5 23.9309 4.5 23.3847V8.61545C4.5 8.06929 4.68824 7.60797 5.06473 7.23148C5.44122 6.85499 5.90254 6.66675 6.4487 6.66675H26.5513C27.0975 6.66675 27.5588 6.85499 27.9353 7.23148C28.3118 7.60797 28.5 8.06929 28.5 8.61545V23.3847C28.5 23.9309 28.3118 24.3922 27.9353 24.7687C27.5588 25.1452 27.0975 25.3334 26.5513 25.3334H6.4487ZM16.5 15.9214L5.6282 8.70948V23.3847C5.6282 23.624 5.70512 23.8206 5.85897 23.9744C6.01281 24.1283 6.20939 24.2052 6.4487 24.2052H26.5513C26.7906 24.2052 26.9872 24.1283 27.141 23.9744C27.2949 23.8206 27.3718 23.624 27.3718 23.3847V8.70948L16.5 15.9214ZM16.5 14.6394L26.9239 7.79495H6.09827L16.5 14.6394ZM5.6282 8.70948V7.79495V23.3847C5.6282 23.624 5.70512 23.8206 5.85897 23.9744C6.01281 24.1283 6.20939 24.2052 6.4487 24.2052H5.6282V8.70948Z" fill="white" />
            </g>
          </svg>
        <?php else : ?>
          <svg width="41" height="41" class="max-md:w-6" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="mask0_493_1007" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="41" height="41">
              <rect x="0.5" y="0.875977" width="40" height="40" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_493_1007)">
              <path d="M7.93587 32.5423C7.25318 32.5423 6.67653 32.307 6.20592 31.8364C5.73531 31.3658 5.5 30.7891 5.5 30.1064V11.6449C5.5 10.9622 5.73531 10.3855 6.20592 9.9149C6.67653 9.44429 7.25318 9.20898 7.93587 9.20898H33.0641C33.7468 9.20898 34.3235 9.44429 34.7941 9.9149C35.2647 10.3855 35.5 10.9622 35.5 11.6449V30.1064C35.5 30.7891 35.2647 31.3658 34.7941 31.8364C34.3235 32.307 33.7468 32.5423 33.0641 32.5423H7.93587ZM20.5 20.7774L6.91025 11.7624V30.1064C6.91025 30.4056 7.0064 30.6513 7.19871 30.8436C7.39101 31.0359 7.63674 31.1321 7.93587 31.1321H33.0641C33.3633 31.1321 33.609 31.0359 33.8013 30.8436C33.9936 30.6513 34.0898 30.4056 34.0898 30.1064V11.7624L20.5 20.7774ZM20.5 19.1748L33.5299 10.6192H7.49783L20.5 19.1748ZM6.91025 11.7624V10.6192V30.1064C6.91025 30.4056 7.0064 30.6513 7.19871 30.8436C7.39101 31.0359 7.63674 31.1321 7.93587 31.1321H6.91025V11.7624Z" fill="black" />
            </g>
          </svg>
        <?php endif; ?>
        SUBSCRIBE
      </button>
      <div class="flex items-center gap-x-8 max-md:mb-8 md:gap-x-16 mt-12">
        <a href="<?php echo esc_url("#contact"); ?>">
          Follow us
        </a>
        <?php if (is_page('the-house') || is_page('high-jewelery-single-page-2')) : ?>
          <a href="<?php echo esc_url("#contact"); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="max-md:w-6" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path d="M22.1918 31.7883H9.77263C4.4807 31.7883 0.175781 27.4834 0.175781 22.1918V9.77263C0.175781 4.4807 4.4807 0.175781 9.77263 0.175781H22.1918C27.4834 0.175781 31.7883 4.4807 31.7883 9.77263V22.1918C31.7883 27.4834 27.4834 31.7883 22.1918 31.7883ZM9.77263 1.93203C5.44945 1.93203 1.93203 5.44945 1.93203 9.77263V22.1918C1.93203 26.5146 5.44945 30.032 9.77263 30.032H22.1918C26.5146 30.032 30.032 26.5146 30.032 22.1918V9.77263C30.032 5.44945 26.5146 1.93203 22.1918 1.93203H9.77263Z" fill="white" />
              <path d="M16.0735 24.763C11.2821 24.763 7.38428 20.8648 7.38428 16.0737C7.38428 11.2823 11.2824 7.38452 16.0735 7.38452C20.8649 7.38452 24.7631 11.2827 24.7631 16.0737C24.7631 20.8648 20.8649 24.763 16.0735 24.763ZM16.0735 9.14077C12.2505 9.14077 9.14053 12.2507 9.14053 16.0737C9.14053 19.8964 12.2505 23.0067 16.0735 23.0067C19.8969 23.0067 23.0068 19.8968 23.0068 16.0737C23.0068 12.2507 19.8969 9.14077 16.0735 9.14077Z" fill="white" />
              <path d="M25.1761 8.7286C26.1489 8.7286 26.9376 7.93994 26.9376 6.96708C26.9376 5.99423 26.1489 5.20557 25.1761 5.20557C24.2032 5.20557 23.4146 5.99423 23.4146 6.96708C23.4146 7.93994 24.2032 8.7286 25.1761 8.7286Z" fill="white" />
            </svg>
          </a>
        <?php else : ?>
          <a href="<?php echo esc_url("#contact"); ?>">
            <svg width="40" height="41" class="max-md:w-6" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.7397 40.3428H12.2158C5.60088 40.3428 0.219727 34.9616 0.219727 28.3471V12.8232C0.219727 6.2083 5.60088 0.827148 12.2158 0.827148H27.7397C34.3542 0.827148 39.7354 6.2083 39.7354 12.8232V28.3471C39.7354 34.9616 34.3542 40.3428 27.7397 40.3428ZM12.2158 3.02246C6.81181 3.02246 2.41504 7.41923 2.41504 12.8232V28.3471C2.41504 33.7507 6.81181 38.1475 12.2158 38.1475H27.7397C33.1433 38.1475 37.54 33.7507 37.54 28.3471V12.8232C37.54 7.41923 33.1433 3.02246 27.7397 3.02246H12.2158Z" fill="black" />
              <path d="M20.0922 31.5609C14.103 31.5609 9.23071 26.6882 9.23071 20.6994C9.23071 14.7102 14.1034 9.83789 20.0922 9.83789C26.0815 9.83789 30.9542 14.7106 30.9542 20.6994C30.9542 26.6882 26.0815 31.5609 20.0922 31.5609ZM20.0922 12.0332C15.3135 12.0332 11.426 15.9207 11.426 20.6994C11.426 25.4777 15.3135 29.3656 20.0922 29.3656C24.8714 29.3656 28.7589 25.4782 28.7589 20.6994C28.7589 15.9207 24.8714 12.0332 20.0922 12.0332Z" fill="black" />
              <path d="M31.47 11.5181C32.686 11.5181 33.6719 10.5322 33.6719 9.31616C33.6719 8.10008 32.686 7.11426 31.47 7.11426C30.2539 7.11426 29.2681 8.10008 29.2681 9.31616C29.2681 10.5322 30.2539 11.5181 31.47 11.5181Z" fill="black" />
            </svg>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<?php get_template_part('template-parts/common/modal', 'modal'); ?>

</div>
jQuery.noConflict();
/*
 * *********************************
 * Element Declarations
 * *********************************
 */
const bodyEl = document.getElementsByTagName("body");
const currentMenu = document.getElementById("currentMenu");
const subMenu = document.getElementById("subMenu");
const menuLevelOne = document.getElementById("menuLevelOne");
const houseDimond = document.getElementById("house-dimond");
const houseZ = document.getElementById("houseZ");
const collentionImage = document.getElementById("collentionImage");
const keySection = document.getElementById("keySection");
const textBlur = document.getElementById("textBlur");
const collectionLock = document.getElementById("collectionLock");
const menuArrow = document.getElementById("menuArrow");
const collectionAnimate = document.getElementById("collectionAnimate");
const houseHeader = document.getElementById("houseHeader");
const navSection = document.getElementById("navSection");
const houseAnimate = document.getElementById("houseAnimate");
const houseAnimateImage = document.getElementsByClassName("houseAnimateImage");
const keyCollection = document.getElementById("keyCollection");
const rightKey = document.getElementById("rightKey");
const leftKey = document.getElementById("leftKey");
const keyButton = document.getElementById("keyButton");
const subCurrenMenu = document.getElementById("subCurrenMenu");
const singleContent = document.getElementById("single-content-section");
const isSubMenu = document.querySelectorAll(".isSubMenu");
const phone = document.getElementById("phone-number");
const phoneProfile = document.getElementById("phone-number-profile");
const lockImage = document.getElementById("lockImage");
const keyImage = document.getElementById("keyImage");
const mobilePendingGif = document.getElementById("mobilePendingGif");
const collectionImageSection = document.getElementById(
  "collectionImageSection"
);
const tabsContainer = document.querySelector("#tabs");
const isSafari = navigator.userAgent.match(/Version\/([0-9._]+).*Safari/);
//get browser url
let url = window.location.pathname;
let filename = url.substring(url.lastIndexOf("/") + 1);

/*
 * *********************************
 * Start Common functions used
 * *********************************
 */

function showToast(type, message, section = "") {
  jQuery(`#${section}toast-${type}`).fadeIn().css("display", "flex");
  jQuery(`#${section}${type}message`).html(message);
  setTimeout(function () {
    jQuery(`#${section}toast-${type}`).fadeOut();
  }, 5000);
}

const searchElementToggler = (target) => {
  jQuery(`${target}`)
    .fadeToggle()
    .animate(
      {
        opacity: 1,
      },
      200
    )
    .css("display", "flex");
};
const hiddenSearchElement = () => {
  jQuery("#mobileSearchEl").fadeOut().animate(
    {
      opacity: 0,
    },
    200
  );
  jQuery("#desktopSearchEl").fadeOut().animate(
    {
      opacity: 0,
    },
    200
  );
};

function scrollToBottom() {
  window.scrollTo({
    top: document.body.scrollHeight,
    behavior: "smooth",
  });
}
function openNav() {
  bodyEl[0].style.overflow = "hidden";
  hiddenSearchElement();
  if (
    window.navigator.userAgent.indexOf("Linux") != -1 ||
    window.navigator.userAgent.indexOf("Win") != -1
  ) {
    subCurrenMenu.classList.add("animate-menu");
    subCurrenMenu.addEventListener("animationend", function () {
      if (
        window.location.href.search("/the-house") != -1 ||
        window.location.href.search("/location") != -1 ||
        window.location.href.search("/high-jewelery-single-page-2") != -1
      ) {
        subCurrenMenu.style.background = "rgb(0 0 0 / 70%)";
        currentMenu.style.background = "rgb(0 0 0 / 91%)";
        this.style.filter = "blur(24px)";
        this.style.backdropFilter = "blur(24px)";
      } else {
        this.style.filter = "blur(24px)";
        this.style.backdropFilter = "blur(24px)";
      }
    });
  } else {
    if (
      window.location.href.search("/the-house") != -1 ||
      window.location.href.search("/location") != -1 ||
      window.location.href.search("/high-jewelery-single-page-2") != -1
    ) {
      subCurrenMenu.style.background = "rgb(0 0 0 / 70%)";
      currentMenu.style.background = "rgb(0 0 0 / 91%)";
      subCurrenMenu.style.filter = "blur(0)";
      subCurrenMenu.style.backdropFilter = "blur(0)";
    } else {
      subCurrenMenu.style.background = "rgb(255 255 255 / 70%)";
      currentMenu.style.background = "rgb(255 255 255 / 91%)";
      subCurrenMenu.style.filter = "blur(0)";
      subCurrenMenu.style.backdropFilter = "blur(0)";
    }
  }
  // currentMenu.style.backdropFilter = "blur(2px)";

  if (window.innerWidth < 768) {
    subCurrenMenu.style.width = "100%";
    currentMenu.style.width = "100%";
  } else {
    subCurrenMenu.style.width = "400px";
    currentMenu.style.width = "400px";
  }
  menuLevelOne.classList.remove("hidden");
  subMenu.classList.add("hidden");
}

function closeNav() {
  bodyEl[0].style.overflow = "auto";

  subCurrenMenu.classList.remove("animate-menu");
  for (let i = 0; i < isSubMenu.length; i++) {
    isSubMenu[i].classList.remove("!text-[#004D29]");
    if (
      window.location.href.search("/the-house") != -1 ||
      window.location.href.search("/location") != -1 ||
      window.location.href.search("/high-jewelery-single-page-2") != -1
    ) {
      isSubMenu[i].style.color = "#fff";
      menuArrow.style.fill = "#fff";
    } else {
      isSubMenu[i].style.color = "#000";
      menuArrow.style.fill = "#000";
    }
  }
  currentMenu.style.width = "0";
  subCurrenMenu.style.width = "0";
}

function wishlist_sidebar_toggle() {
  bodyEl[0].style.overflow = "hidden";

  hiddenSearchElement();
  jQuery(".modalFillter").fadeIn();
  if (window.innerWidth < 768) {
    jQuery("#sidebarWrapper").animate(
      {
        width: "100%",
      },
      500
    );
  } else {
    jQuery("#sidebarWrapper").animate(
      {
        width: "500px",
      },
      500
    );
  }
  jQuery("#wishlist_sidebar").fadeIn();
  jQuery("#account_sidebar").fadeOut();
}

function account_sidebar_toggle() {
  bodyEl[0].style.overflow = "hidden";
  hiddenSearchElement();
  jQuery(".modalFillter").fadeIn();
  if (window.innerWidth < 768) {
    jQuery("#sidebarWrapper").animate(
      {
        width: "100%",
      },
      500
    );
  } else {
    jQuery("#sidebarWrapper").animate(
      {
        width: "500px",
      },
      500
    );
  }

  jQuery("#account_sidebar").fadeIn();
  jQuery("#wishlist_sidebar").fadeOut();
}

function closeSidebar() {
  bodyEl[0].style.overflow = "auto";

  jQuery("#sidebarWrapper").animate(
    {
      width: "0px",
    },
    {
      duration: 700,
      complete: function () {
        setTimeout(function () {
          jQuery(".modalFillter").fadeOut();
        }, 700); //
      },
    }
  );

  // jQuery(".modalFillter").hide();
}

function togglePasswordForm() {
  jQuery("#ForgetPassword").fadeIn();
  jQuery("#signInForm").fadeOut();
}

const toggleSearch = () => {
  if (window.innerWidth < 1024) searchElementToggler("#mobileSearchEl");
  else searchElementToggler("#desktopSearchEl");
};

const openSubMenu = (element) => {
  if (currentMenu.offsetWidth == "750") {
    currentMenu.style.width = "400px";
    subCurrenMenu.style.width = "400px";

    element.classList.remove("!text-[#004D29]");
    if (
      window.location.href.search("/the-house") != -1 ||
      window.location.href.search("/location") != -1 ||
      window.location.href.search("/high-jewelery-single-page-2") != -1
    ) {
      element.style.color = "#fff";
      menuArrow.style.fill = "#fff";
    } else {
      element.style.color = "#000";
      menuArrow.style.fill = "#000";
    }

    if (window.innerWidth > 769) {
      setTimeout(() => {
        subMenu.classList.toggle("hidden");
      }, 500);
    } else {
      subMenu.classList.toggle("hidden");
    }
  } else if (currentMenu.offsetWidth == "400") {
    element.classList.add("!text-[#004D29]");
    element.style.color = "#004D29";

    currentMenu.style.width = "750px";
    subCurrenMenu.style.width = "750px";

    menuArrow.style.fill = "#004D29";
    // currentMenu.style.width = "400px";

    if (window.innerWidth > 769) {
      setTimeout(() => {
        subMenu.classList.toggle("hidden");
      }, 500);
    } else {
      subMenu.classList.toggle("hidden");
    }
  }
  // if (window.innerWidth > 766) {
  //   element.classList.add("!text-[#004D29]");
  //   currentMenu.style.width = "750px";
  //   menuArrow.style.fill = "#004D29";
  //   subMenu.classList.toggle("hidden");
  // }
  if (window.innerWidth <= 768 && currentMenu.offsetWidth != "400") {
    setTimeout(() => {
      menuLevelOne.classList.toggle("hidden");
      subMenu.classList.toggle("hidden");
    }, 500);
  }
};

function openModal(modalID = "myModal") {
  let modal = document.getElementById(modalID);
  modal.style.display = "flex";
  bodyEl[0].style.overflow = "hidden";
}

function closeModal(modalID = "myModal") {
  let modal = document.getElementById(modalID);
  bodyEl[0].style.overflow = "auto";
  modal.style.display = "none";
}

function scrollHandler() {
  requestAnimationFrame(sectionsAnimation);
}

/*
 * *********************************
 * End Common functions used
 * *********************************
 */

/*
 * *********************************
 * Event Listeners Definitions
 * *********************************
 */
window.addEventListener("DOMContentLoaded", function () {
  jQuery("#preload").fadeOut();
});
window.addEventListener("load", async function () {
  bodyEl[0].style.overflow = "auto";
  if (bodyEl[0].classList.contains("admin-bar") && window.scrollY < 10) {
    navSection.style.top = "32px";
  }
  if (phone) {
    phone.value = "+971";
  }

  if (
    bodyEl[0].classList.contains("admin-bar") &&
    window.scrollY < 40 &&
    window.innerWidth < 768
  ) {
    currentMenu.style.top = "49px";
  }
  if (
    window.location.href.search("/the-house") != -1 ||
    window.location.href.search("/location") != -1 ||
    window.location.href.search("/high-jewelery-single-page-2") != -1
  ) {
    document.getElementById("theme-color-meta").setAttribute("content", "#000");
  }
});

if (phoneProfile) {
  phoneProfile.addEventListener("keydown", function (e) {
    if (e.target.value == "") {
      phoneProfile.value = "+";
    }
  });
  phoneProfile.addEventListener("change", function (e) {
    if (e.target.value == "") {
      phoneProfile.value = "+";
    }
  });
}
phone.addEventListener("change", function (e) {
  if (e.target.value == "") {
    phone.value = "+";
  }
});

window.addEventListener("scroll", function () {
  scrollHandler();
});

window.addEventListener("touchmove", function () {
  scrollHandler();
});

window.addEventListener("keydown", function () {
  scrollHandler();
});

window.addEventListener("DOMMouseScroll", function () {
  scrollHandler();
});

/*
 * *********************************
 * AmirAmir Animations
 * *********************************
 */
const sectionsAnimation = () => {
  // var parallax = document.getElementById("jew_parallax");
  // var parallax2 = document.getElementById("jew_parallax2");
  // var imageSection = document.getElementById("imageSection");
  // let parallax2OffsetTop = parallax2.offsetTop;

  // console.log(window.scrollY);
  // if (parallax) {
  //   if (window.scrollY > 10) {
  //     navSection.style.opacity = 0;
  //   }
  //   if (window.scrollY < 10) {
  //     navSection.style.opacity = 1;
  //   }
  //   if (parallax2OffsetTop - 100 < window.scrollY) {
  //     navSection.style.opacity = 1;
  //   }
  //   var scrolledHeight = window.pageYOffset;
  //   parallax.style.transform = "translateY(" + scrolledHeight * -2 + "px)";
  //   if (window.scrollY > 400) {
  //     imageSection.style.position = "fixed";
  //     parallax2.style.transform =
  //       "translateY(" + scrolledHeight * -0.08 + "px)";
  //   }

  //   // parallax.style.transform = "translateY(0px)";
  //   // parallax2.style.transform = "translateY(0px)";
  // }

  /*
   * *********************************
   * handle single jewelery header
   * *********************************
   */
  if (singleContent) {
    if (window.scrollY > 150) {
      navSection.style.opacity = 0;
    }
    if (window.scrollY < 50) {
      navSection.style.opacity = 1;
    }
    let singleContentTop = singleContent.offsetTop;
    if (window.scrollY > singleContentTop) {
      navSection.style.opacity = 1;
    }
  }

  /*
   * *********************************
   * homepage Key and Lock animation
   * *********************************
   */
  if (keySection) {
    let keySectionPosition = keySection.getBoundingClientRect();
    let { top, height } = keySection.getBoundingClientRect();
    if (top <= 0 && height + top > 0) {
      if ((height + top) * 3.3 > window.innerHeight) {
        if (keySection.classList.contains("unset")) {
          navSection.style.transition = "none";
          navSection.style.opacity = 0;
          keySection.style.position = "fixed";
          keySection.style.bottom = "0";
          keySection.style.top = "auto";
          keySection.style.left = "0";
          keySection.style.height = "100vh";
          navSection.style.zIndex = 100;

          lockImage.classList.remove("hidden");

          lockImage.classList.add("animate-firstAnimation");
          keyButton.style.position = "fixed";
        } else {
          keySection.style.position = "unset";
          keySection.style.bottom = "0";
          keySection.style.top = "auto";
          keySection.style.left = "0";
        }
      }
      lockImage.addEventListener("animationstart", function () {
        mobilePendingGif.style.opacity = "1";
        mobilePendingGif.src = `${window.location.origin}/wp-content/themes/jewelery/assets/images/placeholder.svg`;
      });
      lockImage.addEventListener("animationend", function () {
        lockImage.style.display = "block";
        lockImage.style.opacity = 1;
        if (window.scrollY > 2500) {
          window.scrollTo(0, keySectionPosition.bottom - 20);
        }

        let timerOne = setTimeout(() => {
          mobilePendingGif.style.opacity = 0;
          window.scrollTo(0, window.scrollY + 1);
          clearTimeout(timerOne);
        }, 3000);
        window.addEventListener("scroll", (e) => {
          mobilePendingGif.style.opacity = 0;
          clearTimeout(timerOne);
          lockImage.style.display = "none";

          keyImage.classList.add("animate-secondAnimation");

          keyImage.addEventListener("animationend", function () {
            navSection.style.transition = "all .2s ease-in-out .2s";
            this.style.opacity = "1";

            let timerTow = setTimeout(() => {
              endHomeAnimation();
            }, 500);

            let endHomeAnimation = () => {
              let endKeySection = document.getElementById("endKeySection");
              let offsetTop = endKeySection.offsetTop;

              window.scrollTo({ top: offsetTop });
              endKeySection.style.height = "100vh";
              // mobilePendingGif.style.opacity = "0";
              keySection.style.position = "unset";
              keySection.classList.remove("unset");
              keyButton.style.position = "absolute";
              navSection.style.opacity = 1;
              navSection.style.zIndex = 999;

              clearTimeout(timerTow);
            };
          });
        });
      });
    } else {
      navSection.style.opacity = 1;
    }
  }
  /*
   * *********************************
   * nav and menu positioning
   * *********************************
   */
  if (bodyEl[0].classList.contains("admin-bar")) {
    if (window.innerWidth < 601) {
      if (window.scrollY < 35) {
        currentMenu.style.top = "48px";
        navSection.style.top = "32px";
      } else {
        currentMenu.style.top = "0";
        navSection.style.top = "0";
      }
    } else if (window.innerWidth < 1279) {
      if (window.scrollY < 35) {
        navSection.style.top = "32px";
        currentMenu.style.top = "48px";
      } else {
        navSection.style.top = "32px";
        currentMenu.style.top = "48px";
      }
    } else {
      currentMenu.style.top = "48px";
      navSection.style.top = "32px";
    }
  }
  /*
   * *********************************
   * Collection Key and Lock animation
   * *********************************
   */
  if (window.location.href.search("/the-collection") != -1) {
    let collectionAnimatePosition = collentionImage.getBoundingClientRect();
    let keyCollectionPosition = keyCollection.getBoundingClientRect();
    if (
      keyCollection.classList.contains("unset") &&
      keyCollectionPosition.top <= 0
    ) {
      rightKey.classList.remove("opacity-0");
      keyCollection.style.position = "fixed";
      keyCollection.classList.add("startAnimate");
      rightKey.classList.add("animate-rightKeyAnimation");
      rightKey.addEventListener("animationend", function () {
        if (window.scrollY > 2200) {
          window.scrollTo(0, 0);
        }
        window.addEventListener("scroll", (e) => {
          leftKey.classList.remove("opacity-0");
          leftKey.classList.add("animate-leftKeyAnimation");
          leftKey.addEventListener("animationend", function () {
            window.addEventListener("scroll", function () {});
            collectionAnimate.style.opacity = 1;

            keyCollection.style.position = "unset";
            keyCollection.classList.remove("unset");
            let collectionEnd = document.getElementById("collectionEnd");
            collectionEnd.style.height = "100vh";
            this.style.opacity = "1";
            keyCollection.classList.remove("startAnimate");
            window.scrollTo(0, 0);
          });
        });
      });
    }

    if (
      collectionAnimatePosition.top <= 0 &&
      collectionImageSection.classList.contains("unset") &&
      !keyCollection.classList.contains("startAnimate")
    ) {
      let endCollectionAnimate = document.getElementById(
        "endCollectionAnimate"
      );
      collectionImageSection.style.position = "fixed";
      // collectionImageSection.classList.add("animate-rightKeyAnimation");
      navSection.style.opacity = 0;

      collentionImage.classList.add("absolute");
      collentionImage.classList.add("animate-hiddenAnimation");
      endCollectionAnimate.style.zIndex = 993;
      collentionImage.addEventListener("animationend", function () {
        collectionLock.classList.add("animate-secondAnimation");

        // collectionLock.addEventListener("animationstart", function () {
        //   mobilePendingGif.style.opacity = "1";
        //   mobilePendingGif.src = `${window.location.origin}/jewellery-wp/jew-panjere/wp-content/themes/jewelery/assets/images/placeholder.svg`;
        // });
        if (window.scrollY > 2200) {
          window.scrollTo(0, collectionAnimatePosition.bottom - 140);
        }
        collectionLock.addEventListener("animationend", function () {
          if (window.scrollY > 2200) {
            window.scrollTo(0, collectionAnimatePosition.bottom - 140);
          }
          this.style.opacity = 1;
          textBlur.classList.add("animate-blurAnimation-text");
          textBlur.classList.remove("opacity-0");

          textBlur.addEventListener("animationend", function () {
            endCollectionAnimate.style.zIndex = 990;

            collectionImageSection.style.position = "unset";
            collectionImageSection.style.position = "unset";
            collectionImageSection.classList.remove("unset");

            navSection.style.opacity = 1;
            endCollectionAnimate.style.height = "100vh";
            window.scrollTo(0, collectionAnimatePosition.bottom);
          });

          // window.addEventListener("scroll", (e) => {
          //   // textBlur.classList.add("animate-blurAnimation-text");
          //   // textBlur.classList.remove("opacity-0");
          //   // textBlur.addEventListener("animationend", function () {
          //   //   endCollectionAnimate.style.zIndex = 990;
          //   //   collectionImageSection.style.position = "unset";
          //   //   collectionImageSection.style.position = "unset";
          //   //   collectionImageSection.classList.remove("unset");
          //   //   navSection.style.opacity = 1;
          //   //   endCollectionAnimate.style.height = "100vh";
          //   //   window.scrollTo(0, collectionAnimatePosition.bottom);
          //   // });
          // });
        });
      });
    }
  }

  /*
   * *********************************
   * The House text and diamond animation
   * *********************************
   */
  if (
    window.location.href.search("/the-house") != -1 ||
    window.location.href.search("/location") != -1 ||
    window.location.href.search("/high-jewelery-single-page-2") != -1
  ) {
    if (houseAnimate) {
      let houseAnimatePosition = houseAnimate.getBoundingClientRect();
      if (houseAnimatePosition.top < 300) {
        if (window.innerWidth > 769) {
          houseAnimateImage[0].classList.add("animate-blurAnimation");
          houseAnimateImage[2].classList.add("animate-blurAnimationReverse");
        } else {
          houseAnimateImage[1].classList.add("animate-blurAnimation");
          houseAnimateImage[2].classList.add("animate-blurAnimationReverse");
        }
      }
    }

    if (window.scrollY > 10 && !navSection.classList.contains("!bg-black")) {
      navSection.classList.add("!bg-black");
      navSection.style.backgroundColor = "#000";
    }
    if (window.scrollY < 10) {
      navSection.classList.remove("!bg-black");
      navSection.style.backgroundColor = "";
    }
  } else {
    if (
      window.scrollY > 10 &&
      !navSection.classList.contains("!bg-[#F0F2F4]")
    ) {
      navSection.classList.add("!bg-[#F0F2F4]");
      navSection.style.backgroundColor = "#F0F2F4";
    }

    if (window.scrollY < 10) {
      navSection.style.backgroundColor = "";
      navSection.classList.remove("!bg-[#F0F2F4]");
    }
  }
};

/*
 * *********************************
 * Start of other functionalities
 * *********************************
 */
if (mobilePendingGif) {
  mobilePendingGif.onclick = () => {
    mobilePendingGif.src = `${window.location.origin}/wp-content/themes/jewelery/assets/images/placeholder.svg`;
    window.scrollTo(0, window.scrollY + 1);
    if (keyImage.classList.contains("animate-secondAnimation")) {
      let endKeySection = document.getElementById("endKeySection");
      let offsetTop = endKeySection.offsetTop;
      window.scrollTo({ top: offsetTop });

      endKeySection.style.height = "100vh";
      mobilePendingGif.style.opacity = "0";
      keySection.style.position = "unset";
      keySection.classList.remove("unset");
      keyButton.style.position = "absolute";
      navSection.style.transition = "all .3s";
      navSection.style.opacity = 1;
    }
  };
}

if (houseDimond) {
  houseDimond.addEventListener("animationend", function () {
    this.style.filter = "blur(12px)";
  });
}
if (houseZ) {
  houseZ.addEventListener("animationend", function () {
    this.style.filter = "blur(12px)";
  });
}
if (collentionImage) {
  collentionImage.addEventListener("animationend", function () {
    this.classList.add("opacity-0");
  });
}
if (textBlur) {
  textBlur.addEventListener("animationend", function () {
    this.classList.remove("opacity-0");
  });
}

/*
 * *********************************
 * End of other functionalities
 * *********************************
 */

/*
 * *********************************
 * jQuery ajax and onload functions
 * *********************************
 */
jQuery(document).ready(function ($) {
  /*
   * *********************************
   * toggle home page swiper tabs
   * **********************************
   */

  if (tabsContainer) {
    jQuery("#tabs li:first-child").addClass("activeTab");
    jQuery(".tab-contents").hide();
    jQuery(".tab-contents:first").show();

    jQuery("#tabs li").click(function () {
      jQuery("#tabs li").removeClass("activeTab");
      jQuery(this).addClass("activeTab");
      jQuery(".tab-contents").hide();

      var activeTab = jQuery(this).find("a").attr("href");
      jQuery(activeTab).fadeIn();
      return false;
    });
  }
  /*
   * *********************************
   * sidebar form button switch
   * *********************************
   */
  jQuery("#signUp").on("click", function () {
    bodyEl[0].style.overflow = "hidden";

    jQuery("#signInForm").fadeOut();
    jQuery("#signUpForm").fadeIn();
    jQuery("#ForgetPassword").fadeOut();
  });

  jQuery("#signIn").on("click", function () {
    jQuery("#signInForm").fadeIn();
    jQuery("#signUpForm").fadeOut();
    jQuery("#ForgetPassword").fadeOut();
  });

  jQuery("#subscribe").on("click", function () {
    jQuery("#subscribeForm").fadeIn();
    jQuery("#editProfileForm").fadeOut();
  });

  jQuery("#editProfile").on("click", function () {
    jQuery("#editProfileForm").fadeIn();
    jQuery("#subscribeForm").fadeOut();
  });
  /*
   * *********************************
   * sidebar auth button switch
   * *********************************
   */
  jQuery(".sidebarBtn").click(function () {
    if (
      window.location.href.search("/the-house") != -1 ||
      window.location.href.search("/location") != -1 ||
      window.location.href.search("/high-jewelery-single-page-2") != -1
    ) {
      jQuery(".sidebarBtn").css("color", "#A8AAAB");
      jQuery(this).css("color", "white");
    } else {
      jQuery(".sidebarBtn").removeClass("activeButtenColor");
      jQuery(".sidebarBtn").addClass("inActive");
      jQuery(this).addClass("activeButtenColor");
      jQuery(this).removeClass("inActive");
    }
  });

  /*
   * *********************************
   * appoinment modal form ajax request
   * *********************************
   */
  jQuery(".wordpress-ajax-form").on("submit", function (e) {
    e.preventDefault();

    var $form = $(this);
    jQuery("#loading").fadeIn();
    $.post(
      $form.attr("action"),
      $form.serialize(),
      function (data) {
        jQuery("#loading").fadeOut("fast"); //hide when data's ready
        if (data.success == true) {
          showToast("success", data.message, "m");
          e.target[0].value = "";
          e.target[1].value = "";
          e.target[2].value = "";
        } else {
          e.target[0].value = "";
          e.target[1].value = "";
          e.target[2].value = "";
          showToast("danger", data.message, "m");
        }
      },
      "json"
    );
  });
  /*
   * *********************************
   * like form ajax request
   * *********************************
   */
  jQuery(".like-button").on("click", function () {
    var $button = jQuery(this);
    var productId = $button.data("product-id");

    // Use AJAX to send the product ID to the server
    jQuery.ajax({
      url: my_ajax_object.ajax_url,
      type: "post",
      data: {
        action: "handle_like_button_click",
        product_id: productId,
        wishlist_nonce: my_ajax_object.wishlist_nonce,
      },
      success: function (response) {
        // Toggle the button text based on the server response
        if (response === "added") {
          jQuery(".liked").attr("fill", "#CE0000");
        } else if (response === "removed") {
          jQuery(".liked").attr("fill", "black");
          jQuery(".likedBody").attr("fill", "none");
        }
      },
      error: function (error) {},
    });
  });

  /*
   * *********************************
   * login form ajax request
   * *********************************
   */
  jQuery("#loginform").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();

    jQuery.ajax({
      type: "POST",
      url: my_ajax_object.ajax_url,
      data: formData + "&action=custom_user_login",
      dataType: "json",
      success: function (response) {
        if (response.success) {
          // Login successful
          window.location.href = "/";
          showToast("success", response.message);
        } else {
          setTimeout(function () {
            showToast("danger", response.message);
          }, 500); // Adjust the delay as needed
        }
      },
      error: function (xhr, status, error) {
        // Handle AJAX errors
      },
    });
  });

  /*
   * *********************************
   * registration form ajax request
   * *********************************
   */
  jQuery("#registrationForm").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();

    $.ajax({
      type: "POST",
      url: my_ajax_object.ajax_url,
      data: formData + "&action=custom_user_registration",
      success: function (response) {
        var responseData = typeof response === "string" ? $.parseJSON(response) : response;

        if (responseData.success) {
          // Registration successful
          showToast("success", responseData.message);
          setTimeout(function () {
            closeSidebar();
          }, 2500);
          setTimeout(function () {
            window.location.href = window.location.origin;
          }, 3000);
        } else {
          showToast("danger", responseData.message);
        }
      },
    });
  });

  /*
   * *********************************
   * Update Profile form ajax request
   * *********************************
   */
  jQuery("#update-profile-form").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();

    jQuery.ajax({
      type: "POST",
      url: my_ajax_object.ajax_url,
      data: formData + "&action=update_user_profile",
      dataType: "json",
      success: function (response) {
        if (response.success) {
          // Profile Update successful
          showToast("success", response.message);
          setTimeout(function () {
            closeSidebar();
          }, 2000);
        } else {
          showToast("danger", response.message);
        }
      },
      error: function (xhr, status, error) {
        // Handle AJAX errors
      },
    });
  });

  /*
   * *********************************
   * search form ajax request
   * *********************************
   */
  jQuery(".searchInput, .searchInputMobile").keyup(function (event) {
    event.preventDefault(); // Prevent default form submission
    var searchQuery = jQuery(this).val(); // Get search query from the input field
    var searchResultContainer;

    // Check if the current input is for desktop or mobile
    if (jQuery(this).hasClass("searchInput")) {
      // For desktop
      searchResultContainer = jQuery(this)
        .closest("#desktopSearchEl")
        .find(".search-result");
    } else {
      // For mobile
      searchResultContainer = jQuery(this)
        .closest("#mobileSearchEl")
        .find(".search-result");
    }
    searchResultContainer.css("background", "white");

    jQuery.ajax({
      url: my_ajax_object.ajax_url, // AJAX handler URL
      type: "POST",
      data: {
        action: "search_functionality", // Action hook to identify AJAX request
        search_query: searchQuery, // Pass search query data
      },
      success: function (response) {
        // Clear previous search results
        searchResultContainer.empty();

        // Check if the response contains an error
        if (response.error) {
          // Display error message
          searchResultContainer.text(response.error);
        } else {
          // Loop through each result in the response
          jQuery.each(response, function (index, result) {
            if (result.type === "page" || result.type === "jewelery") {
              var item = jQuery('<div class="col-span-1 flex justify-evenly items-center gap-x-4"></div>');
              item.append(jQuery('<img width="20%" alt="">').attr("src", result.thumbnail));
              var link = jQuery('<a class="text-[10px] whitespace-nowrap"></a>')
                .attr("href", result.permalink)
                .text(result.title + (result.type === "page" ? " (page)" : " (product)"));
              item.append(link);
              searchResultContainer.append(item);
            }
            // Append HTML to search results container
          });
        }
      },
    });
  });

    /*
     * *********************************
     * subscription form ajax request
     * *********************************
     */
    jQuery("#subscriptionForm").on("submit", function (e) {
      e.preventDefault();
      jQuery("#subModal").fadeOut();
    });

    /*
     * *********************************
     * forget password form ajax request
     * **********************************
     */
    jQuery("#ForgetPasswordForm").submit(function (e) {
      e.preventDefault(); // Prevent default form submission
      var userEmail = jQuery(this).find('input[name="userEmail"]').val();

      jQuery.ajax({
        type: "POST",
        url: my_ajax_object.ajax_url,
        data: {
          action: "forgot_password_ajax",
          userEmail: userEmail,
          reset_nonce: my_ajax_object.reset_nonce,
        },
        dataType: "json",
        success: function (response) {
          if (response.success) {
            // Registration successful
            showToast("success", response.message);
            setTimeout(function () {
              closeSidebar();
            }, 2000);
          } else {
            showToast("danger", response.message);
          }
        },
        error: function (xhr, status, error) {
          // Handle error response
          console.error(xhr.responseText);
          // You can display an error message to the user here
        },
      });
    });
});

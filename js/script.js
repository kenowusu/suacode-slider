const suaslider = jQuery('.suaslider-container');
const prevButton = jQuery("#myPrevButton");
const nextButton = jQuery("#myNextButton");


suaslider.slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows:true,
    prevArrow:prevButton,
    nextArrow:nextButton,
    mobileFirst:true,
    // centerPadding:40,

    responsive: [
        {
          breakpoint:640,
          settings: {
            arrows: true,
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },

        {
          breakpoint:1024,
          settings: {
            arrows: true,
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },

      ]
  });
const slider = jQuery('.suaslider-container');
const prevButton = jQuery("#myPrevButton");
const nextButton = jQuery("#myNextButton");

const  news = jQuery('.suanews-container');
const newsPrevButton = jQuery('#newsPrevButton');
const newsNextButton = jQuery('#newsNextButton');
slider.slick({
    mobileFirst:true,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows:true,
    prevArrow:prevButton,
    nextArrow:nextButton,
    draggable:false,


    responsive: [
        {
          breakpoint:640,
          settings: {
            arrows: true,
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        }
      ]
  });

  //===========slick news ===========
  news.slick({
    mobileFirst:true,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows:true,
    prevArrow:newsPrevButton,
    nextArrow:newsNextButton,
    draggable:false,
    responsive: [
        {
          breakpoint:640,
          settings: {
            arrows: true,
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },

        {
          breakpoint:1060,
          settings: {
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },


      ]
  });

  
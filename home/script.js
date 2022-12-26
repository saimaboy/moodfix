
jQuery(document).ready(function(){
 var $ = jQuery,
     $navButtons = $(".btn");
 
 slideFunctions();

 function slideFunctions(){
  var $slideShow      =  $(".slide-show"),
      $slideImg       =  $(".slide-img"),
      $slideItem      =  $(".slide-item"),
      $indicator      =  $("[rol='low-indicator']"),
      slideLoopCount  =  0,
      slideOffset     =  0;
        
    const SLIDE_TIME = 5000;

    initSlider();
    

 // functions
  function initSlider(){
   $navButtons.on('mouseover', blurSlider);
   $navButtons.on('mouseleave', quitSliderBlur);
   changeSlide();
  }

 function changeSlide(){
   setInterval(change, SLIDE_TIME);
   $indicator.eq(slideLoopCount).animate({width:"100%"}, SLIDE_TIME);

      function change(){
        if(slideLoopCount < $slideImg.length - 1){
          slideLoopCount++;
          slideOffset -= 100;
          $slideShow.animate({left: slideOffset + "vw"}, 1000);
          $indicator.eq(slideLoopCount).animate({width:"100%"}, SLIDE_TIME);
        }else{
          slideLoopCount = 0 ;
          slideOffset = 0;
          $slideShow.animate({left: slideOffset}, 1000);
          $indicator.animate({width:"1%"}, 200);
          $indicator.eq(slideLoopCount).animate({width:"100%"}, SLIDE_TIME);
        }         
      }
    }

    function blurSlider(){
     $slideShow.addClass("blur-slide");
    }

    function quitSliderBlur(){
     $slideShow.removeClass("blur-slide");
    }
  }
  //  end slidefunctions
});
$(document).ready(function(){

$('.carousel').carousel({
         elements: {       // which navigational elements to show
        prevNext: false,   // buttons for previous / next slide
        handles: true,    // button for each slide showing its index
        counter: false     // "Slide x of y"
    },
    behavior: {
        horizontal: true, // set to false for vertical slider
        circular: true,  // go to first slide after last one
        autoplay: 0,      // auto-advance interval (0: no autoplay)
        keyboardNav: true // enable arrow and [p][n] keys for prev / next actions
    },
        text:{
          next: "▶",
          prev: "◀",
          handle: "●"
        }
      });

var t = setInterval(function(){
        $("#explore a:not('.animated')").eq(0).addClass("animated");
        if(!$("#explore a:not('.animated')").length){
          clearInterval(t);
        }
      },400);

});
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

$('<img/>').attr('src', 'img/szab.png').load(function() {
    $("#usp").css({
      "background":"url(img/szab.png) no-repeat"
    });
    var t = setInterval(function(){
        $("#usp .cont *:not('.animated')").eq(0).css("visibility","visible").addClass("animated");
        if(!$("#usp .cont *:not('.animated')").length){
          clearInterval(t);
        }
      },400);
  });

$("#usp a").click(function(){
  if($("#mobile-nav").css("display") === "none")
    $("html,body").animate({ scrollTop: $(".slider").offset().top }, "slow");
  else{
   jPM.open();
  }
  return false;
});

});
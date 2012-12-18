$(document).ready(function(){

$('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 200,
    minItems: 2
});

$(".flexslider1").flexslider({
    controlNav: false,
    directionNav: false,
    animation: "fade",
    animationLoop: true,
    slideshowSpeed: 5000,
    animationSpeed: 1000
    
});

$(".flexslider2").flexslider({
    controlNav: true,
    directionNav: false,
    animation: "slide",
    animationLoop: true,
    slideshowSpeed: 8000,
    animationSpeed: 1000,
    minItems: 1,
    maxItems: 1
});

/*$('<img/>').attr('src', 'img/szab.png').load(function() {
    $("#usp").css({
      "background":"url(img/szab.png) no-repeat"
    });
    var t = setInterval(function(){
        $("#usp .cont *:not('.animated')").eq(0).css("visibility","visible").addClass("animated");
        if(!$("#usp .cont *:not('.animated')").length){
          clearInterval(t);
        }
      },400);
  });*/

/*$("#usp a").click(function(){
  if($("#mobile-nav").css("display") === "none"){
    $("html,body").animate({ scrollTop: $(".slider").offset().top }, "slow");
  }
  else{
   jPM.open();
  }
  return false;
});
*/
});
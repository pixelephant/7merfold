$(document).ready(function(){


$(".important,#inline-nav a").click(function(){
   var href = $(this).attr("href");
   var $e = $(href);
    $("html,body").animate({ scrollTop: $e.offset().top }, "slow",function(){
      if(!$e.find("h2").hasClass("open")){
        !$e.find("h2 a").trigger("click");
      }
    });
    return false;
});

});

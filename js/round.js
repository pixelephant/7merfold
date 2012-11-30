$(document).ready(function(){


$(".important").click(function(){
   var href = $(this).attr("href");
   var $e = $(href);
   console.log($e);
    $("html,body").animate({ scrollTop: $e.offset().top }, "slow",function(){
      if(!$e.find("h2").hasClass("open")){
        !$e.find("h2 a").trigger("click");
      }
    });
    return false;
});

});

$(document).ready(function(){

  $(".select-trigger").click(function(){
    $(this).parent().next().slideToggle();
    $(this).toggleClass("purple-arrow");
    return false;
  });

  $(".selecter ul .close").click(function(){
    $(this).parents("ul").slideToggle();
    $(".select-trigger").toggleClass("purple-arrow");
    return false;
  });

  $(".selecter ul a").click(function(){
   var href = $(this).attr("href");
   var $e = $(href);
    $("html,body").animate({ scrollTop: $e.offset().top }, "slow");
    return false;
  });

});

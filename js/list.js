$(document).ready(function(){

  $(".select-trigger").click(function(){
    $(this).parent().next().slideToggle();
    $(this).toggleClass("purple-arrow");
  });

  $(".selecter ul .close").click(function(){
    $(this).parents("ul").slideToggle();
  });

  $(".selecter ul a").click(function(){
   var href = $(this).attr("href");
   var $e = $(href);
    $("html,body").animate({ scrollTop: $e.offset().top }, "slow");
    return false;
  });

});

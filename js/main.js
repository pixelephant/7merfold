$(document).ready(function(){

	var jPM = $.jPanelMenu({
        menu: '#mobile-submenu',
        trigger: '#sub-trigger',
        openPosition:"80%"
      });
     jPM.on();

      $("#jPanelMenu-menu").delegate(".close","click",function(){
          jPM.close();
      });

      $("#jPanelMenu-menu").delegate(".back","click",function(){
            var s = $(".sub-nav:not('.hidden')");
            s.addClass("hidden");
            $("#jPanelMenu-menu #sub-grid").show().animate({
              left: 0
            },300,function(){
              $(".back").addClass("close").removeClass("back").html("&times;").parent().find("span").text("Menü");
            });
      });

      $("#sub-grid li a").click(function(){
      		console.log(12);
          var $this = $(this);
          var t = $this.attr("href");
          var ul = $("#jPanelMenu-menu #sub-grid");
          ul.animate({
            left: "-100%"
          },300,function(){
          	console.log(ul);
            ul.hide();
            ul.siblings(t).removeClass("hidden");
            $(".close").addClass("back").removeClass("close").html("&larr;").parent().find("span").text($this.text());
          });
          return false;
      });

      

});

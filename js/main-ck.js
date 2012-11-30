/*! Overthrow v.0.1.0. An overflow:auto polyfill for responsive design. (c) 2012: Scott Jehl, Filament Group, Inc. http://filamentgroup.github.com/Overthrow/license.txt */(function(e,t){var n=e.document,r=n.documentElement,i="overthrow-enabled",s="ontouchmove"in n,o="WebkitOverflowScrolling"in r.style||!s&&e.screen.width>1200||function(){var t=e.navigator.userAgent,n=t.match(/AppleWebKit\/([0-9]+)/),r=n&&n[1],i=n&&r>=534;return t.match(/Android ([0-9]+)/)&&RegExp.$1>=3&&i||t.match(/ Version\/([0-9]+)/)&&RegExp.$1>=0&&e.blackberry&&i||t.indexOf(/PlayBook/)>-1&&RegExp.$1>=0&&i||t.match(/Fennec\/([0-9]+)/)&&RegExp.$1>=4||t.match(/wOSBrowser\/([0-9]+)/)&&RegExp.$1>=233&&i||t.match(/NokiaBrowser\/([0-9\.]+)/)&&parseFloat(RegExp.$1)===7.3&&n&&r>=533}(),u=function(e,t,n,r){return n*((e=e/r-1)*e*e+1)+t},a=!1,f,l=function(n,r){var i=0,s=n.scrollLeft,o=n.scrollTop,u={top:"+0",left:"+0",duration:100,easing:e.overthrow.easing},a,l;if(r)for(var c in u)r[c]!==t&&(u[c]=r[c]);if(typeof u.left=="string"){u.left=parseFloat(u.left);a=u.left+s}else{a=u.left;u.left=u.left-s}if(typeof u.top=="string"){u.top=parseFloat(u.top);l=u.top+o}else{l=u.top;u.top=u.top-o}f=setInterval(function(){if(i++<u.duration){n.scrollLeft=u.easing(i,s,u.left,u.duration);n.scrollTop=u.easing(i,o,u.top,u.duration)}else{a!==n.scrollLeft&&(n.scrollLeft=a);l!==n.scrollTop&&(n.scrollTop=l);h()}},1);return{top:l,left:a,duration:u.duration,easing:u.easing}},c=function(e,t){return!t&&e.className&&e.className.indexOf("overthrow")>-1&&e||c(e.parentNode)},h=function(){clearInterval(f)},p=function(){if(a)return;a=!0;if(o||s)r.className+=" "+i;e.overthrow.forget=function(){r.className=r.className.replace(i,"");n.removeEventListener&&n.removeEventListener("touchstart",T,!1);e.overthrow.easing=u;a=!1};if(o||!s)return;var f,p=[],d=[],v,m,g=function(){p=[];v=null},y=function(){d=[];m=null},b=function(){var e=(p[0]-p[p.length-1])*8,t=(d[0]-d[d.length-1])*8,n=Math.max(Math.abs(t),Math.abs(e))/8;e=(e>0?"+":"")+e;t=(t>0?"+":"")+t;!isNaN(n)&&n>0&&(Math.abs(t)>80||Math.abs(e)>80)&&l(f,{left:t,top:e,duration:n})},E,S=function(e){E=f.querySelectorAll("textarea, input");for(var t=0,n=E.length;t<n;t++)E[t].style.pointerEvents=e},x=function(e,r){if(n.createEvent){var i=(!r||r===t)&&f.parentNode||f.touchchild||f,s;if(i!==f){s=n.createEvent("HTMLEvents");s.initEvent("touchend",!0,!0);f.dispatchEvent(s);i.touchchild=f;f=i;i.dispatchEvent(e)}}},T=function(e){h();g();y();f=c(e.target);if(!f||f===r||e.touches.length>1)return;S("none");var t=e,n=f.scrollTop,i=f.scrollLeft,s=f.offsetHeight,o=f.offsetWidth,u=e.touches[0].pageY,a=e.touches[0].pageX,l=f.scrollHeight,w=f.scrollWidth,E=function(e){var r=n+u-e.touches[0].pageY,c=i+a-e.touches[0].pageX,h=r>=(p.length?p[0]:0),b=c>=(d.length?d[0]:0);r>0&&r<l-s||c>0&&c<w-o?e.preventDefault():x(t);v&&h!==v&&g();m&&b!==m&&y();v=h;m=b;f.scrollTop=r;f.scrollLeft=c;p.unshift(r);d.unshift(c);p.length>3&&p.pop();d.length>3&&d.pop()},T=function(e){b();S("auto");setTimeout(function(){S("none")},450);f.removeEventListener("touchmove",E,!1);f.removeEventListener("touchend",T,!1)};f.addEventListener("touchmove",E,!1);f.addEventListener("touchend",T,!1)};n.addEventListener("touchstart",T,!1)};e.overthrow={set:p,forget:function(){},easing:u,toss:l,intercept:h,closest:c,support:o?"native":s&&"polyfilled"||"none"};p()})(this);jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,t,n,r,i){return jQuery.easing[jQuery.easing.def](e,t,n,r,i)},easeInQuad:function(e,t,n,r,i){return r*(t/=i)*t+n},easeOutQuad:function(e,t,n,r,i){return-r*(t/=i)*(t-2)+n},easeInOutQuad:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t+n:-r/2*(--t*(t-2)-1)+n},easeInCubic:function(e,t,n,r,i){return r*(t/=i)*t*t+n},easeOutCubic:function(e,t,n,r,i){return r*((t=t/i-1)*t*t+1)+n},easeInOutCubic:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t+n:r/2*((t-=2)*t*t+2)+n},easeInQuart:function(e,t,n,r,i){return r*(t/=i)*t*t*t+n},easeOutQuart:function(e,t,n,r,i){return-r*((t=t/i-1)*t*t*t-1)+n},easeInOutQuart:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t*t+n:-r/2*((t-=2)*t*t*t-2)+n},easeInQuint:function(e,t,n,r,i){return r*(t/=i)*t*t*t*t+n},easeOutQuint:function(e,t,n,r,i){return r*((t=t/i-1)*t*t*t*t+1)+n},easeInOutQuint:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t*t*t+n:r/2*((t-=2)*t*t*t*t+2)+n},easeInSine:function(e,t,n,r,i){return-r*Math.cos(t/i*(Math.PI/2))+r+n},easeOutSine:function(e,t,n,r,i){return r*Math.sin(t/i*(Math.PI/2))+n},easeInOutSine:function(e,t,n,r,i){return-r/2*(Math.cos(Math.PI*t/i)-1)+n},easeInExpo:function(e,t,n,r,i){return t==0?n:r*Math.pow(2,10*(t/i-1))+n},easeOutExpo:function(e,t,n,r,i){return t==i?n+r:r*(-Math.pow(2,-10*t/i)+1)+n},easeInOutExpo:function(e,t,n,r,i){return t==0?n:t==i?n+r:(t/=i/2)<1?r/2*Math.pow(2,10*(t-1))+n:r/2*(-Math.pow(2,-10*--t)+2)+n},easeInCirc:function(e,t,n,r,i){return-r*(Math.sqrt(1-(t/=i)*t)-1)+n},easeOutCirc:function(e,t,n,r,i){return r*Math.sqrt(1-(t=t/i-1)*t)+n},easeInOutCirc:function(e,t,n,r,i){return(t/=i/2)<1?-r/2*(Math.sqrt(1-t*t)-1)+n:r/2*(Math.sqrt(1-(t-=2)*t)+1)+n},easeInElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i)==1)return n+r;o||(o=i*.3);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return-(u*Math.pow(2,10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o))+n},easeOutElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i)==1)return n+r;o||(o=i*.3);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return u*Math.pow(2,-10*t)*Math.sin((t*i-s)*2*Math.PI/o)+r+n},easeInOutElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i/2)==2)return n+r;o||(o=i*.3*1.5);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return t<1?-0.5*u*Math.pow(2,10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o)+n:u*Math.pow(2,-10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o)*.5+r+n},easeInBack:function(e,t,n,r,i,s){s==undefined&&(s=1.70158);return r*(t/=i)*t*((s+1)*t-s)+n},easeOutBack:function(e,t,n,r,i,s){s==undefined&&(s=1.70158);return r*((t=t/i-1)*t*((s+1)*t+s)+1)+n},easeInOutBack:function(e,t,n,r,i,s){s==undefined&&(s=1.70158);return(t/=i/2)<1?r/2*t*t*(((s*=1.525)+1)*t-s)+n:r/2*((t-=2)*t*(((s*=1.525)+1)*t+s)+2)+n},easeInBounce:function(e,t,n,r,i){return r-jQuery.easing.easeOutBounce(e,i-t,0,r,i)+n},easeOutBounce:function(e,t,n,r,i){return(t/=i)<1/2.75?r*7.5625*t*t+n:t<2/2.75?r*(7.5625*(t-=1.5/2.75)*t+.75)+n:t<2.5/2.75?r*(7.5625*(t-=2.25/2.75)*t+.9375)+n:r*(7.5625*(t-=2.625/2.75)*t+.984375)+n},easeInOutBounce:function(e,t,n,r,i){return t<i/2?jQuery.easing.easeInBounce(e,t*2,0,r,i)*.5+n:jQuery.easing.easeOutBounce(e,t*2-i,0,r,i)*.5+r*.5+n}});var w=this,doc=w.document,docElem=doc.documentElement,classtext="overthrow-enabled",canBeFilledWithPoly="ontouchmove"in doc,overflowProbablyAlreadyWorks="WebkitOverflowScrolling"in docElem.style||!canBeFilledWithPoly&&w.screen.width>1200||function(){var e=w.navigator.userAgent,t=e.match(/AppleWebKit\/([0-9]+)/),n=t&&t[1],r=t&&n>=534;return e.match(/Android ([0-9]+)/)&&RegExp.$1>=3&&r||e.match(/ Version\/([0-9]+)/)&&RegExp.$1>=0&&w.blackberry&&r||e.indexOf(/PlayBook/)>-1&&RegExp.$1>=0&&r||e.match(/Fennec\/([0-9]+)/)&&RegExp.$1>=4||e.match(/wOSBrowser\/([0-9]+)/)&&RegExp.$1>=233&&r||e.match(/NokiaBrowser\/([0-9\.]+)/)&&parseFloat(RegExp.$1)===7.3&&t&&n>=533}();$(document).ready(function(){$(".totop").click(function(){$("html,body").animate({scrollTop:0},"slow");return!1});var e=$.jPanelMenu({menu:"#mobile-submenu",trigger:"#sub-trigger",openPosition:"80%",keyboardShortcuts:!1});e.on();$("#jPanelMenu-menu").delegate(".close","click",function(){e.close()});$("#jPanelMenu-menu").delegate(".back","click",function(){var e=$(".sub-nav:not('.hidden')");e.addClass("hidden");$("#jPanelMenu-menu #sub-grid").show().animate({left:0},300,function(){$(".back").addClass("close").removeClass("back").html("&times;").parent().find("span").text("Menü")})});$("#sub-grid li a").click(function(){if(overflowProbablyAlreadyWorks===null){window.location="list.html";return!1}var e=$(this),t=e.attr("href"),n=$("#jPanelMenu-menu #sub-grid");n.animate({left:"-100%"},300,function(){n.hide();n.siblings(t).removeClass("hidden");$(".close").addClass("back").removeClass("close").html("&larr;").parent().find("span").text(e.text())});return!1});$("#contact-trigger").click(function(){$("html,body").animate({scrollTop:$("#contact").offset().top},"slow");return!1});$("#search-trigger").click(function(){$("#search-form").toggleClass("open").stop().slideToggle(500,"easeInOutQuad",function(){$("#search-form").hasClass("open")?$("#search-form input[type='search']").focus():$("#search-form input[type='search']").blur()});return!1});$(".sub-nav .top").click(function(){$("#jPanelMenu-menu").animate({scrollTop:0},"slow");return!1});$(".ajax h2 a").click(function(){$(this).find("span").html("...");var e=$(this),t=e.parent(),n=t.next(),r=t.find("span");if(!t.hasClass("loaded"))n.load(e.attr("href"),function(e){t.addClass("loaded");n.slideToggle();t.toggleClass("open");t.hasClass("open")?r.html("-"):r.html("+")});else{n.slideToggle();t.toggleClass("open");t.hasClass("open")?r.html("-"):r.html("+")}return!1})});
/*! Overthrow v.0.1.0. An overflow:auto polyfill for responsive design. (c) 2012: Scott Jehl, Filament Group, Inc. http://filamentgroup.github.com/Overthrow/license.txt */
(function( w, undefined ){
  
  var doc = w.document,
    docElem = doc.documentElement,
    classtext = "overthrow-enabled",
  
    // Touch events are used in the polyfill, and thus are a prerequisite
    canBeFilledWithPoly = "ontouchmove" in doc,
    
    // The following attempts to determine whether the browser has native overflow support
    // so we can enable it but not polyfill
    overflowProbablyAlreadyWorks = 
      // Features-first. iOS5 overflow scrolling property check - no UA needed here. thanks Apple :)
      "WebkitOverflowScrolling" in docElem.style ||
      // Touch events aren't supported and screen width is greater than X
      // ...basically, this is a loose "desktop browser" check. 
      // It may wrongly opt-in very large tablets with no touch support.
      ( !canBeFilledWithPoly && w.screen.width > 1200 ) ||
      // Hang on to your hats.
      // Whitelist some popular, overflow-supporting mobile browsers for now and the future
      // These browsers are known to get overlow support right, but give us no way of detecting it.
      (function(){
        var ua = w.navigator.userAgent,
          // Webkit crosses platforms, and the browsers on our list run at least version 534
          webkit = ua.match( /AppleWebKit\/([0-9]+)/ ),
          wkversion = webkit && webkit[1],
          wkLte534 = webkit && wkversion >= 534;
          
        return (
          /* Android 3+ with webkit gte 534
          ~: Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13 */
          ua.match( /Android ([0-9]+)/ ) && RegExp.$1 >= 3 && wkLte534 ||
          /* Blackberry 7+ with webkit gte 534
          ~: Mozilla/5.0 (BlackBerry; U; BlackBerry 9900; en-US) AppleWebKit/534.11+ (KHTML, like Gecko) Version/7.0.0 Mobile Safari/534.11+ */
          ua.match( / Version\/([0-9]+)/ ) && RegExp.$1 >= 0 && w.blackberry && wkLte534 ||
          /* Blackberry Playbook with webkit gte 534
          ~: Mozilla/5.0 (PlayBook; U; RIM Tablet OS 1.0.0; en-US) AppleWebKit/534.8+ (KHTML, like Gecko) Version/0.0.1 Safari/534.8+ */   
          ua.indexOf( /PlayBook/ ) > -1 && RegExp.$1 >= 0 && wkLte534 ||
          /* Firefox Mobile (Fennec) 4 and up
          ~: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:2.1.1) Gecko/ Firefox/4.0.2pre Fennec/4.0. */
          ua.match( /Fennec\/([0-9]+)/ ) && RegExp.$1 >= 4 ||
          /* WebOS 3 and up (TouchPad too)
          ~: Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.0; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/233.48 Safari/534.6 TouchPad/1.0 */
          ua.match( /wOSBrowser\/([0-9]+)/ ) && RegExp.$1 >= 233 && wkLte534 ||
          /* Nokia Browser N8
          ~: Mozilla/5.0 (Symbian/3; Series60/5.2 NokiaN8-00/012.002; Profile/MIDP-2.1 Configuration/CLDC-1.1 ) AppleWebKit/533.4 (KHTML, like Gecko) NokiaBrowser/7.3.0 Mobile Safari/533.4 3gpp-gba 
          ~: Note: the N9 doesn't have native overflow with one-finger touch. wtf */
          ua.match( /NokiaBrowser\/([0-9\.]+)/ ) && parseFloat(RegExp.$1) === 7.3 && webkit && wkversion >= 533
        );
      })(),
      
    // Easing can use any of Robert Penner's equations (http://www.robertpenner.com/easing_terms_of_use.html). By default, overthrow includes ease-out-cubic
    // arguments: t = current iteration, b = initial value, c = end value, d = total iterations
    // use w.overthrow.easing to provide a custom function externally, or pass an easing function as a callback to the toss method
    defaultEasing = function (t, b, c, d) {
      return c*((t=t/d-1)*t*t + 1) + b;
    },  
      
    enabled = false,
    
    // Keeper of intervals
    timeKeeper,
        
    /* toss scrolls and element with easing
    
    // elem is the element to scroll
    // options hash:
      * left is the desired horizontal scroll. Default is "+0". For relative distances, pass a string with "+" or "-" in front.
      * top is the desired vertical scroll. Default is "+0". For relative distances, pass a string with "+" or "-" in front.
      * duration is the number of milliseconds the throw will take. Default is 100.
      * easing is an optional custom easing function. Default is w.overthrow.easing. Must follow the easing function signature 
    */
    toss = function( elem, options ){
      var i = 0,
        sLeft = elem.scrollLeft,
        sTop = elem.scrollTop,
        // Toss defaults
        o = {
          top: "+0",
          left: "+0",
          duration: 100,
          easing: w.overthrow.easing
        },
        endLeft, endTop;
      
      // Mixin based on predefined defaults
      if( options ){
        for( var j in o ){
          if( options[ j ] !== undefined ){
            o[ j ] = options[ j ];
          }
        }
      }
      
      // Convert relative values to ints
      // First the left val
      if( typeof o.left === "string" ){
        o.left = parseFloat( o.left );
        endLeft = o.left + sLeft;
      }
      else {
        endLeft = o.left;
        o.left = o.left - sLeft;
      }
      // Then the top val
      if( typeof o.top === "string" ){
        o.top = parseFloat( o.top );
        endTop = o.top + sTop;
      }
      else {
        endTop = o.top;
        o.top = o.top - sTop;
      }

      timeKeeper = setInterval(function(){          
        if( i++ < o.duration ){
          elem.scrollLeft = o.easing( i, sLeft, o.left, o.duration );
          elem.scrollTop = o.easing( i, sTop, o.top, o.duration );
        }
        else{
          if( endLeft !== elem.scrollLeft ){
            elem.scrollLeft = endLeft;
          }
          if( endTop !== elem.scrollTop ){
            elem.scrollTop = endTop;
          }
          intercept();
        }
      }, 1 );
      
      // Return the values, post-mixin, with end values specified
      return { top: endTop, left: endLeft, duration: o.duration, easing: o.easing };
    },
    
    // find closest overthrow (elem or a parent)
    closest = function( target, ascend ){
      return !ascend && target.className && target.className.indexOf( "overthrow" ) > -1 && target || closest( target.parentNode );
    },
        
    // Intercept any throw in progress
    intercept = function(){
      clearInterval( timeKeeper );
    },
      
    // Enable and potentially polyfill overflow
    enable = function(){
        
      // If it's on, 
      if( enabled ){
        return;
      }
      // It's on.
      enabled = true;
        
      // If overflowProbablyAlreadyWorks or at least the element canBeFilledWithPoly, add a class to cue CSS that assumes overflow scrolling will work (setting height on elements and such)
      if( overflowProbablyAlreadyWorks || canBeFilledWithPoly ){
        docElem.className += " " + classtext;
      }
        
      // Destroy everything later. If you want to.
      w.overthrow.forget = function(){
        // Strip the class name from docElem
        docElem.className = docElem.className.replace( classtext, "" );
        // Remove touch binding (check for method support since this part isn't qualified by touch support like the rest)
        if( doc.removeEventListener ){
          doc.removeEventListener( "touchstart", start, false );
        }
        // reset easing to default
        w.overthrow.easing = defaultEasing;
        
        // Let 'em know
        enabled = false;
      };
  
      // If overflowProbablyAlreadyWorks or it doesn't look like the browser canBeFilledWithPoly, our job is done here. Exit viewport left.
      if( overflowProbablyAlreadyWorks || !canBeFilledWithPoly ){
        return;
      }

      // Fill 'er up!
      // From here down, all logic is associated with touch scroll handling
        // elem references the overthrow element in use
      var elem,
        
        // The last several Y values are kept here
        lastTops = [],
    
        // The last several X values are kept here
        lastLefts = [],
        
        // lastDown will be true if the last scroll direction was down, false if it was up
        lastDown,
        
        // lastRight will be true if the last scroll direction was right, false if it was left
        lastRight,
        
        // For a new gesture, or change in direction, reset the values from last scroll
        resetVertTracking = function(){
          lastTops = [];
          lastDown = null;
        },
        
        resetHorTracking = function(){
          lastLefts = [];
          lastRight = null;
        },
        
        // After releasing touchend, throw the overthrow element, depending on momentum
        finishScroll = function(){
          // Come up with a distance and duration based on how 
          // Multipliers are tweaked to a comfortable balance across platforms
          var top = ( lastTops[ 0 ] - lastTops[ lastTops.length -1 ] ) * 8,
            left = ( lastLefts[ 0 ] - lastLefts[ lastLefts.length -1 ] ) * 8,
            duration = Math.max( Math.abs( left ), Math.abs( top ) ) / 8;
          
          // Make top and left relative-style strings (positive vals need "+" prefix)
          top = ( top > 0 ? "+" : "" ) + top;
          left = ( left > 0 ? "+" : "" ) + left;
          
          // Make sure there's a significant amount of throw involved, otherwise, just stay still
          if( !isNaN( duration ) && duration > 0 && ( Math.abs( left ) > 80 || Math.abs( top ) > 80 ) ){
            toss( elem, { left: left, top: top, duration: duration } );
          }
        },
      
        // On webkit, touch events hardly trickle through textareas and inputs
        // Disabling CSS pointer events makes sure they do, but it also makes the controls innaccessible
        // Toggling pointer events at the right moments seems to do the trick
        // Thanks Thomas Bachem http://stackoverflow.com/a/5798681 for the following
        inputs,
        setPointers = function( val ){
          inputs = elem.querySelectorAll( "textarea, input" );
          for( var i = 0, il = inputs.length; i < il; i++ ) {
            inputs[ i ].style.pointerEvents = val;
          }
        },
        
        // For nested overthrows, changeScrollTarget restarts a touch event cycle on a parent or child overthrow
        changeScrollTarget = function( startEvent, ascend ){
          if( doc.createEvent ){
            var newTarget = ( !ascend || ascend === undefined ) && elem.parentNode || elem.touchchild || elem,
              tEnd;
                
            if( newTarget !== elem ){
              tEnd = doc.createEvent( "HTMLEvents" );
              tEnd.initEvent( "touchend", true, true );
              elem.dispatchEvent( tEnd );
              newTarget.touchchild = elem;
              elem = newTarget;
              newTarget.dispatchEvent( startEvent );
            }
          }
        },
        
        // Touchstart handler
        // On touchstart, touchmove and touchend are freshly bound, and all three share a bunch of vars set by touchstart
        // Touchend unbinds them again, until next time
        start = function( e ){
          
          // Stop any throw in progress
          intercept();
          
          // Reset the distance and direction tracking
          resetVertTracking();
          resetHorTracking();
            
          elem = closest( e.target );
            
          if( !elem || elem === docElem || e.touches.length > 1 ){
            return;
          }     

          setPointers( "none" );
          var touchStartE = e,
            scrollT = elem.scrollTop,
            scrollL = elem.scrollLeft,
            height = elem.offsetHeight,
            width = elem.offsetWidth,
            startY = e.touches[ 0 ].pageY,
            startX = e.touches[ 0 ].pageX,
            scrollHeight = elem.scrollHeight,
            scrollWidth = elem.scrollWidth,
          
            // Touchmove handler
            move = function( e ){
            
              var ty = scrollT + startY - e.touches[ 0 ].pageY,
                tx = scrollL + startX - e.touches[ 0 ].pageX,
                down = ty >= ( lastTops.length ? lastTops[ 0 ] : 0 ),
                right = tx >= ( lastLefts.length ? lastLefts[ 0 ] : 0 );
                
              // If there's room to scroll the current container, prevent the default window scroll
              if( ( ty > 0 && ty < scrollHeight - height ) || ( tx > 0 && tx < scrollWidth - width ) ){
                e.preventDefault();
              }
              // This bubbling is dumb. Needs a rethink.
              else {
                changeScrollTarget( touchStartE );
              }
              
              // If down and lastDown are inequal, the y scroll has changed direction. Reset tracking.
              if( lastDown && down !== lastDown ){
                resetVertTracking();
              }
              
              // If right and lastRight are inequal, the x scroll has changed direction. Reset tracking.
              if( lastRight && right !== lastRight ){
                resetHorTracking();
              }
              
              // remember the last direction in which we were headed
              lastDown = down;
              lastRight = right;              
              
              // set the container's scroll
              elem.scrollTop = ty;
              elem.scrollLeft = tx;
            
              lastTops.unshift( ty );
              lastLefts.unshift( tx );
            
              if( lastTops.length > 3 ){
                lastTops.pop();
              }
              if( lastLefts.length > 3 ){
                lastLefts.pop();
              }
            },
          
            // Touchend handler
            end = function( e ){
              // Apply momentum based easing for a graceful finish
              finishScroll(); 
              // Bring the pointers back
              setPointers( "auto" );
              setTimeout( function(){
                setPointers( "none" );
              }, 450 );
              elem.removeEventListener( "touchmove", move, false );
              elem.removeEventListener( "touchend", end, false );
            };
          
          elem.addEventListener( "touchmove", move, false );
          elem.addEventListener( "touchend", end, false );
        };
        
      // Bind to touch, handle move and end within
      doc.addEventListener( "touchstart", start, false );
    };
    
  // Expose overthrow API
  w.overthrow = {
    set: enable,
    forget: function(){},
    easing: defaultEasing,
    toss: toss,
    intercept: intercept,
    closest: closest,
    support: overflowProbablyAlreadyWorks ? "native" : canBeFilledWithPoly && "polyfilled" || "none"
  };
  
  // Auto-init
  enable();
    
})( this );




// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
  def: 'easeOutQuad',
  swing: function (x, t, b, c, d) {
    //alert(jQuery.easing.default);
    return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
  },
  easeInQuad: function (x, t, b, c, d) {
    return c*(t/=d)*t + b;
  },
  easeOutQuad: function (x, t, b, c, d) {
    return -c *(t/=d)*(t-2) + b;
  },
  easeInOutQuad: function (x, t, b, c, d) {
    if ((t/=d/2) < 1) return c/2*t*t + b;
    return -c/2 * ((--t)*(t-2) - 1) + b;
  },
  easeInCubic: function (x, t, b, c, d) {
    return c*(t/=d)*t*t + b;
  },
  easeOutCubic: function (x, t, b, c, d) {
    return c*((t=t/d-1)*t*t + 1) + b;
  },
  easeInOutCubic: function (x, t, b, c, d) {
    if ((t/=d/2) < 1) return c/2*t*t*t + b;
    return c/2*((t-=2)*t*t + 2) + b;
  },
  easeInQuart: function (x, t, b, c, d) {
    return c*(t/=d)*t*t*t + b;
  },
  easeOutQuart: function (x, t, b, c, d) {
    return -c * ((t=t/d-1)*t*t*t - 1) + b;
  },
  easeInOutQuart: function (x, t, b, c, d) {
    if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
    return -c/2 * ((t-=2)*t*t*t - 2) + b;
  },
  easeInQuint: function (x, t, b, c, d) {
    return c*(t/=d)*t*t*t*t + b;
  },
  easeOutQuint: function (x, t, b, c, d) {
    return c*((t=t/d-1)*t*t*t*t + 1) + b;
  },
  easeInOutQuint: function (x, t, b, c, d) {
    if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
    return c/2*((t-=2)*t*t*t*t + 2) + b;
  },
  easeInSine: function (x, t, b, c, d) {
    return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
  },
  easeOutSine: function (x, t, b, c, d) {
    return c * Math.sin(t/d * (Math.PI/2)) + b;
  },
  easeInOutSine: function (x, t, b, c, d) {
    return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
  },
  easeInExpo: function (x, t, b, c, d) {
    return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
  },
  easeOutExpo: function (x, t, b, c, d) {
    return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
  },
  easeInOutExpo: function (x, t, b, c, d) {
    if (t==0) return b;
    if (t==d) return b+c;
    if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
    return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
  },
  easeInCirc: function (x, t, b, c, d) {
    return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
  },
  easeOutCirc: function (x, t, b, c, d) {
    return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
  },
  easeInOutCirc: function (x, t, b, c, d) {
    if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
    return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
  },
  easeInElastic: function (x, t, b, c, d) {
    var s=1.70158;var p=0;var a=c;
    if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
    if (a < Math.abs(c)) { a=c; var s=p/4; }
    else var s = p/(2*Math.PI) * Math.asin (c/a);
    return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
  },
  easeOutElastic: function (x, t, b, c, d) {
    var s=1.70158;var p=0;var a=c;
    if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
    if (a < Math.abs(c)) { a=c; var s=p/4; }
    else var s = p/(2*Math.PI) * Math.asin (c/a);
    return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
  },
  easeInOutElastic: function (x, t, b, c, d) {
    var s=1.70158;var p=0;var a=c;
    if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
    if (a < Math.abs(c)) { a=c; var s=p/4; }
    else var s = p/(2*Math.PI) * Math.asin (c/a);
    if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
    return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
  },
  easeInBack: function (x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    return c*(t/=d)*t*((s+1)*t - s) + b;
  },
  easeOutBack: function (x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
  },
  easeInOutBack: function (x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158; 
    if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
    return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
  },
  easeInBounce: function (x, t, b, c, d) {
    return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
  },
  easeOutBounce: function (x, t, b, c, d) {
    if ((t/=d) < (1/2.75)) {
      return c*(7.5625*t*t) + b;
    } else if (t < (2/2.75)) {
      return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
    } else if (t < (2.5/2.75)) {
      return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
    } else {
      return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
    }
  },
  easeInOutBounce: function (x, t, b, c, d) {
    if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
    return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
  }
});

$(document).ready(function(){

  $(".totop").click(function(){
    $("html,body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

	var jPM = $.jPanelMenu({
        menu: '#mobile-submenu',
        trigger: '#sub-trigger',
        openPosition:"80%",
        keyboardShortcuts: false
      });
     jPM.on();

     var width1000Check = window.matchMedia("(min-width: 62.5em)");
     width1000Check.addListener(jPM.off());

     var width1000MaxCheck = window.matchMedia("(max-width: 62.5em)");
     width1000MaxCheck.addListener(jPM.on());

      $("#jPanelMenu-menu").delegate(".close","click",function(){
          jPM.close();
      });
      		

      $("#contact-trigger").click(function(){
        $("html,body").animate({ scrollTop: $("#contact").offset().top }, "slow");
        return false;
      });

      $("#search-trigger").click(function(){
        $("#search-form").toggleClass("open").stop().slideToggle(500,"easeInOutQuad",function(){
          $("#search-trigger").toggleClass("white-arrow");
          if($("#search-form").hasClass("open")){
            $("#search-form input[type='search']").focus();
          }
          else{
            $("#search-form input[type='search']").blur(); 
           }
        });
        
        return false;
      });



$(".collapsible h2 a").click(function(){
  var $this = $(this);
      var $h2 = $this.parent();
      var $cont = $h2.next();
      var $tog = $h2.find("span");
  $cont.slideToggle();
  $h2.toggleClass("open");
  if($h2.hasClass("open")){
        $tog.html("-");
      }
      else{
       $tog.html("+"); 
      }

  return false;
});

    $(".ajax h2 a").click(function(){
      $(this).find("span").html("...");
      var $this = $(this);
      var $h2 = $this.parent();
      var $cont = $h2.next();
      var $tog = $h2.find("span");
      if(!$h2.hasClass("loaded")){
        $cont.load($this.attr("href"),function(resp){
          $h2.addClass("loaded");
          $cont.slideToggle();
          $h2.toggleClass("open");
      if($h2.hasClass("open")){
        $tog.html("-");
      }
      else{
       $tog.html("+"); 
      }
        });
      }
      else{
        $cont.slideToggle();
        $h2.toggleClass("open");
      if($h2.hasClass("open")){
        $tog.html("-");
      }
      else{
       $tog.html("+"); 
      }
      }
      return false;
    });





});

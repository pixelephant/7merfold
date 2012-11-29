/*! jQuery Carousel Plugin by Thomas Jaggi (2012) - http://github.com/backflip/jquery-carousel/ */
(function(f,g,e,b){var c="carousel",d={animation:{duration:300,step:1},behavior:{horizontal:true,circular:false,autoplay:0,keyboardNav:true},elements:{prevNext:true,handles:true,counter:true},events:{start:false,stop:false},initialSlide:0,text:{next:"show next slide",prev:"show previous slide",counter:"%current% of %total%",handle:"%index%"},touch:{enabled:true,thresholds:{speed:0.4,distance:0.3}},visibleSlides:1},i={getTransitionProperty:function(){var p=g.body||g.documentElement,r="transition",o,m=["Moz","ms","O","Webkit"],q=p.style;if(typeof q[r]==="string"){return r}r=r.charAt(0).toUpperCase()+r.substr(1);for(var n=0;n<m.length;n++){o=m[n]+r;if(typeof q[o]==="string"){return o}}return false},getTransitionEndEvent:function(){var m=i.getTransitionProperty(),n={transition:"transitionEnd",MozTransition:"transitionend",msTransition:"msTransitionEnd",OTransition:"oTransitionEnd",WebkitTransition:"webkitTransitionEnd"};return n[m]||false},getNamespacedEvents:function(o){var m=o.split(" ");for(var n=0;n<m.length;n++){m[n]=m[n]+"."+c}return m.join(" ")},enableButton:function(m){m.removeClass("state-disabled").removeAttr("aria-disabled").attr("tabindex",0)},disableButton:function(m){m.addClass("state-disabled").attr("aria-disabled",true).attr("tabindex",-1)}},k={touch:"ontouchstart" in f,transition:i.getTransitionProperty()},l=i.getNamespacedEvents(!k.touch?"click keydown":"touchstart"),j=false,a=0;var h=function(n,m){this.$dom={slider:e(n),slides:e(n).children(),container:e('<div class="'+c+'-container" tabindex="0" />'),frame:e('<div class="'+c+'-frame" />'),navContainer:e('<div class="'+c+'-nav" aria-hidden="true" />'),prev:e('<span class="'+c+'-prev" role="button" tabindex="0" />'),next:e('<span class="'+c+'-next" role="button" tabindex="0" />'),counter:e('<div class="'+c+'-counter" aria-hidden="true" />'),handlesContainer:e('<div class="'+c+'-handles" aria-hidden="true" />'),handles:null,handle:e('<span class="'+c+'-handle" role="button" tabindex="0" />')};this.props={current:0,total:0,visible:0};this.state={enabled:false,animating:false};this.settings=e.extend(true,{},m,this.$dom.slider.data(c+"-options"))};h.prototype={init:function(){var n=this,m=this.$dom,o=null,p;if(this.$dom.slider.data(c)||this.$dom.slider.length===0){return this}this.index=a++;this.settings=e.extend(true,{},d,this.settings);p=this._getStyles(m.slider);m.slider.data(c+"-css",p);m.slides.each(function(){var r=e(this),q=n._getStyles(r);r.data(c+"-css",q)});m.container.insertBefore(m.slider);m.frame.appendTo(m.container).append(m.slider.addClass(c+"-slider"));if(this.settings.elements.prevNext){m.prev.appendTo(m.navContainer).text(this.settings.text.prev);m.next.appendTo(m.navContainer).text(this.settings.text.next);m.navContainer.appendTo(m.container);m.nav=m.prev.add(m.next)}if(this.settings.elements.counter){m.counter.appendTo(m.container)}if(this.settings.elements.handles){m.handlesContainer.appendTo(m.container)}m.slides.addClass(c+"-slide");if(this.settings.behavior.circular){m.slides.each(function(q){e(this).data(c+"-index",q)})}if(!this.settings.behavior.horizontal){m.container.addClass(c+"-vertical")}this.update();e(f).on(i.getNamespacedEvents("resize")+this.index,e.proxy(function(){if(o){clearTimeout(o)}o=setTimeout(e.proxy(function(){this.resize()},this),100)},this));m.slider.data(c,this);return this},update:function(n){var m=this;e.extend(true,this.settings,n);this.$dom.slides=this.$dom.slides.parent().children();this.props.total=this.$dom.slides.length;this.props.current=this.settings.initialSlide;this.props.visible=this._getVisibleSlides();if(this.settings.elements.handles){this.$dom.handlesContainer.html(this._getHandles());this.$dom.handles=this.$dom.handlesContainer.children()}this.resize();this.disable();this.enable()},resize:function(){var q=this.$dom.frame.width(),p,n=this.settings.behavior.horizontal?q/this.props.visible:q,m,o=this.settings.behavior.horizontal?this.props.total*n:n;this.$dom.slides.width(n);this.$dom.slider.width(o).height("auto");m=this._getHighestSlide();this.$dom.slides.css("min-height",m);p=this.settings.behavior.horizontal?m:this.props.visible*m;this.$dom.frame.height(p);this.goTo(this.props.current,true)},enable:function(){var m=this;if(this.state.enabled||this.props.visible>this.props.total){return}if(this.settings.elements.prevNext){this.$dom.nav.on(l,function(p){var r=e(this),n=r.hasClass("state-disabled"),o,q,s;if(n){return}o=r.is(m.$dom.next)?1:-1;q=o*m.settings.animation.step+m.props.current;s=function(){m.goTo(q)};m._handleButtonEvents(p,r,s)})}if(this.settings.elements.handles){this.$dom.handles.on(l,function(n){var p=e(this),r=p.index(),o=m._getSlideIndex(r),q=function(){m.goTo(o)};m._handleButtonEvents(n,p,q)})}if(this.settings.touch.enabled&&k.touch){this._touchEnable()}if(this.settings.behavior.keyboardNav){this.$dom.container.on(i.getNamespacedEvents("keydown"),e.proxy(function(r){var o=e(r.target),u=o.get(0).nodeName.toLowerCase(),n=e.inArray(u,["input","textarea"])!==-1,t=false;if(!(n||r.metaKey||r.ctrlKey)){var q=r.keyCode||r.which,p,s;if(e.inArray(q,[37,80])!==-1){this.prev();this.$dom.prev.focus();t=true}else{if(e.inArray(q,[39,78])!==-1){this.next();this.$dom.next.focus();t=true}else{if(47<q&&q<58){p=q-49;s=m._getSlideIndex(p);this.goTo(s);if(this.settings.elements.handles){this.$dom.handles.eq(p).focus()}t=true}}}}if(t){this._autoplayDisable();r.preventDefault()}},this))}if(this.settings.behavior.autoplay){this.autoplay=setInterval(function(){m.next()},this.settings.behavior.autoplay)}this.state.enabled=true;this._updateNav()},disable:function(m){if(!this.state.enabled){return}if(this.settings.elements.prevNext){this.$dom.nav.off(l)}if(this.settings.elements.handles){this.$dom.handles.off(l)}if(this.settings.touch.enabled&&k.touch){this._touchDisable()}if(this.settings.behavior.keyboardNav){this.$dom.container.off(i.getNamespacedEvents("keydown"))}if(this.settings.behavior.autoplay){this._autoplayDisable()}this.state.enabled=false;this._updateNav()},goTo:function(q,t){var w=this,r=this._getValidatedTarget(q),p=this._getTargetPosition(r),o=t?0:this.settings.animation.duration,v=function(){if(w.settings.events.stop){w.settings.events.stop(r)}w.state.animating=false},n,m,x,s,u;if(!t){this.state.animating=true;if(this.settings.events.start){this.settings.events.start(r)}if(!k.transition){this.$dom.slider.animate(p,o,function(){v()})}else{n=k.transition;m=this.settings.behavior.horizontal?"left":"top";x=i.getNamespacedEvents(i.getTransitionEndEvent());u=this.$dom.slider.css(n);s=m+" "+o/1000+"s ease-in-out";this.$dom.slider.css(n,s);this.$dom.slider.css(p);this.$dom.slider.on(x,function(){w.$dom.slider.off(x);w.$dom.slider.css(n,u);v()})}}else{this.$dom.slider.css(p)}this.props.current=r;this._updateNav()},next:function(){this.goTo(this.props.current+this.settings.animation.step)},prev:function(){this.goTo(this.props.current-this.settings.animation.step)},destroy:function(){var m=this.$dom,n=m.slider.data(c+"-css");m.slider.removeClass(c+"-slider").removeData(c).removeData(c+"-css").insertAfter(m.container).css(n);m.slides.removeClass(c+"-slide").removeData(c+"-index").each(function(){var p=e(this),o=p.data(c+"-css");p.css(o)}).removeData(c+"-css");m.container.remove();this.state.enabled=false;this.props.current=0;e(f).off(i.getNamespacedEvents("resize")+this.index)},_autoplayDisable:function(){clearInterval(this.autoplay);this.autoplay=null},_handleButtonEvents:function(o,m,p){switch(o.type){case"keydown":if(!(o.metaKey||o.ctrlKey)){var n=o.keyCode||o.which;if(e.inArray(n,[13,32])!==-1){p();o.preventDefault()}}break;case"touchstart":j=false;m.on("touchmove."+c,function(){j=true});m.on("touchend."+c,function(){m.off("touchmove."+c);m.off("touchend."+c);if(!j){p()}});break;default:p();break}if(this.settings.behavior.autoplay){this._autoplayDisable()}},_getHandles:function(){var m=g.createDocumentFragment();for(var n=0;n<this.props.total;n++){var p=this.settings.text.handle.replace("%index%",(n+1)),o=this.$dom.handle.clone().text(p).get(0);m.appendChild(o)}return e(m)},_getHighestSlide:function(){var m=0;this.$dom.slides.each(function(){var n=e(this).css("min-height",0).height();if(n>m){m=n}});return m},_getSlideIndex:function(m,n){if(this.settings.behavior.circular){this.$dom.slides.each(function(){var r=e(this),o=r.index(),q=r.data(c+"-index"),p=n?o:q;if(m===p){m=o;return false}})}return m},_getStyles:function(m){var p=["height","left","min-height","top","width"],o={},q;for(var n=0;n<p.length;n++){o[p[n]]=m.css(p[n])}if(k.transition){q=k.transition.charAt(0).toLowerCase()+k.transition.substr(1);o[q]=m.css(q)}return o},_getTargetPosition:function(m){var o=this.settings.behavior.horizontal?this.$dom.slides.width():this.$dom.slides.height(),p=this.settings.behavior.horizontal?"left":"top",n={};n[p]=-m*o;return n},_getValidatedTarget:function(o){if(!this.settings.behavior.circular){if(o<0){o=0}else{if(o>=(this.props.total-this.props.visible)){o=this.props.total-this.props.visible}}}else{if(o<0){var m=this.props.total+o;if(this._shiftSlides(m,-1)){return 0}}else{if(this.props.total>this.props.visible&&o>(this.props.total-this.props.visible)){var n=(o-1)-(this.props.total-this.props.visible);if(this._shiftSlides(n,1)){return o-(n+1)}}}}return o},_getVisibleSlides:function(){if(this.settings.visibleSlides>0){return this.settings.visibleSlides}else{var m=this,n=0,o=this.settings.behavior.horizontal?this.$dom.frame.width():this.$dom.frame.height();this.$dom.slides.each(function(){var p=m.settings.behavior.horizontal?e(this).width():e(this).height();if(p>n){n=p}});return Math.round(o/n)}},_shiftSlides:function(o,n){var m=(n===-1)?":gt("+(o-1)+")":":lt("+(o+1)+")",s=this.$dom.slides.filter(m);if(s.length>0){var q=this.settings.behavior.horizontal?"left":"top",t=this.settings.behavior.horizontal?this.$dom.slides.width():this.$dom.slides.height(),r=this.$dom.slider.position(),p={};p[q]=r[q]+n*s.length*t;if(n===-1){s.prependTo(this.$dom.slider)}else{s.appendTo(this.$dom.slider)}this.$dom.slides=this.$dom.slider.children();this.$dom.slider.css(p);return true}else{return false}},_touchEnable:function(){var m=this,p={start:{x:0,y:0},end:{x:0,y:0}},s={start:0,end:0},r={distance:m.settings.touch.thresholds.distance*m.$dom.frame.width(),speed:m.settings.touch.thresholds.speed*m.$dom.frame.width()},q={top:0,left:0},n={};function o(){var t={x:p.end.x-p.start.x,y:p.end.y-p.start.y};if(!m.settings.behavior.horizontal){t={x:t.y,y:t.x}}return t}n["touchstart."+c]=function(u){var t=u.originalEvent.targetTouches[0];p.start.x=t.pageX;p.start.y=t.pageY;q=m.$dom.slider.position();s.start=new Date().getTime();j=false};n["touchmove."+c]=function(x){var w=x.originalEvent.targetTouches[0],y=0,u={},t=m.settings.behavior.horizontal?"left":"top",v;p.end.x=w.pageX;p.end.y=w.pageY;y=o();if(Math.abs(y.x)>Math.abs(y.y)){v=m.settings.behavior.horizontal?q.left:q.top;u[t]=v+y.x;m.$dom.slider.css(u);j=true;x.preventDefault()}};n["touchend."+c]=function(y){if(!j){return}var u=y.originalEvent.targetTouches[0],A=o(),w,z=m.props.current;if(Math.abs(A.x)>Math.abs(A.y)){s.end=new Date().getTime();w=Math.abs(A.x)/(s.end-s.start)*1000;if(Math.abs(A.x)>r.distance||w>r.speed){var t=m.settings.behavior.horizontal?m.$dom.slides.width():m.$dom.slides.height(),v=(A.x>0)?-1:1,x=Math.abs(Math.round(A.x/t));if(x<1&&w>r.speed){x=1}z=m.props.current+v*x}m.goTo(z)}};this.$dom.frame.on(n)},_touchDisable:function(){this.$dom.frame.off(i.getNamespacedEvents("touchstart touchmove touchend"))},_updateNav:function(){if(this.state.enabled){if(this.settings.elements.prevNext){i.enableButton(this.$dom.prev);i.enableButton(this.$dom.next);if(!this.settings.behavior.circular){if(this.props.current===0){i.disableButton(this.$dom.prev)}else{i.enableButton(this.$dom.prev)}if(this.props.current===this.props.total-this.props.visible){i.disableButton(this.$dom.next)}else{i.enableButton(this.$dom.next)}}}if(this.settings.elements.handles){var m=this._getSlideIndex(this.props.current,true),n=(m>0)?":gt("+(m-1)+"):lt("+this.props.visible+")":":lt("+(m+this.props.visible)+")";i.enableButton(this.$dom.handles);this.$dom.handles.removeClass("state-current");this.$dom.handles.filter(n).addClass("state-current")}}else{if(this.settings.elements.prevNext){i.disableButton(this.$dom.prev);i.disableButton(this.$dom.next)}if(this.settings.elements.handles){i.disableButton(this.$dom.handles)}}if(this.settings.elements.counter){var o=this._getSlideIndex(this.props.current,true)+1,q=o+(this.props.visible-1),p;if(this.props.visible>1){if(q>this.props.total){q=this.props.total}o+="-"+q}p=this.settings.text.counter.replace("%current%",o).replace("%total%",this.props.total);this.$dom.counter.text(p)}}};e.fn[c]=function(n){var m=arguments;return this.each(function(){var p=e(this),o=p.data(c);if(o){if(typeof n==="object"){o.update.apply(o,m)}else{o[n].apply(o,Array.prototype.slice.call(m,1))}}else{new h(this,n).init()}})};f[c.charAt(0).toUpperCase()+c.substr(1)]=h})(window,document,jQuery);
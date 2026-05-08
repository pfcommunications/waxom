jQuery(window).bind("load unload", function($){

	'use strict';
 	
//
// Animated Elements
// 

jQuery('.animated,.wpb_animate_when_almost_visible').appear(function() {
    var elem = jQuery(this);
    
    if (elem.hasClass('animatedSlider')) return false;
    
    var animation = elem.data('animation');		    
    if(!animation) {
    	animation = 'fadeInLeft';
    }
    if ( !elem.hasClass('visible') ) {
    	
       	var animationDelay = elem.data('animation-delay');
        if ( animationDelay ) {
            setTimeout(function(){
                elem.addClass( animation + " visible" );
            }, animationDelay);
        } else {
            setTimeout(function(){
                elem.addClass( animation + " visible" );
            }, 300);
        }
    }
});

	//
	// Maginific Popup
	// 
	
	jQuery('.mp-image a').each(function() {
		jQuery(this).magnificPopup({type:'image'});
	});

	jQuery('.mp-video, mp-map').each(function() {
		jQuery(this).magnificPopup({type:'iframe'});
	});

	//	for image gallery
	jQuery('.mp-gallery').each(function() { // the containers for all your galleries
	    jQuery(this).magnificPopup({
	        delegate: 'a', // the selector for gallery item
	        type: 'image',
	        fixedContentPos: false,
	        gallery: {
	          enabled:true
	        }
	    });
	});
	
	jQuery('.carousel-gallery').each(function() { // the containers for all your galleries
	    jQuery(this).magnificPopup({
	        delegate: '.carousel-lightbox', // the selector for gallery item
	        type: 'image',
	        fixedContentPos: false,
	        gallery: {
	          enabled:true
	        }
	    });
	});

//
// prettyPhoto
// 

	jQuery("a[data-rel^='prettyPhoto']").each(function() {
		jQuery(this).prettyPhoto({
			theme: "light_square",
			default_width: 700,
			default_height: 400,
		});
	});

//
// Custom Image Slider
// 	
     
     if(typeof Swiper != 'undefined') {

	     if(jQuery('.vntd-image-slider').length > 0) {
	     	var swiper = new Swiper('.vntd-image-slider', {
	     		pagination: '.swiper-pagination',
	     		paginationClickable: true,
	     		nextButton: '.swiper-button-next',
	     		prevButton: '.swiper-button-prev',
	     		loop: true,   
	     		onInit: function() {
	     			jQuery('.vntd-image-slider li a').each(function() {
	     				jQuery(this).magnificPopup({ 
	     				  type: 'image',
	     				  gallery: {
	     				     enabled:true
	     				   }
	     					// other options
	     				});
	     			});
	     			
	     		}		
	     	});	
	     }
     }

//
// Fullscreen Video Player
// 






	//
	// Scroll Effect
	//
	
	jQuery('.nav-menu a,.scroll,.ex-link a,a.ex-link,.slide-button,.page-numbers').bind('click', function(event) {
		//alert('hi');
		var $anchor = jQuery(this);
		var headerH = jQuery('#navigation, #navigation-sticky').outerHeight();

		jQuery('html,body').stop().animate({ 
			scrollTop: jQuery($anchor.attr('href')).offset().top - headerH + "px"
		},1200, 'easeInOutExpo');
		event.preventDefault();

	});
	
	

		//
		// Portfolio
		// 

		var $container = jQuery('.vntd-grid-container');
		
		function vntd_columnNumber(cols,containerWidth) {
			var windowSize = jQuery(window).width();
			var columns;
			
			if(windowSize > 1100) {
				columns = cols;
			} else if(windowSize > 960) {
				if(cols == 4) {
					columns = 3;
				} else {
					columns = cols;
				}
			} else if(windowSize > 680) {
				if(cols == 4 || cols == 3) {
					columns = 2;
				} else {
					columns = cols
				}
			} else {
				columns = 1;
			}
			
			//alert(windowSize+" COLS: "+columns+" | "+containerWidth/cols);
			
			return containerWidth/columns;
		}
		
		if($container.length > 0) {
			var $extra = 5;
			var $extraClass = '';
			
			if($container.hasClass('grid-style-thumb_bg')) {
				$extra = 0;				
			}
			
			if($container.find('.post').width() < 440) {
				$extraClass = 'post-size-medium';
				$container.find('.post').each(function() {				
					jQuery(this).addClass($extraClass);				
				});
			}
			
			$container.isotope({
				masonry: { 
					columnWidth: vntd_columnNumber($container.data('cols'),$container.width()) - $extra
				},
				itemSelector : '.item'			
			});
			
			jQuery(window).resize(function () {
				if(jQuery('.vntd-grid-container').length) {
					
					jQuery('.vntd-grid-container').isotope({						
						
						masonry: { columnWidth: vntd_columnNumber($container.data('cols'),$container.width()) - $extra }
					});	
					

						if($container.find('.post').width() < 440) {
							$container.find('.post').each(function() {							
								jQuery(this).addClass('post-size-medium');						
							});
							
						} else if($container.find('.post').hasClass($extraClass)) {
						
							$container.find('.post').each(function() {
								jQuery(this).removeClass('post-size-medium');
							});
							
						}

				}
					    	
		    });
		    
		    $container.closest('.blog-inner').animate({
		        'opacity': 1
		    }, 400);
		}

});
 

// Document Ready

	( function ( $ ) {
		'use strict';
		
		jQuery(document).ready(function() {
		
			// Mobile Background
			
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			
				jQuery('.mbYTP_wrapper').addClass('mobile-bg');
				jQuery('section , div').addClass('b-scroll');
				jQuery('.animated').addClass('visible');
				
				//alert('mobile');
				
			} else {
			
				jQuery(".player").each(function() {
					jQuery(this).mb_YTPlayer();
				});
				
			}
		
			// Page Title
			
			if(jQuery('#page-title.page-title-animated').length > 0) {
				
				var src = jQuery('.page-title-bg-image').css('background-image');
				
				var url = src.match(/\((.*?)\)/)[1].replace(/('|")/g,'');
				
				var img = new Image();
				
				img.onload = function() {
				    jQuery(".page-title-bg-image").animate({'opacity':1},900);
				    jQuery("#page-title h1").delay(400).animate({'opacity':1});
				}
				
				img.src = url;
				if (img.complete) img.onload();
				
			}
			
			//
			// Sticky Navigation
			//
			
			if(jQuery("#site-navigation.sticky-navigation").length > 0) {
			
				var offset = jQuery(this).scrollTop();
				
				var navigation = jQuery("#site-navigation");
				var extraTop = navigation.height();
				var navigationSticky = jQuery("#navigation_sticky");
				
				if(jQuery("#topbar").length > 0) {
					extraTop = extraTop + jQuery('#topbar').height();
				}
				
				if(jQuery("#nav-bottom").length > 0) {
					extraTop = extraTop + jQuery('#nav-bottom').height();
				}
				
				if(offset > extraTop) {
					navigation.addClass('sticky-now');
				} else if(offset < extraTop+30) {
					//navigationStick.animate({'top':'-100px'});
					navigation.removeClass('sticky-now');
				}
				
				jQuery(window).scroll(function () {

					var offset = jQuery(this).scrollTop();
					
					var navigation = jQuery("#site-navigation");
					var extraTop = navigation.height();
					var navigationSticky = jQuery("#navigation_sticky");
					var topbarHidden = false;
					var offsetExtra = 0;
					if(jQuery("#topbar").length > 0) {
						extraTop = extraTop + jQuery('#topbar').height();
						offsetExtra = 43;
					}
						
					if(jQuery('#topbar').length > 0) {
					
						if(offset > 0 && offset <= 40) {
							jQuery("#topbar").css('height',40-offset);
							jQuery("#topbar").css('overflow', 'hidden');
						} else if(offset > 40) {
							jQuery("#topbar").css('height',0);
							jQuery("#topbar").css('overflow', 'hidden');
						} else {
							jQuery("#topbar").css('height','');
							jQuery("#topbar").css('overflow', 'visible');
						}
					
					}
					
					var offsetVal = offsetExtra;
					
					if(offset > offsetVal) {
						navigation.addClass('sticky-now');
					} else if(offset < extraTop+30) {
						navigation.removeClass('sticky-now');
						
					}
		
				 });
			 }
			 
			 if(jQuery("#site-navigation.style-default-slide").length > 0) {
			 	
			 	var first;
			 	var navigation = jQuery("#site-navigation");
			 	var offset = jQuery(this).scrollTop();
			 	
			 	if(jQuery("#first").length > 0) {
			 		first = jQuery('#first');
			 	} else {
			 		first = jQuery('.page-holder > .vc_row:first-child');
			 	}
			 	
			 	if(offset > first.height()) {
			 		navigation.addClass('navigation-appear');
			 	} else {
			 		//navigationStick.animate({'top':'-100px'});
			 		navigation.removeClass('navigation-appear');
			 	}
			 	
			 	jQuery(window).scroll(function () {
			 	
			 		var offset = jQuery(this).scrollTop();
			 		
			 		if(offset > first.height()) {
		 				navigation.addClass('navigation-appear');
		 			} else {
		 				navigation.removeClass('navigation-appear');
		 			}
			 	});
			 	
			 }
			 
			 //
			 // Big Search
			 //
			 
			 if(jQuery(".header-search-open").length > 0) {
			 	jQuery('.header-search-open').on('click', function() {
			 		jQuery(this).closest('.nav-inner').find('.logo').animate({'opacity':0});
			 		jQuery(this).closest('.nav-inner').find('.nav-menu,.mobile-nav-button-popup').animate({'opacity':0});
			 		jQuery(this).closest('.nav-inner').find('.header-big-search').fadeIn();
			 		jQuery(this).closest('.nav-inner').find('.header-big-search input').focus();
			 	});
			 	
			 	jQuery('.header-search-close').on('click', function() {		
			 		jQuery(this).closest('.nav-inner').find('.header-big-search').fadeOut(150);
			 		jQuery(this).closest('.nav-inner').find('.logo').animate({'opacity':1});
			 		jQuery(this).closest('.nav-inner').find('.nav-menu,.mobile-nav-button-popup').animate({'opacity':1});
			 	});
			 }
			 
			 //
			 // Dropdown menu
			 //
			 
		 	jQuery('.nav-menu > .nav > .menu-item-has-children, .nav-menu .menu-item-has-children:not(".mega-menu") .menu-item-has-children, .vntd-nav-cart').each(function() {
		 		
		 		var hoverTimer;
		 		var hoverTimer2;
		 		var navElement = jQuery(this);
		 		
		 		navElement.hover(function() {
		 
		 			    hoverTimer = setTimeout(function() { 
		 			        navElement.find('.dropdown-menu, .nav-cart-products').first().stop(true, true).fadeIn(250);
		 			    }, 300);
		 			    
		 			    clearTimeout(hoverTimer2); 
		 			},
		 			function() { 
		 				hoverTimer2 = setTimeout(function() { 
		 				    navElement.find('.dropdown-menu, .nav-cart-products').first().stop(true, true).fadeOut(250);  
		 				}, 400);
		 				
		 				clearTimeout(hoverTimer); 
		 			}
		 
		 		);
		 		
		 	});
		  	
		  	jQuery('a.dropdown-toggle, .dropdown-menu a').bind('touchend', function(){
		  	        var href = jQuery(this).attr('href');
		  	        location.href = href;
		  	})
		  	
		  	jQuery('body').on('touchstart.dropdown', '.dropdown-menu, .work-image', function (e) { e.stopPropagation(); });
			
			//
			// Carousels
			//
			
			jQuery(".vntd-carousel").each(function() {
				var owl = jQuery(this);
				
				owl.on('initialized.owl.carousel', function(event) {
				    owl.closest('.vntd-carousel-holder').css({'opacity':1, 'max-height':'9999px'});
				});
				
				var $cols,$cols_600,$cols_768,$autoplay;
				
				var $autoplayTimeout = 7000;
				
				$cols = jQuery(this).data('cols');
				$autoplay = jQuery(this).data('autoplay');
				
				$autoplayTimeout = jQuery(this).data('autoplay-timeout');
				
				if($cols == 5 || $cols == 4 || $cols == 3) {
					$cols_768 = 3;
				} else if($cols == 2) {
					$cols_768 = 2;
				} else {
					$cols_768 = 1;
					$cols_600 = 1;
				}
				
				// To do: additional effects
				
				owl.owlCarousel({
				 	items : $cols,
				 	// Responsive Settings
				 	responsive : {
				 	    0 : {
				 	        items : 1,
				 	    },
				 	    480 : {
				 	        items: 1,
				 	    },
				 	    600 : {
				 	         items: $cols_600,
				 	     },
				 	    768 : {
				 	        items: $cols_768,
				 	    },
				 	    1170 : {
				 	    	items: $cols
				 	    }
				 	},
					// End Responsive Settings
					dots : jQuery(this).data('dots'),
					nav : jQuery(this).data('nav'),
					mouseDrag : true,
				 	stopOnHover : true,
				 	slideSpeed : 700,
				 	paginationSpeed : 900,
				 	rewindSpeed : 1100,
				 	margin: jQuery(this).data('margin'),
				 	callbacks: true,
				 	autoplayHoverPause: true,
				 	autoplayTimeout: $autoplayTimeout,
				 	autoplay: $autoplay,
				 	loop: true,
				 });
				 
			});
			
			jQuery(".product .images .thumbnails").each(function() {
				var owl = jQuery(this);
				
				if(owl.children().length <= 4) return null;
				
				owl.on('initialized.owl.carousel', function(event) {
				    owl.css({'opacity':1, 'max-height':'9999px'});
				});
				
				owl.owlCarousel({
				 	items : 4,
				 	// Responsive Settings
				 	responsive : {
				 	    0 : {
				 	        items : 4,
				 	    },
				 	    480 : {
				 	        items: 4,
				 	    },
				 	    768 : {
				 	        items: 4,
				 	    },
				 	    1170 : {
				 	    	items: 4
				 	    }
				 	},
					// End Responsive Settings
					autoplay : false,
					dots : false,
					nav : true,
					mouseDrag : true,
				 	stopOnHover : true,
				 	slideSpeed : 700,
				 	paginationSpeed : 900,
				 	rewindSpeed : 1100,
				 	margin: 4,
				 	callbacks: true,
				 	autoplayHoverPause: true,
				 	autoplayTimeout: 7000
				 });
				 
			});
			
			// Widget Tabbed
			
			jQuery('.widget-tabbed').each(function() {
				
				var $parent = jQuery(this);
				
				jQuery('.widget-tabbed-nav li').on('click', function() {
					$parent.find('.widget-tabbed-nav li').removeClass('active-tab');
					jQuery(this).addClass('active-tab');
					$parent.find('.content-item').hide();
					$parent.find('.content-item.content-item-'+jQuery(this).data('tab')).fadeIn();
					//alert('.content-item.content-item-'+jQuery(this).data('tab'));
				});
			
			}); 
		
			/* ==============================================
				Veented Slider
			=============================================== */
			
			if($('.veented-slider-fullscreen').length > 0) {
				
				var $height = $(window).height();
				var $extra = 0;
				
				if ($('#wpadminbar').length) {
					$extra = $extra + 28;
				}
				
				if (jQuery('#topbar').length > 0 && !jQuery('#site-navigation').hasClass('style-transparent')) {
					$extra = $extra + jQuery('#topbar').height();
				}
				
				if (!jQuery('#site-navigation').hasClass('style-transparent')) {
					$extra = $extra + jQuery('#site-navigation').height();
				}
				
				$('.veented-slider-holder').css('height',$height-$extra);
				
				jQuery(window).resize(function () {
					var $height = $(window).height();
					if($height > 400) {
						$('.veented-slider-holder').css('height',$height-$extra);
					}
				});
			}
			
			if($('.veented-slider').length > 0 && typeof Swiper != 'undefined') {
								
				var previousSlideID = 0;
				
				var varAutoplay = jQuery('.veented-slider-holder').data('slider-autoplay');
				var varEffect = jQuery('.veented-slider-holder').data('slider-effect');
				
				
				var swiper = new Swiper('.swiper-containers', {
					pagination: '.swiper-pagination',
					paginationClickable: true,
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					loop: true,
					autoplay: varAutoplay,
					preloadImages: false,
					lazyLoading: true,
					effect: varEffect,
					onInit: function(swiper) {
						swiper.stopAutoplay();
					},
					onLazyImageReady: function(swiper) {
						
						swiper.startAutoplay();
						
						if(!$('.veented-slider').hasClass('veented-slider-loaded')) {
							
							$('.veented-slider').addClass('veented-slider-loaded');
							
							$.when($('.veented-slider-loader').fadeOut(300)).done(function() {
							
								var sliderElements = [
									".veented-slide-secondary-heading",
									".veented-slide-heading",
									".veented-slide-paragraph",
									".veented-slide-buttons"
								];
								
								var delay = 50;
								
								$.each(sliderElements, function(element, elementClass) {
								
									if($('.swiper-slide-active '+elementClass).length > 0) {
									
										setTimeout(function(){
	
										    $('.swiper-slide-active '+elementClass).addClass( "fadeInUp visible" );
										    
										  }, delay);
										  
										delay += 250;
									  
									}
									  
								});
							
							});
							
						}
						
					},
					onSlideChangeEnd: function() {
						
						if($('.veented-slider').hasClass('veented-slider-loaded')) { 
						
							
							
							var sliderElements = [
								".veented-slide-secondary-heading",
								".veented-slide-heading",
								".veented-slide-paragraph",
								".veented-slide-buttons"
							];
							
							var delay = 50;
							
							$.each(sliderElements, function(element, elementClass) {
							
								if($('.swiper-slide-active '+elementClass).length > 0) {
								
									setTimeout(function(){

									    $('.swiper-slide-active '+elementClass).addClass( "fadeInUp visible" );
									    
									  }, delay);
									  
									delay += 200;
								  
								}
								  
							});
							
							$('.swiper-slide').not('.swiper-slide-active').find('.animated').stop().removeClass('visible').removeClass('fadeInUp');
							
							
						
						}
						
						
					}
				});	
			}		
		
		});
		
		//
		// Simple Image Loading
		//
		
//		$("img.vc_single_image-img").one("load", function(){
//
//			$(this).animate({"opacity":1});
//			
//		}).each(function() {
//
//			if(this.complete) $(this).load();
//		});
		
		
		
		
	}( jQuery ));

/* ==============================================
COUNT FACTORS
=============================================== */	
  
	jQuery(function() {
			
			jQuery(".vntd-counter").appear(function(){
				var dataperc;
					
				jQuery('.vntd-counter').each(function(){

			       	dataperc = jQuery(this).data('perc'),

					jQuery(this).find('.counter-number').delay(6000).countTo({
				        from: 0,
				        to: dataperc,
				        speed: 3000,
				        refreshInterval: 50,
		            
	        		});  
				});
			});
		});
	 
	(function($) {
	    $.fn.countTo = function(options) {
	        // merge the default plugin settings with the custom options
	        options = $.extend({}, $.fn.countTo.defaults, options || {});
	
	        // how many times to update the value, and how much to increment the value on each update
	        var loops = Math.ceil(options.speed / options.refreshInterval),
	            increment = (options.to - options.from) / loops;
	
	        return jQuery(this).each(function() {
	            var _this = this,
	                loopCount = 0,
	                value = options.from,
	                interval = setInterval(vntd_updateTimer, options.refreshInterval);
	
	            function vntd_updateTimer() {
	                value += increment;
	                loopCount++;
	                jQuery(_this).html(value.toFixed(options.decimals));
	
	                if (typeof(options.onUpdate) == 'function') {
	                    options.onUpdate.call(_this, value);
	                }
	
	                if (loopCount >= loops) {
	                    clearInterval(interval);
	                    value = options.to;
	
	                    if (typeof(options.onComplete) == 'function') {
	                        options.onComplete.call(_this, value);
	                    }
	                }
	            }
	        });
	    };
	
	    $.fn.countTo.defaults = {
	        from: 0,  // the number the element should start at
	        to: 100,  // the number the element should end at
	        speed: 1000,  // how long it should take to count between the target numbers
	        refreshInterval: 100,  // how often the element should be updated
	        decimals: 0,  // the number of decimal places to show
	        onUpdate: null,  // callback method for every time the element is updated,
	        onComplete: null,  // callback method for when the element finishes updating
	    };
	})(jQuery);

/* ==============================================
ANIMATED SKILL BARS
=============================================== */
jQuery(window).load(function(){
	
	jQuery('.progress-bar').appear(function(){
		datavl = jQuery(this).attr('data-value'),
		jQuery(this).animate({ "width" : datavl + "%"}, '300');		
	});
	
	jQuery('.modal-right .progress-bar').each(function() {
		datavl = jQuery(this).attr('data-value'),
		jQuery(this).animate({ "width" : datavl + "%"}, '300');	
	});
	
});



	jQuery(window).bind("load",function(){
		
		
		//
		// Change Background
		// 
		
		setTimeout(vntd_updateScrollSpy, 500);
		
	
	});	


function vntd_updateScrollSpy() {
    jQuery('body').scrollspy({ 
    	target: '.nav-menu',
    	offset: 110
    });
}	

	
jQuery(document).ready(function() {
    
	    //
	    // Mobile Navigation Button
	    // 
    
    	jQuery( ".mobile-nav-button" ).bind('click',function() {
    	
    		var nav = jQuery('#navigation-mobile');

    		jQuery("#navigation-mobile").slideToggle("medium");

    	});
    	
    	jQuery( ".mobile-nav-button-popup" ).bind('click',function() {
    	
    		jQuery('#vntd-popup-menu').fadeIn();
    		
    	});
    	
    	// Mobile Navigation
    		
//		jQuery('#navigation-mobile a').bind('click', function(event) {
//			var parent = jQuery(this).closest('li');
//			event.preventDefault();
//
//			if(parent.hasClass('menu-item-has-children')) {
//
//				parent.find("> .dropdown-menu").slideToggle("fast");
//				//parent.attr('href', '#');
//				//console.log('dropdown');
//				
//			} else {
//				var linkURL = this.getAttribute('href');		
//				document.location.href = linkURL;
//			}
//			
//			
//		});

		jQuery('#navigation-mobile li.menu-item-has-children').append('<span class="dropdown-toggle"></span>');
		
		jQuery('#navigation-mobile .dropdown-toggle').bind('click', function(event) {
		
			var parent = jQuery(this).closest('li');
			event.preventDefault();

			parent.find("> .dropdown-menu").slideToggle("fast");
		
		});
		
		
    	
    	jQuery( "#vntd-popup-menu-close" ).bind('click',function() {
    		
    		jQuery('#vntd-popup-menu').fadeOut();
    		
    	});
    
    	jQuery('.nav-inner div.nav-menu ul.nav li a').click(function () {
    		if (jQuery(window).width() < 1000) {
    			jQuery(".nav-menu").slideToggle("2000")
    		}    		
    	});
    	
    	//
    	// Scroll to Top
    	//
    	
    	// hide #back-top first
    	jQuery("#back-top").hide();
    	
    	// fade in #back-top
    	jQuery(window).scroll(function () {
    		if (jQuery(this).scrollTop() > 500) {
    			jQuery('#back-top').fadeIn();
    		} else {
    			jQuery('#back-top').fadeOut();
    		}
    	});
		

});
jQuery(document).ready(function ($) {

    // The number of the next page to load (/page/x/).
    //var pageNum = parseInt(pbd_alp.startPage) + 1;

    // The maximum number of pages the current query can return.
    //var max = parseInt(pbd_alp.maxPages);

    // The link of the next page of posts.
    //var nextLink = pbd_alp.nextLink;
    

    /**
     * Replace the traditional navigation with our own,
     * but only if there is at least one page of new posts to load.
     */
     
    //if (pageNum <= max) {
    
        // Insert the "More Posts" link.
        $('.blog-inner, .wpb-blog > div').append('<div id="ajax-load-posts" class="pagination-wrap"><a href="#"class="btn btn-style-default btn-accent2 btn-large">Load More Posts</a></div>');
		
        // Remove the traditional navigation.
        $('.blog_pagination').remove();
    //}
    
    if($('.blog-inner').length > 0) vntd_ajax_blog();
    
    
	
	
	function vntd_ajax_blog() {
	
		// The number of the next page to load (/page/x/).
	    var pageNum = parseInt(pbd_alp_blog.startPage) + 1;
	
	    // The maximum number of pages the current query can return.
	    var max = parseInt(pbd_alp_blog.maxPages);
	
	    // The link of the next page of posts.
	    var nextLink = pbd_alp_blog.nextLink;
	    
	    /**
	     * Load new posts when the link is clicked.
	     */
	    $('#ajax-load-posts a').click(function () {
	        // Are there more posts to load?
	        if (pageNum <= max) {
	
	            // Show that we're working.
	            $(this).html('Loading posts.. <div class="spinner-ajax"></div>');
	            $(this).find('.spinner-ajax').css('opacity',1);
	
	            $.get(nextLink, function (data) {
	
	                pageNum++;
	                nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + pageNum);
	                if (pageNum <= max) {
	                    $('#ajax-load-posts a').text('Load More Posts');
	                } else {
	                    $('#ajax-load-posts a').text('No more posts to load.').addClass('ajax-no-posts');
	                }
	                                
	
	            }).done(function (data) {
					
					
	                var $newItems = $(data).find('.post');
	
	                
	                
	                relayout_callback = function(){
	                  $('.flexslider').flexslider({
	                  	animation: "slide"
	                  }); 
	                  
	                  //prettyPhoto();
	                };
	                
	                function layout_callback(){
	//                  $('.custom_slider').flexslider({
	//                  	animation: "slide",
	//                  	selector: ".image_slider .slide"
	//                  }); 
	//                  
	                  if(jQuery('.vntd-image-slider').length > 0) {
	                  	var sliders = new Swiper('.vntd-image-slider', {
	                  		nextButton: '.swiper-button-next',
	                  		prevButton: '.swiper-button-prev',
	                  		loop: true,     		
	                  	});	
	
	                  }
	                  
	                  if(jQuery('.mp-image').length > 0) {
		                  jQuery('.mp-image a').each(function() {
		                  	jQuery(this).magnificPopup({type:'image'});
		                  });
		              }
	                  //alert('callback');
	                  //prettyPhoto();
	                  //$newItems.find('audio,video').mediaelementplayer();
	                  //$newItems.delay(200).animate({opacity: 1}, 600);
	                };
	                
					$newItems.css('opacity',0);
					
					if($newItems.find('img').length) {
	
						var $images = $newItems.find('img');
						var loaded_images_count = 0;
						
						$images.load(function(){
						
							loaded_images_count++;
							
							if (loaded_images_count == $images.length) { // All images loaded
							
								var $holder = $('.vntd-grid-container');	
								                     
								if($holder.length !== 0) {  
	                	
									$($holder).isotope('insert', $newItems);
								
									setTimeout(function() {
										layout_callback();
									}, 100);
								
								} else {
	
									$newItems.css({'display' : 'none', 'opacity' : 1});
									$newItems.prependTo('#ajax-load-posts').slideDown('slow');
									
									setTimeout(function() {
										layout_callback();
									}, 100);
								}
							
							}
							
						});
						
		            } else {
	
		            	var $holder = $('.vntd-grid-container');	                     
		            	
		            	if($holder.length !== 0) {   
	            	
		            		$($holder).isotope('insert', $newItems);
		            		
		            		setTimeout(function() {
		            		    layout_callback();
		            		}, 100);
		            		
		            	} else {
		            		$newItems.css({'display' : 'none', 'opacity' : 1});
		            		$newItems.prependTo('#ajax-load-posts').slideDown('slow');
		            		
		            		setTimeout(function() {
		            			layout_callback();
		            		}, 100);
		            	}
		            
		            }
	                
	            });
	                        
	
	        } else {
	            //$('#ajax-load-posts a').append('.');
	        }
	
	        return false;
	    });
    
    }
    
    if($('#portfolio-load-posts a').length > 0) {
    	vntd_ajax_portfolio();
    }
    
    
    function vntd_ajax_portfolio() {
    
    	// The number of the next page to load (/page/x/).
	    var pageNum = parseInt(pbd_alp_portfolio.startPage) + 1;
	
	    // The maximum number of pages the current query can return.
	    var max = parseInt(pbd_alp_portfolio.maxPages);
	
	    // The link of the next page of posts.
	    var nextLink = pbd_alp_portfolio.nextLink;
    
	    /**
	         * Load new posts when the link is clicked.
	         */
	    $('#portfolio-load-posts a').click(function () {
	
	        // Are there more posts to load?
	        if (pageNum <= max) {
	
	            // Show that we're working.
	            $(this).html('Loadings posts.. <div class="spinner-ajax"></div>');
	            $(this).find('.spinner-ajax').css('opacity',1);
	
	            $.get(nextLink, function (data) {
					//alert('test');
	                pageNum++;
	                nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + pageNum);
	
	                if (pageNum <= max) {
	                    $('#portfolio-load-posts a').text('Load More Posts');
	                } else {
	                    $('#portfolio-load-posts a').text('No more posts to load.').addClass('ajax-no-posts');
	                }
	                                
	
	            }).done(function (data) {
					
	                var $newItems = $(data).find('.portfolio-items .item');				
	
	                $newItems.find('img').bind("load", function () { 
	                	
	                	var $holder = $('.grid-items');	                     
	                    
	                    if($holder.length !== 0) {   
	                                     	
	                    	$('.grid-items').cubeportfolio('appendItems', $newItems);
	                    	
	                    	
	                    	
	                    }           
						
	                });
	
		                            
	            });
	                        
	
	        } else {
	            //$('#ajax-load-posts a').append('.');
	        }
	
	        return false;
	    });
	    
	}
        
});
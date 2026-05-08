jQuery(document).ready(function ($) {

	'use strict';
	
	jQuery('#navigation a').bind('click', function(event) {
		event.preventDefault();
		
		
		
		
	});
	
	$('#navigation a').click(function () {
	
		event.preventDefault();
		
		var pageUrl = jQuery(this).attr('href');
		var contentWrap = $("#page-content");
		//alert("URL: "+url);
		
		$("#page-content").animate({'opacity':0}, 'slow');
		
		// Adding a page loading class
		
		$("#page-content,#navigation").addClass('page-content-loading');
	        
	
        // Show that we're working.
        //$(this).html('Loadings posts.. <div class="spinner-ajax"></div>');
        //$(this).find('.spinner-ajax').css('opacity',1);

        $.get(pageUrl, function (data) {
			//alert('test');
            //pageNum++;
            //nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + pageNum);

            //if (pageNum <= max) {
             //   $('#portfolio-load-posts a').text('Load More Posts');
            //} else {
            //    $('#portfolio-load-posts a').text('No more posts to load.').addClass('ajax-no-posts');
            //}
                            

        }).done(function (data) {
			
            var newPageContent = $(data).find('#page-content');				
			alert(pageUrl);
			console.log(newPageContent);
			console.log("TEST");
			$("#page-content").html(newPageContent).animate({'opacity':1}, 'slow');
//            $newItems.find('img').bind("load", function () { 
//            	
//            	var $holder = $('.portfolio-items');	                     
//                
//                if($holder.length !== 0) {   
//                                 	
//                	$('.portfolio-items').cubeportfolio('appendItems', $newItems, function() {
//
//                	});
//                	
//                }           
//				
//            });

                            
        });
	                        
	});

});
/************Document Ready Functions************/

jQuery(document).ready(function () {
	
	/************MOBILE MENU************/
				
	var menu = $('.mobile-menu');
	var header = $('header');
		
	function mobileFiltering() {
		menu.click( function(e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
	        var status = header.hasClass('active');
	      if(status){
	        header.removeClass('active');
	      }else{
	        header.addClass('active');
	      }
	  });
	}
	
	function mobileDrops() {
		
		// Add drop links
		
		$('header li.menu-item-has-children').each(function() {
			$(this).append('<a class="open-children" href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>');
		});
		
		// On click
		
		$('.open-children').click( function(e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
			var link = $(this).parent();
	        var status = link.hasClass('active');
	      if(status){
	        link.removeClass('active');
	      }else{
	        link.addClass('active');
	      }
	  });
	}
	
	// Kill mobile menu
	
	function endMobile() {
		menu.unbind();
		header.removeClass('active');
		$('header li.menu-item-has-children a').unbind();
		$('header li.menu-item-has-children').unbind().removeClass('active');
		
		$('header .open-children').remove();

	}
	
	// Active mobile menu
	
	if ($(window).width() < 951) {
	    mobileFiltering();
	    mobileDrops();
	} else {
		endMobile();
	}
	
	$( window ).resize(function() {
	    if($(window).width() < 951 ) {
	        mobileFiltering();
	        mobileDrops();
	    } else {
		    endMobile();
	    }
	});

});
/************Document Ready Functions************/

jQuery(document).ready(function () {
	
	/************MOBILE MENU W/O PARENT LINKS************/
				
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
	        $('html').removeClass('active');
	      }else{
	        header.addClass('active');
	        $('html').addClass('active');
	      }
	  });
	}
	
	function mobileDrops() {
		
		// Add drop links
		
		$('header li.menu-item-has-children > a').click(function(e) {
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
		$('html').removeClass('active');

	}
	
	// Active mobile menu
	
	if ($(window).width() < 1201) {
	    mobileFiltering();
	    mobileDrops();
	} else {
		endMobile();
	}
	
	$( window ).resize(function() {
	    if($(window).width() < 1201 ) {
	        mobileFiltering();
	        mobileDrops();
	    } else {
		    endMobile();
	    }
	});

});
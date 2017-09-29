/************Document Ready Functions************/

jQuery(document).ready(function () {
	
	// Mobile Menu
				
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
	
	if ($(window).width() < 851) {
	    mobileFiltering();
	} else {
		menu.unbind();
		header.removeClass('active');
	}
	
	$( window ).resize(function() {
	    if($(window).width() < 851 ) {
	        mobileFiltering();
	    } else {
		    menu.unbind();
		    header.removeClass('active');
	    }
	});

});
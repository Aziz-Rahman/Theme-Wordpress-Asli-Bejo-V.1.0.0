/*
	Strata by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

  'use strict';

	$(window).load(function() {
		// Display sub menu
		$(".site-navigation ul li.menu-item-has-children").hover(function() {
		  	$(this).find(".child-menu, .sub-menu").stop().slideToggle();
		});

		// justifiedGallery
		var hentryWidth = $('.entry-content').outerWidth();
		$('article.hentry .gallery').justifiedGallery({
		    rowHeight: 150,
		    maxRowHeight: 0,
		    margins: 0,
		    lastRow : 'justify'
		});

		// embed, iframe, etc
		if ($.fn.fitVids) {
			$('.hentry').fitVids();
		}

		// Mobile menu
	    $('#nav-gue').slicknav();
	}); // END: Window Load


})(jQuery);
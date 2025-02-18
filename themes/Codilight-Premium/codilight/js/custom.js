/*-----------------------------------------------------------------------------------*/
/*	Begin
/*-----------------------------------------------------------------------------------*/


jQuery(document).ready(function() {

/*-----------------------------------------------------------------------------------*/
/*	Tab Shortcode
/*-----------------------------------------------------------------------------------*/
  
	"use strict";
  
	$(".uxde-tabs").tabs();

/*-----------------------------------------------------------------------------------*/
/*	Toggles Shortcode
/*-----------------------------------------------------------------------------------*/
	
	$(".uxde-toggle").each( function () {
		if($(this).attr('data-id') === 'closed') {
			$(this).accordion({ header: '.uxde-toggle-title', collapsible: true, autoHeight: false, active: false  });
		} else {
			$(this).accordion({ header: '.uxde-toggle-title', collapsible: true, autoHeight: false});
		}
	});

/*-----------------------------------------------------------------------------------*/
/*	FitVids
/*-----------------------------------------------------------------------------------*/

	$(".body-content").fitVids();

/*-----------------------------------------------------------------------------------*/
/*	Back Top
/*-----------------------------------------------------------------------------------*/

	$("#back-top").hide();
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 400) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});

			$('#back-top').click(function () {
				$('body,html').animate({
				scrollTop: 0
				}, 1000);
			return false;
		});
	}); 

/*-----------------------------------------------------------------------------------*/
/*	Tabbed Widget
/*-----------------------------------------------------------------------------------*/

	$(".widget-tabs").tabs({ fx: { opacity: 'show' } });
	$(".widget-tab li:last-child").addClass('last');
	
	$(".widget-tabs").tabs({ 
		fx: { opacity: 'toggle' } 
	});
	
	$(".toggle").each( function () {
		if(jQuery(this).attr('data-id') === 'closed') {
			jQuery(this).accordion({ header: 'h4', collapsible: true, active: false  });
		} else {
			jQuery(this).accordion({ header: 'h4', collapsible: true});
		}
	});

/*-----------------------------------------------------------------------------------*/
/*	The End
/*-----------------------------------------------------------------------------------*/	

});
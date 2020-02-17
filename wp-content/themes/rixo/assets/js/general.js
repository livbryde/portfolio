// JavaScript Document
jQuery(document).ready(function() {
	
	var rixoViewPortWidth = '',
		rixoViewPortHeight = '';

	function rixoViewport(){

		rixoViewPortWidth = jQuery(window).width(),
		rixoViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( rixoViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var rixoSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var rixoSiteHeaderWidth = jQuery('.site-header').width();
			var rixoSiteHeaderPadding = ( rixoSiteHeaderWidth * 2 )/100;
			var rixoMenuHeight = jQuery('.menu-container').height();
			
			var rixoMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var rixoMenuPadding = ( rixoSiteHeaderHeight - ( (rixoSiteHeaderPadding * 2) + rixoMenuHeight ) )/2;
			var rixoMenuButtonsPadding = ( rixoSiteHeaderHeight - ( (rixoSiteHeaderPadding * 2) + rixoMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':rixoMenuPadding});
			jQuery('.site-buttons').css({'padding-top':rixoMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		rixoViewport();
		
	});
	
	rixoViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( rixoViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		
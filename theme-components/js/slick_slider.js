// @codekit-prepend "../../bower_components/slick.js/slick/slick.min.js"

jQuery( document ).ready(function() {
	jQuery('.banner-section').fadeIn(900);

	/* Main Banner Rotator */
	jQuery('#block-views-banner-rotator-view-block .content').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		cssEase: 'linear',
		infinite: true,
		speed: 800,
		slidesToShow: 1,
		adaptiveHeight: true
	});

	jQuery.each(jQuery('.slide.slick-slide'), function(){ 
		var image = jQuery(this).attr('data-image'); 
		jQuery(this).css('background-image', 'url(' + image + ')'); 
	});
});
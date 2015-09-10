jQuery(document).ready(function(){

	jQuery('#main-nav ul:first-child').clone().appendTo('.responsive-topnav');

	jQuery('#top-nav-button').click(function(event){
		event.preventDefault();
		jQuery('.responsive-topnav').slideToggle();
		jQuery('ul.sub-menu').show();
		jQuery('.dongy-search-box-container').hide();
	});
	
});

jQuery('.main-nav ul.sub-menu').hide();
jQuery('.main-nav li').hover( 
	function() {
		jQuery(this).children('ul.sub-menu').slideDown('fast');
	}, 
	function() {
		jQuery(this).children('ul.sub-menu').hide();
	}
);

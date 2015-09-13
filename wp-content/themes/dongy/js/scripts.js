$(document).ready(function () {
	/*Search box*/
	jQuery(".dongy-search-button-icon").click(function(){
    	jQuery(".dongy-search-box-container").toggle('fast');
    	$('#dongy-search-form').find('input[name="s"]').focus();
  	});
	/*Scroll top*/	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 500) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
	});
	$('.back-to-top').click(function () {
		$('html, body').animate({
				scrollTop: 0
			}, 1000);

		return false;
	});
});
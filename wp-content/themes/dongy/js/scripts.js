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

	$("a[title='Facebook Auto Publish']").parent().html("");

	//Animation
	wow = new WOW(
    {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          //console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    
	$("#content img").lazyload({ 
		effect : "fadeIn",
		effect_speed: 1500,
		load: function(){			
			$(this).removeAttr("data-original");
		}
	});
    
    $(".home-recent img").lazyload({ 
		effect : "fadeIn",
		effect_speed: 1500,
		load: function(){			
			$(this).removeAttr("data-original");
		}
	});
});
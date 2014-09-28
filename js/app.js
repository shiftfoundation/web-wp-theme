jQuery(function($){

	function checkLocation(){
		if ( window.location.hash ) {
			$('a[href="' + window.location.hash + '"]').click().parent().addClass('selected').siblings().removeClass('selected');
		}
		else
		{
			$('.subnav a[href^="#"]:eq(0)').click();
		}
	}

	if ( $('body').hasClass('single-product') || $('body').hasClass('author') ) {
		checkLocation();
		window.onhashchange = checkLocation;
	}

	$('.subnav').delegate('a[href^="#"]', 'click', function(e){
		$(this).parent().addClass('selected').siblings().removeClass('selected');
		window.location = $(this).attr('href');
		$(window).scrollTop(0);
		e.preventDefault();
	});

	$('.menu-toggle').click(function(){
		$('#masthead').toggleClass('active');
	});


});

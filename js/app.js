jQuery(function($){

	if ( $('.subnav').size() > 0 ) {
		var nav_ot = Math.round( $('.subnav').offset().top );
	}

	$('.subnav').delegate('a[href^="#"]', 'click', function(e){

		$(this).parent().addClass('selected').siblings().removeClass('selected');

		if( $('body').hasClass('single-product') ) {
			if ( $(this).attr('data-image') ) $('.banner').attr("style", "background-image: url(" + $(this).attr('data-image') + ");" );
		}

		window.location = $(this).attr('href');
		
		window.setTimeout( function(){
			$(window).scrollTop(nav_ot);
		}, 20);

		e.preventDefault();
	});

	function checkLocation(){
		if ( window.location.hash ) {
			$('.tabs-container:eq(0):visible').attr("style", "");
			$('a[href="' + window.location.hash + '"]').click().parent().addClass('selected').siblings().removeClass('selected');
		}
		else
		{
			$('.subnav a[href^="#"]:eq(0)').parent().addClass('selected').siblings().removeClass('selected');
			$('.tabs-container:eq(0)').css("display", "block");

			if( $('body').hasClass('single-product') ) {
					$('.banner').attr("style", "background-image: url(" + $('.subnav a[href^="#"]:eq(0)').attr('data-image') + ");" );
			}
		}
	}

	if ( $('body').hasClass('single-product') || $('body').hasClass('author') ) {
		checkLocation();
		window.onhashchange = checkLocation;
	}

	$('.menu-toggle').click(function(){
		$('#masthead').toggleClass('active');
	});

	if ( $('body').hasClass('home') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'shift_org',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

	if ( $('body').hasClass('author') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'shift_org',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

	if ( $('body').hasClass('single-product') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'shift_org',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

});

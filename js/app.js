jQuery(function($){
	var nav_ot = Math.round( $('.subnav').offset().top );

	$('.subnav').delegate('a[href^="#"]', 'click', function(e){
		$(this).parent().addClass('selected').siblings().removeClass('selected');

		if( $('body').hasClass('single-product') ) {
			$('.banner').attr("style", "background-image: url(" + $(this).attr('data-image') + ");" );
		}

		window.location = $(this).attr('href');
		
		$(window).scrollTop(nav_ot);

		e.preventDefault();
	});

	function checkLocation(){
		if ( window.location.hash ) {
			$('a[href="' + window.location.hash + '"]').click().parent().addClass('selected').siblings().removeClass('selected');
			window.setTimeout( function(){
				$(window).scrollTop(nav_ot);
				console.log(nav_ot);
			}, 50);
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

	$('.menu-toggle').click(function(){
		$('#masthead').toggleClass('active');
	});

	if ( $('body').hasClass('home') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'wearewhatwedo',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

	if ( $('body').hasClass('author') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'wearewhatwedo',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

	if ( $('body').hasClass('single-product') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'wearewhatwedo',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

});

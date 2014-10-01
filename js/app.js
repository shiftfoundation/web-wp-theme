jQuery(function($){

	$('.subnav').delegate('a[href^="#"]', 'click', function(e){
		$(this).parent().addClass('selected').siblings().removeClass('selected');
		window.location = $(this).attr('href');
		$(window).scrollTop(0);
		e.preventDefault();
	});

	function checkLocation(){
		if ( window.location.hash ) {
			$('a[href="' + window.location.hash + '"]').click().parent().addClass('selected').siblings().removeClass('selected');
			window.setTimeout( function(){
				$(window).scrollTop(0);
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
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><h3>{{user_name}}</h3><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

	if ( $('body').hasClass('author') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'wearewhatwedo',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><h3>{{user_name}}</h3><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

	if ( $('body').hasClass('single-product') ) {

		$('#twitter').twittie({
			'apiPath' : '/content/themes/shiftwp/tweetie/api/tweet.php',
			'username' : 'wearewhatwedo',
			'count' : 3,
			'template' : '<span class="avatar">{{avatar}}</span><span class="tweet"><h3>{{user_name}}</h3><span>{{tweet}}</span></span><span class="date">{{date}}</span>',
			'dateFormat' : '%d %B %Y',
			'hideReplies' : true
		});
	}

});

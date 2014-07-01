layout = {}

layout.hCenter = function($){
	var wHeight = $(window).height(),
		pHeight = $('#page').height();

	$('body').css('padding', (wHeight-pHeight)/2 + 'px')
}

layout.init = function($){
	layout.hCenter($);
}

layout.resize = function($, columns){


	var $page =		$('#page'),
		$content =	$('#content'),
		$header =	$('#masthead'),
		$nav =		$('#site-navigation')
		
		hdrWidth = $header.width(),
		navWidth = $nav.width() + parseInt($nav.css('marginRight')) + parseInt($nav.css('marginLeft'));

	var COLUMN_WIDTH = $nav.width();

		console.log( hdrWidth + ', ' + navWidth );

		$page.transition({ width: hdrWidth + navWidth + (COLUMN_WIDTH * (columns+1)) + ((columns+1) * 16) });
		$content.css("width", (COLUMN_WIDTH * (columns+1)) + ((columns+1) * 16));

	
	//$page.transition({ width: 215 + 16 + 140 + 16 + (140*9) + 32 + "px", delay: 300 }, 300, 'ease', function(){
		//$content.css("width", (140*9) + 32 + "px");
		//$(".boxes").transition({ opacity: 1, delay: 0 }, 100, 'ease', function(){
			//$(".boxes .box").each(function(index){
				//$(this).transition({ left: 0, opacity: 1,  delay: index*100 });
			//});
		//});
	//});

	//$(".boxes .box").each(function(index){
		//$(this).transition({ left: 156, opacity: 0,  delay: index*100 });
	//});

}

layout.load = function($, type){
	
	if( type == 'project' ){

		layout.resize($, 7);

		var $project = $('.type-project.hentry .entry-description');

		if( $project.find('h2').size() > 0){

			$project.after('<div class="box w1 h4"><ul class="subnav"></ul></div>')

			var $subnav = $('ul.subnav').eq(0);

			$project.find('h2').each(function(index){
				
				$(this).nextUntil("h2").andSelf()
				.detach().appendTo('.entry-content')
				.wrapAll('<section' + ( index==0 ? ' class="active"' : '' ) + ' id="sec_' + index + '"></secton>');

				$subnav.append('<li><a href="#sec_' + index + '"><span>' + $(this).text() + '</span></li>');

			});


			$('ul.subnav li a').click(function(){

				var target = $(this).attr('href');

				$(this).parent().addClass('selected').siblings().removeClass('selected');
				$('.entry-content').transition({ opacity: 0, left: '140px' }, 200, 'ease', function(){
					$('section.active').removeClass('active');
					$(target).addClass('active');
					$('.entry-content').transition({ opacity: 1, left: '0' }, 200, 'ease');
				});

				return false;
			});

		}

		$("#main .boxes .box").each(function(index){
			$(this).transition({ left: 0, opacity: 1, delay: index*50 });
		});

	}

}

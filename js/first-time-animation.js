function init_ftAnimation($) {
	
	if( ($.cookie('shift-ft-animation') != 'seen') || debug ){

		$.cookie('shift-ft-animation', 'seen', { path: '/' }) 

		var $logo = $("#logo"),
		$logoElements = $logo.children("span");
		$logo.find('.logo-text').css('paddingLeft', '0');

		$logo.css("margin-top", "300px");
		$logoElements.css('opacity', '1').each(function(index){

			$(this)
			.transition({ scale: [1,1], delay: 50*index }, 300, 'ease', function(){
				$(this).addClass('fromright');
			})
			.transition({ scale: [0,1], delay: 50*index }, 300, 'ease', function(){
				$("#logo span:eq(0)").transition({ scale: [1,1] }, 300, 'ease', function(){
					$(this).removeClass('fromright');
				});
			});

			$(this)
			.siblings('.logo-text')
			.transition({ left: 0, delay: ($logoElements.size()+1)*50 + 1000 })
			.transition({ paddingLeft: '0.5em', delay: ($logoElements.size()+1)*50 });

		});

		$logo.transition({ marginTop: 0, delay: ($logoElements.size()+1)*50 + 1000 + 400 }, 300, 'ease', function(){
			$("#page").transition({ width: 215 + 16 + 140 + 16 + "px", delay: 300 }, 300, 'ease', function(){
				$(".main-navigation").transition({ opacity: 1 }, 200, 'ease', function(){
					$(".main-navigation li").each(function(index){
						$(this)
						.transition({ opacity: 1, top: 156 * index + 'px', delay: index*50 });
					});
				});
			});
		});

	}
}

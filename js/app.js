var debug = false;

function d(data){
	if(debug) {
		console.log(data);
	}
}


jQuery(function($){

	function layoutUpdate(){

	}

	var $logo = $("#logo"),
		$logoElements = $logo.children("span");

	$logo.css("margin-top", "300px");
	$logoElements.each(function(index){
	
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

   function showBoxes(){
	   $("#page").transition({ width: 215 + 16 + 140 + 16 + (140*5) + 32 + "px", delay: 300 }, 300, 'ease', function(){
		   $("#content").css("width", (140*5) + 32 + "px");
		   $(".boxes").transition({ opacity: 1, delay: 0 }, 100, 'ease', function(){
			   $(".boxes .box").each(function(index){
				   $(this).transition({ left: 0, opacity: 1,  delay: index*100 });
			   });
		   });
	   });
   }

   function hideBoxes(){
	   $(".boxes .box").each(function(index){
		   $(this).transition({ left: 156, opacity: 0,  delay: index*100 });
	   });
   }

	$('.main-navigation a').click(function(){

		if( $(".boxes").css("opacity") != 0 ) {
			showBoxes();
		} else {
			alert('a');
			hideBoxes();
		}

		$(this).parent().addClass('selected').siblings().removeClass('selected');

		return false;
	});

});

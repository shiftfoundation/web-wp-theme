navigation = {}

navigation.init = function($){

	var $navLinks = $('#site-navigation a');

	$navLinks.click(function(){
		navigation.router($, $(this).attr('href'));

		$(this).parent().addClass('selected').siblings().removeClass('selected');

		return false;
	});

}

navigation.router = function($, link){

	var isProject = link.search(/project/i);

	if ( isProject ) {

		console.log( 'Loading project' );
		console.log( $('#main .boxes .box:eq(0):visible').size() );

		$('#main .boxes .hentry').remove();

		$('#main .boxes').load( link + " .hentry", function(){
			layout.load($, 'project');
		});

	} else {

		console.log( 'Not a project' );

	}

}

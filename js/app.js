var debug = false;
var animation = true;

function d(data){
	if(debug) {
		console.log(data);
	}
}

jQuery(function($){

	init_ftAnimation($);
	layout.init($);
	navigation.init($);

});

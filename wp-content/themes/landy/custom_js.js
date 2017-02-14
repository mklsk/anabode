
(function($) {
	

	$(document).ready(function() {

		var learn_opened = 0;
		console.log('here is ', learn_opened);

	    
		$('.learn').click(function(){

	 		console.log('been clicked with ', learn_opened);

	 		if(learn_opened == 1){

	 			$('.more_info').css('height', '0');
	 			learn_opened = 0;
	 		}
	 		else {

	 			$('.more_info').css('height', '300px');
	 			learn_opened = 1;
	 		}
		});

	});


})(jQuery);

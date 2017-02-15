
(function($) {
	

	$(document).ready(function() {


		/*LEARN MORE SECTION*/

		//is the learn more section opened?
		var learn_opened = 0;
		console.log('here is ', learn_opened);

	    
	    //when learn more is clicked
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


		// //set up svg logo
		// $('logo animated fadeIn').children('a').children('img').addClass('style-svg');
		// $('logo animated fadeIn').children('a').children('img').css('height', '40px');

	});


})(jQuery);

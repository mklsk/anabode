
/*CUSTOM JS EXTENDING LANDY THEME FUNCTIONALITY*/

(function($) {
	

	$(document).ready(function() {

		/*LEARN MORE SECTION*/

		//is the learn more section opened?
		var learn_opened = 0;
	    
	    //when learn more is clicked
		$('.learn').click(function(){

			var source = $(this).attr('class').split(' ').pop();
			console.log(source);

	 		//if already opened
	 		if(learn_opened == 1){

	 			//close the placeholder
	 			$('.more_info').css('height', '0');
	 			learn_opened = 0;

	 			//hide all content
	 			$('.feature_content').css('display', 'none');


	 		}
	 		//if not opened yet
	 		else {

	 			//open the placeholder
	 			$('.more_info').css('height', '300px');
	 			learn_opened = 1;

	 			//display an appropriate content piece
	 			$('.feature_content.' + source).css('display', 'block');

	 		}
		});


		/*TESTIMONIALS SECTION*/


	});


})(jQuery);
